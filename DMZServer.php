#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');
function SearchDatabase($PokemonNamesearch)
{

    $SearchLogin = new loginDB();
    return $SearchLogin->SearchDatabase($PokemonNamesearch);
}
function addToDatabase($PokemonNameadd)
{

    $addLogin = new loginDB();
    return $addLogin->addToDatabase($PokemonNameadd);
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
          $SearchResults = SearchDatabase($request['pokemonname']);
          //$thestuff2 = json_decode($temp,true);
          return $SearchResults;
      break;
      case "addpoke":
          $addResults = addToDatabase($request['pokemonname']);
          //$thestuff2 = json_decode($temp,true);
          return $addResults;
      break;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server2 = new rabbitMQServer("testRabbitMQ2.ini","testServer2");

$server2->process_requests('requestProcessor2');
exit();
?>
