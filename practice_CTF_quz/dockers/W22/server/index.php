<?php
  session_start();
  $result = "CTF{NOT_THIS_ONE}";
  $count = 0;
  $h1 = "Please sign in more time :)<br> and I will Give you the Flag (Maybe?";
  function qq($flag){
     if ($flag == 0 ){return '+';}
     if ($flag == 1 ){return '-';}
     if ($flag == 2 ){return '*';}
  }
  function ans($num1,$num2,$flag){
     if ($flag == 0 ){return $num1+$num2;}
     if ($flag == 1 ){return $num1-$num2;} 
     if ($flag == 2 ){return $num1*$num2;}
  }
  if (empty($_SESSION["suc_count"])) {
      $_SESSION["suc_count"] = 1;
      $h1 = "Please sign in";
      $result = "";

  } else {
    if ($_SESSION["suc_count"]==2018){
      $result = "CTF{YOu_Know_how_to_wirte_requests_Scriptw}";
    }
  }

  if( isset($_POST['token']) ||  $_POST['token']!="") {
    if ($_SESSION["nextoken"] == $_POST['token']) {
      $_SESSION["suc_count"] += 1;
    }
  }
  $count = $_SESSION["suc_count"];
  $_SESSION["num1"] = rand(1,100);
  $_SESSION["num2"] = rand(1,100);
  $_SESSION["flag"] = rand(0,2);
  $_SESSION["nextoken"] = ans($_SESSION["num1"],$_SESSION["num2"],$_SESSION["flag"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web 22: try write script_HomeWork</title>
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
        <h1 class="h3 mb-3 font-weight-normal text-center"><?php echo $h1; ?></h1>
        <h1 class="text-center" name="flag"><?php echo $result; ?></h1>
        <h1 class="h3 mb-3 font-weight-normal text-center">你可能登入了<?php echo $count-1; ?>次</h1>
        <h1 class="h3 mb-3 font-weight-normal text-center">Next <span id="num1"><?php echo $_SESSION['num1'] ?></span> <span id="flag"><?php echo qq($_SESSION['flag']) ?></span> <span id="num2"><?php echo $_SESSION['num2'] ?></span></h1>
        <form class="form-signin text-center" method="POST" action="index.php">
            <label for="password" class="sr-only">Password</label>
            <input id="password" class="form-control" placeholder="Password"  type="text" name="token">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-center">© 2017-2018</p>
        </form>



    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
