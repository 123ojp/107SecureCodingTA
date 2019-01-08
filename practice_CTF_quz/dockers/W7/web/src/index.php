<?php
require_once("config.php");

if(!isset($_COOKIE["USERSESSID"])){
    setcookie('USERSESSID', md5(uniqid(rand(), true)));
    header("Location: /");
}
if(isset($_POST['message']) && !empty($_POST['message']))
{
    $user = $_COOKIE['USERSESSID'];
    $message = $_POST['message'];
    $conn = new PDO($dsn, $dbuser, $dbpass);
    $sql = "insert into messageboard(usersessionid, message) values ('$user', '$message')";
    $conn->exec($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple message board</title>
</head>
<body>
    <form method="post">
        <table align="center">
            <tr style="vertical-align: top">
                <td colspan="2">
		    <h3>What do you want to say?:</h3>
		</td>
            </tr>
            <tr>
                <td colspan="2">
                    <labe for="message">message:</label>
                    <input type="text" name="message" style="width: 100%"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit" value="Post it!" />
                </td>
            </tr>
            <tr>
                <td colspan="2"><h3>Meassages:</h3></td>
            </tr>               
                
                <?php
                    $user = $_COOKIE['USERSESSID'];
                    $conn = new PDO($dsn, $dbuser, $dbpass);
                    $sql = "select time, message from messageboard where usersessionid='$user'";
                    $stm = $conn->query($sql);
                    foreach($stm as $row){
                        echo "<tr style='border: 1px dotted black'>\n";
                        echo "\t<td colspan='2' style='word-wrap: break-word;padding: 5px;'>Submitted time: <b>".$row['time']."</b></td>\n";
                        echo "<tr style='border: 1px dotted black'>\n";
                        echo "</tr>\n";
                        echo "\t<td colspan='2' style='border: 1px dotted black;word-wrap: break-word;padding: 5px;'>".$row['message']."</td>\n";
                        echo "</tr>\n";
                    }
                ?>
        </table>
    </form>
</body>
</html>

