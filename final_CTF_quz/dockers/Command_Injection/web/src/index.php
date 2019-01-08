<?php
    $char_limit = 20;
    $result = "";


    function run_command($command, $char_limit) {
	if ( strpos($command,".")<1){
		return "usage: ping [-AaDdfnoQqRrv] [-c count] [-G sweepmaxsize]
            [-g sweepminsize] [-h sweepincrsize] [-i wait]
            [-l preload] [-M mask | time] [-m ttl] [-p pattern]
            [-S src_addr] [-s packetsize] [-t timeout][-W waittime]
            [-z tos] host
       ping [-AaDdfLnoQqRrv] [-c count] [-I iface] [-i wait]
            [-l preload] [-M mask | time] [-m ttl] [-p pattern] [-S src_addr]
            [-s packetsize] [-T ttl] [-t timeout] [-W waittime]
            [-z tos] mcast-group
Apple specific options (to be specified before mcast-group or host like all options)
            -b boundif           # bind the socket to the interface
            -k traffic_class     # set traffic class socket option
            -K net_service_type  # set traffic class socket options
            -apple-connect       # call connect(2) in the socket
            -apple-time          # display current time
		";

	}
        return shell_exec("sh /var/www/html/ping.sh ".$command);

    }

    if (isset($_POST['inputCommand'])) {
        $result = run_command($_POST['inputCommand'], $char_limit);
        if (PHP_OS === "WINNT") {
            $result = mb_convert_encoding($result,"utf-8","big5");
        }
        if ($result === "") {
            $result = "Wrong Input.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web 21: Command Injection</title>
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
        <h2>Enter Ip to Ping:</h2>
        <form method="POST" action="index.php">
            <div class="form-row align-items-center">
                <div class="col-sm">
                    <label class="sr-only" for="inputCommand">Command</label>
                    <input type="text" class="form-control mb-2" name="inputCommand" placeholder="請輸入IP...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>
            </div>
        </form>
        <hr>
        <h2>Result:</h2>
        <pre><code><?php echo htmlspecialchars($result); ?></code></pre>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
