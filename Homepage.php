<!DOCTYPE html>
<?php
//if(isset($_SESSION['username'])){
//}
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
function logout(){
    if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}
if(isset($_GET['hello'])){
    logout();
    header("location:index.php");
}
//echo $_GET['username'];
?>
<script>
function HandleLoginResponse(response)
{
	//document.getElementById('check').innerHTML = "here";
    var data = JSON.parse(response);
    console.log(data);
   document.getElementById("stats").textContent = " ";
    document.getElementById('name').innerHTML = data.species.name;
    for (i=0; i< data.stats.length; i++){
		stats = data.stats[i].stat.name + ": " + data.stats[i].base_stat + " ";
		document.getElementById("stats").textContent += stats;
        //$(".stats").append(stats;
    }
}
function SendPokemonRequest()
{
    
	var pokemonname = document.getElementById('pokemonname').value;
    var request = new XMLHttpRequest();
	request.open("POST","search.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
            HandleLoginResponse(this.responseText);
		}		
	}
	request.send("type=searchpoke&pname="+pokemonname);
}
</script>
<p id="check">WELCOME</p>

<input type="text" id="pokemonname" placeholder="Input Pokemon Name">
<button type="button" id="jstrigger" onclick="SendPokemonRequest()">Search</button>
<div class="pokemon-container">
    <p id=name></p>
    <p class=ability></p>
    <p class=movees></p>
    <p id="stats"></p>
<a href="Homepage.php?hello=true">
    Logout
</a>
<a href="AboutUs.php">
    About Us
</a>