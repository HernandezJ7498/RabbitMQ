#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('RequestProcessor.php.inc');

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
      case "addpoke":
          $addResults = addToDatabase($request['pokemonname']);
          //$thestuff2 = json_decode($temp,true);
          return $addResults;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

try {
    $server2 = new rabbitMQServer("DMZServerinitializer.ini","mainDMZ");
    throw new customException();
    }
catch(customException $e) {
    $server2 = new rabbitMQServer("DMZServerinitializer.ini","backupDMZ");
    echo "Using backup server";
}

$server2->process_requests('requestProcessor2');
exit();
?>
