<!DOCTYPE html>
<?php
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
?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
    <script>
function HandleLoginResponse(response)
{
    //document.getElementById('check').innerHTML = "here";
    var data = JSON.parse(response);
    console.log(data);
   document.getElementById("statos").innerHTML = "<strong>Stats:</strong><br /> ";
    document.getElementById("pokepicture").src = data.sprites.front_default;
    document.getElementById('name').innerHTML = "<strong>Name:</strong> " + data.species.name;
    for (i=0; i< data.stats.length; i++){
        stats = data.stats[i].stat.name + ": " + data.stats[i].base_stat + "<br />";
        document.getElementById("statos").innerHTML += stats;
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
	<h1>POKEDEX</h1>
    <div  style="margin-left: 39%">
        <input type="text" id="pokemonname" placeholder="Input Pokemon Name">
        <button type="button" id="jstrigger" onclick="SendPokemonRequest()">Search</button>
    </div>
	<div id="pokedex">
  <div id="left">
    <div id="logo"></div>
    <div id="bg_curve1_left"></div>
    <div id="bg_curve2_left"></div>
    <div id="curve1_left">
      <div id="buttonGlass">
        <div id="reflect"> </div>
      </div>
      <div id="miniButtonGlass1"></div>
      <div id="miniButtonGlass2"></div>
      <div id="miniButtonGlass3"></div>
    </div>
    <div id="curve2_left">
      <div id="junction">
        <div id="junction1"></div>
        <div id="junction2"></div>
      </div>
    </div>
    <div id="screen">
      <div id="topPicture">
        <div id="buttontopPicture1"></div>
        <div id="buttontopPicture2"></div>
      </div>
      <div id="picture">
        <img id="pokepicture" src="" height="170" />
      </div>
      <div id="buttonbottomPicture"></div>
      <div id="speakers">
        <div class="sp"></div>
        <div class="sp"></div>
        <div class="sp"></div>
        <div class="sp"></div>
      </div>
    </div>
    <div id="bigbluebutton"></div>
    <div id="barbutton1"></div>
    <div id="barbutton2"></div>
    <div id="cross">
      <div id="leftcross">
        <div id="leftT"></div>
      </div>
      <div id="topcross">
        <div id="upT"></div>
      </div>
      <div id="rightcross">
        <div id="rightT"></div>
      </div>
      <div id="midcross">
        <div id="midCircle"></div>
      </div>
      <div id="botcross">
        <div id="downT"></div>
      </div>
    </div>
  </div>
  <div id="right">
    <div id="stats">
      <p id="name"></p>
      <p id="statos"></p>
    </div>
    <div id="blueButtons1">
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
    </div>
    <div id="blueButtons2">
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
    </div>
    <div id="miniButtonGlass4"></div>
    <div id="miniButtonGlass5"></div>
    <div id="barbutton3"></div>
    <div id="barbutton4"></div>
    <div id="yellowBox1"></div>
    <div id="yellowBox2">
    </div>
    <div id="bg_curve1_right"></div>
    <div id="bg_curve2_right"></div>
    <div id="curve1_right"></div>
    <div id="curve2_right"></div>
  </div>
</div>  
    <a href="Homepage.php?hello=true">
    Logout
</a>
</body>
</html>

<!--<p id="check">WELCOME</p>

<input type="text" id="pokemonname" placeholder="Input Pokemon Name">
<button type="button" id="jstrigger" onclick="SendPokemonRequest()">Search</button>
<div class="pokemon-container">
    <p id=name></p>
    <td><img id="pokepicture" src="blank"></td>
    <p class=ability></p>
    <p class=movees></p>
    <p id="stats"></p>
<a href="Homepage.php?hello=true">
    Logout
</a>
<a href="AboutUs.php">
    About Us
</a>-->