<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type, politely FUCK OFF";
//echo $request["type"];
switch ($request["type"])
{
	case "login":
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
        $request2 = array();
        $request2['type'] = "login";
        $request2['username'] = $_POST['uname']; //$argv[1];
        $request2['password'] = $_POST['pword'];//$argv[2];
        $request2['message'] = "HI";
        $response = $client->send_request($request2);
        if($response == 1){  
            session_start();
            $_SESSION = array();
            $_SESSION['username'] = $_POST['uname'];
        }
       
        //$response = $client->publish($request);

        //echo "client received response: ".PHP_EOL;
        //print_r($response);
        //echo "\n\n";*/
            //$response = "login, yeah we can do that";
	   break;
    case "register":
        $registerClient = new rabbitMQClient("testRabbitMQ.ini","testServer");
        $registerRequest = array();
        $registerRequest['type'] = "register";
        $registerRequest['email'] = $_POST['email'];
        $registerRequest['username'] = $_POST['uname']; //$argv[1];
        $registerRequest['password'] = $_POST['pword'];//$argv[2];
        $registerRequest['message'] = "HIIIII";
        $response = $registerClient->send_request($registerRequest);
    break;
}
echo json_encode($response);
exit(0);
?>