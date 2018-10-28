#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');
function dotest($thename)
{
    // lookup username in databas
    // check password
    $testing = new loginDB();
    return $testing->test($thename);
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
          $temp = dotest($request['pokemonname']);
          $thestuff2 = json_decode($temp,true);
          $statarray[] = $thestuff2['name'];
          $statarray[] = $thestuff2['id'];
          foreach($thestuff2['stats'] as $names){
              $statarray[] = $names['base_stat'];
          }
          foreach($statarray as $stato){
              echo $stato;
          }
          return $thestuff2;
        break;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server2 = new rabbitMQServer("testRabbitMQ2.ini","testServer2");

$server2->process_requests('requestProcessor2');
exit();
?>
