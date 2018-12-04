#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('RequestProcessor.php.inc');

function SearchDatabase($PokemonNamesearch)
{

    $SearchLogin = new loginDB();
    return $SearchLogin->SearchDatabase($PokemonNamesearch);
}

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new loginDB();
    return $login->validateLogin($username,$password);
    //return false if not valid
}
function doadd($email,$username,$password)
{
    $userCreation = new loginDB();
    return $userCreation->addUser($email,$username,$password);
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
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
	  if ($SearchResults == false){
		$addClient = new rabbitMQClient("DMZServerinitializer.ini","testServer2");
		$addRequest = array();
		$addRequest['type'] = "addpoke";
		$addRequest['pokemonname'] = $request['pokemonname'];
		$response = $addClient->send_request($addRequest);
	  }
	  else{
          	return $SearchResults;
	  }    
    case "login"://RETURNS 1 IF THE USERS MATCH
        $returnnumber=doLogin($request['username'],$request['password']);
          return $returnnumber;
    case "validate_session":
        return doValidate($request['sessionId']);
      case "register":
          return doadd($request['email'],$request['username'],$request['password']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("LOGINServerinitializer.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>

