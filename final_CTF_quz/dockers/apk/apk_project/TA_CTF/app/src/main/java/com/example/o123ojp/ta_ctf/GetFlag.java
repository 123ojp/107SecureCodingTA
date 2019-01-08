package com.example.o123ojp.ta_ctf;

import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.io.StringWriter;
import java.net.HttpURLConnection;
import java.net.URL;

/**
 * Created by o123ojp on 2018/3/29.
 */


public class GetFlag {
    private String course_num;
    private String sub_name;
    private String open_quota;
    private String real_quota;
    private String course_json;
    private String course_credits;
    private String course_time;
    private String error_text;
    private boolean is_error= false ;
    private String years = "";
    private String ss = "";
    //getter
    public String getOpen_quota(){
        return this.open_quota;
    }
    public String getReal_quota(){
        return this.real_quota;
    }
    public String getSub_name(){
        return this.sub_name;
    }
    public String getCourse_credits(){
        return this.course_credits;
    }
    public String getCourse_time(){
        return this.course_time;
    }
    public String getCourse_json(){
        return this.course_json;
    }
    public String getError_text(){ return this.error_text;}
    public void setCourse_num(String course_num) {
        this.course_num = course_num;
    }

    public boolean getIs_error(){ return this.is_error;}
    public GetFlag(String course) {
        this.course_num=course;
        this.renew_course();
    }
    public void renew_course(){
        this.get_course_info(this.course_num);
        JSONObject course_sourse_json;

        try {
            course_sourse_json = new JSONObject(this.course_json);



            this.sub_name = course_sourse_json.getString("message");
            this.open_quota = course_sourse_json.getString("flag");
            this.real_quota = "a";
            this.course_credits = "b";
            this.course_time = "c";

        } catch (Exception e) {
            //error_handing.print_error("Error: " + e.getMessage());
            this.real_quota = "NULL";
            this.open_quota="NULL";
            this.sub_name="NULL";
            if (e.getMessage().contains("Index 0 out of range")){
                this.error_text="選課代碼錯誤，查無此課";
                this.is_error=true;
            }else if (e.getMessage().contains("End of input at")) {
                this.error_text="網路連線錯誤";
                this.is_error=true;
            } else {
                this.error_text = e.getMessage();
                this.is_error = true;
            }
        }

    }

    public void get_course_info(String course){


        String output = "";
        URL url;
        HttpURLConnection urlConnection = null;

        if (years == null){
            years = "107";
        }
        if (ss == null){
            ss = "1";
        }
        try {
            url = new URL("http://140.134.25.138:10107/asdfasdfajsdfjadfjkhwhlaoefwdjfsjlajdjflajldfsadfsadfsjdsafjksdfakjlfsjsdfafas/a/ASDFFASDF/flag.json");

            urlConnection = (HttpURLConnection) url.openConnection();
            urlConnection.setRequestMethod("POST");//
            urlConnection.setRequestProperty("Content-Type","application/json");
            urlConnection.setRequestProperty("Accept","application/json");


            String postJsonData = "{\"baseOptions\":{\"lang\":\"cht\",\"year\":"+years+",\"sms\":"+ss+"},\"typeOptions\":{\"code\":{\"enabled\":true,\"value\":\""+course+"\"},\"weekPeriod\":{\"enabled\":false,\"week\":\"*\",\"period\":\"*\"},\"course\":{\"enabled\":false,\"value\":\"\"},\"teacher\":{\"enabled\":false,\"value\":\"\"},\"useEnglish\":{\"enabled\":false},\"specificSubject\":{\"enabled\":false,\"value\":\"1\"}}}";

            //Send post request
            urlConnection.setDoOutput(true);
            DataOutputStream wr = new DataOutputStream(urlConnection.getOutputStream());
            wr.writeBytes(postJsonData);
            wr.flush();
            wr.close();

            InputStream in = urlConnection.getInputStream();



            BufferedReader r = new BufferedReader(new InputStreamReader(in));
            StringBuilder total = new StringBuilder();
            String line;
            while ((line = r.readLine()) != null) {
                total.append(line).append('\n');
            }
            String htmlSrc = total.toString();
            output+=htmlSrc;
        } catch (Exception e) {

            StringWriter sw = new StringWriter();
            PrintWriter pw = new PrintWriter(sw);
            e.printStackTrace(pw);
            String sStackTrace = sw.toString();
            this.error_text=sStackTrace;
            this.is_error=true;
            // error_handing.print_error("Error: " + sStackTrace);
        } finally {
            if (urlConnection != null) {
                urlConnection.disconnect();
            }
        }

        this.course_json=output;
    }
    public boolean whether_if_OKadd(){

        if (Float.parseFloat(this.open_quota)>Float.parseFloat(this.real_quota)){
            return true;//如果大可以加
        }else{
            return false;
        }
    }

}

//{"d":
//        "{\"message\":\"\",\"total\":1,\"items\":" +
//        "[" +
//          "{\"scr_selcode\":\"1234\",\"sub_id3\":\"MCAE692\",\"sub_name\":\"專題討論(二)\",\"scr_credit\":1.0,\"scj_scr_mso\":\"必修\",\"scr_examid\":\"否\",\"scr_examfn\":\"否\",\"scr_exambf\":\"否\",\"cls_name\":\"機械碩一\",\"scr_period\":\"(一)08     工302 楊世宏\",\"scr_precnt\":40.0,\"scr_acptcnt\":27.0,\"scr_remarks\":\" \",\"unt_ls\":4009,\"cls_id\":\"CE04310\",\"sub_id\":\"43140\",\"scr_dup\":\"001\"}" +
//        "]}"
//}




