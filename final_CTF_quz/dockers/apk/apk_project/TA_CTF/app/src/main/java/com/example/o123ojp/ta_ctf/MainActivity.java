package com.example.o123ojp.ta_ctf;

import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
    }
    public void searchcourse(View view) {





            GetFlag new_course = new GetFlag("some");
            if(new_course.getIs_error()){
                Toast.makeText(this, new_course.getError_text(), Toast.LENGTH_SHORT).show();

            } else {
                Toast.makeText(this, new_course.getSub_name(), Toast.LENGTH_SHORT).show();

            }

    }
}
