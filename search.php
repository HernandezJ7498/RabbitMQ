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
$testresponse = "";
//echo $request["type"];
switch ($request["type"])
{
        case "searchpoke":
        $searchClient = new rabbitMQClient("testRabbitMQ2.ini","testServer2");
        $searchRequest = array();
        $searchRequest['type'] = "searchpoke";
        $searchRequest['pokemonname'] = $_POST["pname"];
        $registerRequest['message'] = "HIIIII";
        $response = $searchClient->send_request($searchRequest);
    break;
}
echo $response;
exit(0);
?>