<?php
    function nextToken($token) {
        return base64_encode(strval(intval(base64_decode($token)) + 1));
    }

    function initToken() {
        $init = 1130943910;
        return base64_encode(strval($init));
    }

    function targetToken() {
        $target = 1130943910 + 100;
        return base64_encode(strval($target));
    }
    header('Give_Me_Something:X-Token');
    $headers = getallheaders();
    if (isset($headers['X-Token'])) {
        if ($headers['X-Token'] === targetToken()) {
            $text = "CTF{You_know_to_Write_Script!!!}";
        } else {
            header('X-NextToken:' . nextToken($headers['X-Token']));
            header('X-Token:' . $headers['X-Token']);
            $text = "Something Has Changed!";
        }
    } else {
        header('X-NextToken:' . initToken());
        header('X-Token: givemesomething');
        $text = "It works!";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web</title>
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
    </style>
</head>
<body>
    <div class="container" id="main">
        <h1 class="text-center">
            <?php
            echo $text;
            ?>
        </h1>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>

