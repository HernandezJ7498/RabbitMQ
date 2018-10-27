#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');
function dotest()
{
    // lookup username in databas
    // check password
    $testing = new loginDB();
    return $testing->test();
    //return false if not valid
}
function requestProcessor2($request)
{
  echo "received requestsss".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
      case "searchpoke":
          return dotest();
          //$listo = array();
          //$listo = json_decode($hey,true);
          //for($i = 0; $i<count($listo);$i++){
            //  echo $listo[$i];
          //}
          //return dotest();//doadd($request['email'],$request['username'],$request['password']);
          //return 
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server2 = new rabbitMQServer("testRabbitMQ2.ini","testServer2");

$server2->process_requests('requestProcessor2');
exit();
?>
