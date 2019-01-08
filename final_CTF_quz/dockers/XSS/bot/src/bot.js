function trigger_xss(){
    var zombie = require("zombie");
    var bot = new zombie();
    var flag = "CTF{c_t_f_x_S_s}";
    bot.setCookie({name:"USERSESSID", domain:"web", value: flag});
    bot.visit("http://web/admin.php", {debug: true}, function(){});
};

trigger_xss();
