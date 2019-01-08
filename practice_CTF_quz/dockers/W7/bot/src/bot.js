function trigger_xss(){
    var zombie = require("zombie");
    var bot = new zombie();
    var flag = "CTF{wow_U_GET_THE_FLAG_FROM_ADMIN}";
    bot.setCookie({name:"USERSESSID", domain:"web", value: flag});
    bot.visit("http://web/admin.php", {debug: true}, function(){});
};

trigger_xss();
