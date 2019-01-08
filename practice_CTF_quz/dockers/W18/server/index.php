<?php
    if (isset($_GET['source'])) {
        highlight_file(__FILE__);
        die();
    }

    require_once("flag.php");
    $username=null;
  $success =null;



    function is_correct($username, $password) {
      $db = array(
        array("username" => "Maplestory", "password" => "flkj83jf830ake983jfja03ifjdkdksp"),
        array("username" => "LOL", "password" => "0e123455666131514551234556123453"),
        array("username" => "Osu!", "password" => "888ff8a9we903e90f0a00d0b0a0e9f9d"),
        array("username" => "Macbook", "password" => "bitemecanyouxddddddddd6666666666"),
        array("username" => "Surface", "password" => "kdhgiow94888402jrkdka0301103u492"),
        array("username" => "Linux", "password" => "9cd39d93030159f90401034812340923"),
        array("username" => "Ausu", "password" => "0d982301239851039610123849293958"),
        array("username" => "Acer", "password" => "jg83902340168384040e94t94j203t0t"),
        array("username" => "123ojp", "password" => "123ojpissmostshandsomeintheworld"),
        array("username" => "Hackersir", "password" => "83j910239032n401231nj2i34j293410"),

      );
        $result = false;
        foreach ($db as $row)
        {
            if ($username == $row["username"] and md5($password) == $row["password"])
            {
                $result = true;
                break;
            }
        }
        return $result;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web 18: MD5 ?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            font-family: Arial, Helvetica, sans-serif;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>
    <div class="container" id="main">
    <?php
        if( !isset($_POST['username']) || !isset($_POST['password']) || $_POST['username']=="" || $_POST['password']=="" ) {
    ?>
        <form class="form-signin text-center" method="POST" action="index.php">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="username" class="sr-only">Username</label>
            <input id="username" class="form-control" placeholder="Username" required="" autofocus="" type="text" name="username">
            <label for="password" class="sr-only">Password</label>
            <input id="password" class="form-control" placeholder="Password" required="" type="password" name="password">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
        </form>
    <?php
        } else {
            $text = "";
            is_correct($_POST['username'], $_POST['password']) ? $text = $flag : $text = "Login Failed!!";
    ?>
    <h1 class="text-center"><?php echo $text; ?></h1>
    <?php
        }
    ?>
    <p class="text-center"><a href="index.php?source" class="button">檢視原始碼</a></p>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
