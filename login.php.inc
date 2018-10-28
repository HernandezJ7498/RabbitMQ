<?php
class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("127.0.0.1","test","4321Password.","PokemonDatabase");

	if ($this->logindb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}
public function test($pokename){
    $apiurl = "https://pokeapi.co/api/v2/pokemon/".$pokename."/";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
    $RawPokemonData = curl_exec($ch);
    curl_close($ch);
    $PokemonData = json_decode($RawPokemonData,true);
    $ArrayofStats[] = $PokemonData['id'];
    $ArrayofStats[] = $PokemonData['name'];
    foreach($PokemonData['stats'] as $StatData){
        $ArrayofStats[] = $StatData['base_stat'];
    }
    $ArrayofStats[] = $PokemonData['sprites']['front_default'];
    $T0 = $this->logindb->real_escape_string($ArrayofStats[0]);
    $T1 = $this->logindb->real_escape_string($ArrayofStats[1]);
    $T2 = $this->logindb->real_escape_string($ArrayofStats[2]);
    $T3 = $this->logindb->real_escape_string($ArrayofStats[3]);
    $T4 = $this->logindb->real_escape_string($ArrayofStats[4]);
    $T5 = $this->logindb->real_escape_string($ArrayofStats[5]);
    $T6 = $this->logindb->real_escape_string($ArrayofStats[6]);
    $T7 = $this->logindb->real_escape_string($ArrayofStats[7]);
    $T8 = $this->logindb->real_escape_string($ArrayofStats[8]);
    $statement = "INSERT INTO Pokemons VALUES ('$T0','$T1','$T2','$T3','$T4','$T5','$T6','$T7','$T8')";
    $this->logindb->query($statement);
    for($i = 0;$i<count($ArrayofStats);$i++){
       echo $ArrayofStats[$i]." ".$i.PHP_EOL;
    }
    /*foreach($ArrayofStats as $InsertArray){
        echo $InsertArray.PHP_EOL;
    }*/
    return $RawPokemonData;
}
public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from RegisteredUsers where username = '$un'";
	$response = $this->logindb->query($statement);

	while ($row = $response->fetch_assoc())
	{
		echo "checking password for $username".PHP_EOL;
		if ($row["password"] == $pw)
		{
			echo "passwords match for $username".PHP_EOL;
            return 1;// password match
		}
		echo "passwords did not match for $username".PHP_EOL;
	}
	return 0;//no users matched username
}
public function addUser($email,$username,$password)
{
    $em = $this->logindb->real_escape_string($email);
    $un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "INSERT INTO RegisteredUsers VALUES ('$em', '$un','$pw')";
    $this->logindb->query($statement);
    echo "user added".PHP_EOL;
    return 1;

}
}
?>
