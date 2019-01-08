<?php
    if( !isset($_POST['username']) || !isset($_POST['password']) || $_POST['username']=="" || $_POST['password']=="" ){
        header("Location: index.php");
    }
    function safe_filter($str)
    {
        $strl = strtolower($str);
        if (strstr($strl, 'drop') ||
            strstr($strl, 'update') ||
            strstr($strl, 'delete')
        ) {
            return '';
        }
        return $str;
    }
    $username = safe_filter($_POST['username']);
    $password = sha1($_POST['password']);
    $error_msg = "";
    require_once('config.php');
    try {
      $pdo = new PDO("mysql:host=$db_server;dbname=$db_name;charset=utf8mb4",$db_user,$db_password);
      $sql = "SELECT * FROM `users` WHERE `username` = '$username' and `password` = '$password';";
      $stmt = $pdo->query($sql);
      $success = count($stmt->fetchAll()) > 0;
      $dbh = null;
    } catch(PDOException $e) {
        $error_msg =  "Connection failed: ".$e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web 14: SQL Injection II</title>
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

        span.hide {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
      <?php if($success === false): ?>
      <div class="alert alert-danger">debug:<br> <?=htmlentities($sql)?></div>
      <?php endif; ?>
    <h1 class="text-center">
        <?php
            $text = "";
            $success ? $text = "Login Success!<br>Here's Your Account Data" : $text = "Login Failed!!";
            echo $text;
            if ($error_msg){
              echo $error_msg ;
            }

        ?>

    </h1>
    <?php if($success === true): ?>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>username</th>
            <th>password(SHA1)</th>
      </tr>
        </thead>

        <tbody>
          <?php
          $pdo = new PDO("mysql:host=$db_server;dbname=$db_name;charset=utf8mb4",$db_user,$db_password);
          $stmt = $pdo->query($sql);
          $count = 0;
          foreach($stmt as $value) {
            echo "<tr>";
            $count = 0;
                  foreach ($value as $value1){
                    if ($count%2 == 0){
                      echo "<td>".$value1."</td>";
                    }
                    $count +=1;
                  }
                  echo "</tr>";
                }
                 ?>
        </tbody>
  <?php endif; ?>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
