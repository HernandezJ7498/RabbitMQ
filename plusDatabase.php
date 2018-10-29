<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="plusDatabaseStyles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>CSS MenuMaker</title>
</head>
<script>
function HandleAddResponse(response)
{
    //document.getElementById('check').innerHTML = "here";
   var addResults = JSON.parse(response);
    console.log(addResults);
    if(addResults == 1){
       document.getElementById('confirmation').innerHTML = "Pokemon Has Been Added To Your Pokedex";
    }
    else{
        document.getElementById('confirmation').innerHTML = "Couldn't Add Pokemon To Pokedex";
        alert("Please check your spelling");
    }
}
function SendAddRequest()
{
   
    var pokemonname = document.getElementById('addpokemonname').value;
    var request = new XMLHttpRequest();
    request.open("POST","search.php",true);
    request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    request.onreadystatechange= function ()
    {
       
        if ((this.readyState == 4)&&(this.status == 200))
        {
            HandleAddResponse(this.responseText);
        }       
    }
    request.send("type=addpoke&pname="+pokemonname);
}
</script>
<body bgcolor='#f96e5b'>

<div id='cssmenu'>
<ul>
   <li><a href='Homepage.php'><span>Pokedex</span></a></li>
   <li class='active'><a href='plusDatabase.php'><span>+Databse</span></a></li>
   <li><a href='#'><span>Teams</span></a></li>
   <li><a href='#'><span>Teams</span></a></li>
   <li><a href='#'><span>Forums</span></a></li>
   <li class='last'><a href='Homepage.php?Loggedout=true'><span>Logout</span></a></li>
</ul>
</div>
    <div  style="margin-left: 41%">
        <input type="text" id="addpokemonname" placeholder="Input Pokemon Name">
        <button type="button" id="addbutton" onclick="SendAddRequest()">Search</button>
    </div>
    <div style="margin-left: 32%">
    <h1 id="confirmation"><strong><font size="25"></font></strong></h1>
    </div>
</body>
<html>