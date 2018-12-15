<!doctype html>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
?>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="plusDatabaseStyles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</head>
<script>
function onetimeadd()
{
    var tmps = new XMLHttpRequest();
	tmps.open("POST","Login.php",true);
	tmps.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	tmps.onreadystatechange= function ()
	{
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
           // Handleaddresponse(this.responseText);
		}
        //document.write(newPassword);
	}
	tmps.send("type=onetime");
}
function HandleReturnedArray(response, type){
    //alert("Worked");
    var returnedarrays = JSON.parse(response);
    if(type == "botharrays"){
        console.log(returnedarrays);
        document.getElementById("Poke1pic").src = returnedarrays[2][0];
        document.getElementById("Poke2pic").src = returnedarrays[2][1];
        document.getElementById("Poke3pic").src = returnedarrays[2][2];
        document.getElementById("Poke4pic").src = returnedarrays[2][3];
        document.getElementById("Poke5pic").src = returnedarrays[2][4];
        document.getElementById("normalstrong").innerHTML = "Normal";
        document.getElementById("normalval").innerHTML = returnedarrays[1]['normal'];
        document.getElementById("fightingstrong").innerHTML = "Fighting";
        document.getElementById("fightingval").innerHTML = returnedarrays[1]['fighting'];
        document.getElementById("flyingstrong").innerHTML = "Flying";
        document.getElementById("flyingval").innerHTML = returnedarrays[1]['flying'];
        document.getElementById("poisonstrong").innerHTML = "Poison";
        document.getElementById("poisonval").innerHTML = returnedarrays[1]['poison'];
        document.getElementById("groundstrong").innerHTML = "Ground";
        document.getElementById("groundval").innerHTML = returnedarrays[1]['ground'];
        document.getElementById("rockstrong").innerHTML = "Rock";
        document.getElementById("bugstrong").innerHTML = "Bug";
        document.getElementById("ghoststrong").innerHTML = "Ghost";
        document.getElementById("steelstrong").innerHTML = "Steel";
        document.getElementById("firestrong").innerHTML = "Fire";
        document.getElementById("waterstrong").innerHTML = "Water";
        document.getElementById("grassstrong").innerHTML = "Grass";
        document.getElementById("electricstrong").innerHTML = "Electric";
        document.getElementById("psychicstrong").innerHTML = "Psychic";
        document.getElementById("icestrong").innerHTML = "Ice";
        document.getElementById("dragonstrong").innerHTML = "Dragon";
        document.getElementById("fairystrong").innerHTML = "Fairy";
        document.getElementById("darkstrong").innerHTML = "Dark";
        document.getElementById("yourteam").innerHTML = "YOUR TEAM";
    }
    else if(type=="loadlist"){
       console.log(returnedarrays);    
        var LeftColumn = "";
        var RightColumn = "";
        //console.log(returnedarrays[0]['name']);
        var i = 0;
        while(i<151){ 
            while(i<18){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group1name").innerHTML = LeftColumn;
            document.getElementById("group1type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<36){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group2name").innerHTML = LeftColumn;
            document.getElementById("group2type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<54){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group3name").innerHTML = LeftColumn;
            document.getElementById("group3type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<72){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group4name").innerHTML = LeftColumn;
            document.getElementById("group4type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<90){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group5name").innerHTML = LeftColumn;
            document.getElementById("group5type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<108){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group6name").innerHTML = LeftColumn;
            document.getElementById("group6type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<126){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group7name").innerHTML = LeftColumn;
            document.getElementById("group7type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<144){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group8name").innerHTML = LeftColumn;
            document.getElementById("group8type").innerHTML = RightColumn;
            LeftColumn = "";
            RightColumn = "";
            while(i<151){
                LeftColumn += (i+1)+"."+returnedarrays[i]['name']+"<br />";
                RightColumn += returnedarrays[i]['type']+"<br />";
                i++;
            }
            document.getElementById("group9name").innerHTML = LeftColumn;
            document.getElementById("group9type").innerHTML = RightColumn;
        }
    }
}
function teamcheck()
{
    var tmps = new XMLHttpRequest();
    var typebotharrays = "botharrays";
    var Pokemon1 = document.getElementById('Pokemon1Name').value;
    var Pokemon2 = document.getElementById('Pokemon2Name').value;
    var Pokemon3 = document.getElementById('Pokemon3Name').value;
    var Pokemon4 = document.getElementById('Pokemon4Name').value;
    var Pokemon5 = document.getElementById('Pokemon5Name').value;
	tmps.open("POST","Login.php",true);
	tmps.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	tmps.onreadystatechange= function ()
	{
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
            HandleReturnedArray(this.responseText,typebotharrays);
		}
        //document.write(newPassword);
	}
	tmps.send("type=load&poke1="+Pokemon1+"&poke2="+Pokemon2+"&poke3="+Pokemon3+"&poke4="+Pokemon4+"&poke5="+Pokemon5);
}
function pokelist(){
    var listrequest = new XMLHttpRequest();
    var typeloadlist = "loadlist";
	listrequest.open("POST","Login.php",true);
	listrequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	listrequest.onreadystatechange= function ()
	{
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
           HandleReturnedArray(this.responseText,typeloadlist);
		}
        //document.write(newPassword);
	}
	listrequest.send("type=listrequest");
}
window.onload = pokelist;
</script>
<body bgcolor='#f96e5b'>

<div id='cssmenu'>
<ul>
   <li><a href='Homepage.php'><span>Pokedex</span></a></li>
   <li class='active'><a href='plusDatabase.php'><span>+Databse</span></a></li>
   <li><a href='#'><span>Build your Team</span></a></li>
   <li><a href='#'><span>Team Suggestion</span></a></li>
   <li><a href='#'><span>Forums</span></a></li>
   <li class='last'><a href='Homepage.php?Loggedout=true'><span>Logout</span></a></li>
</ul>
</div>
    <div  style="margin-left: 10% margin-top: 20%">
        <input type="text" id="Pokemon1Name" placeholder="Pokemon1">
        <input type="text" id="Pokemon2Name" placeholder="Pokemon2">
        <input type="text" id="Pokemon3Name" placeholder="Pokemon3">
        <input type="text" id="Pokemon4Name" placeholder="Pokemon4">
        <input type="text" id="Pokemon5Name" placeholder="Pokemon5">
        <button type="button" id="addbutton" Onclick="onetimeadd()">Search</button>
        <button type="button" id="Loadbutton" Onclick="teamcheck()">Check Teams</button>
    </div>
    <h1 align="center" id="yourteam"></h1>
    <div align="center">
        <img id="Poke1pic" src="" height="200" />
        <img id="Poke2pic" src="" height="200" />
        <img id="Poke3pic" src="" height="200" />
        <img id="Poke4pic" src="" height="200" />
        <img id="Poke5pic" src="" height="200" />
    </div>
    <table align="center">
        <tr>
            <th width="100px" id="normalstrong">
                
            </th>
            <th width="100px" id="fightingstrong">
                
            </th>
            <th width="100px" id="flyingstrong">
                
            </th>
            <th width="100px" id="poisonstrong">
                
            </th>
            <th width="100px" id="groundstrong">
                
            </th>
            <th width="100px" id="rockstrong">
                
            </th>
            <th width="100px" id="bugstrong">
                
            </th>
            <th width="100px" id="ghoststrong">
                
            </th>
            <th width="100px" id="steelstrong">
                
            </th>
        </tr>
        <tr>
            <td id="normalval" align="center">
                
            </td>
            <td id="fightingval" align="center">
                
            </td>
            <td id="flyingval" align="center">
                
            </td>
            <td id="poisonval" align="center">
                
            </td>
            <td id="groundval" align="center">
                
            </td>
            <td id="rockval" align="center">
                
            </td>
            <td id="bugvlval" align="center">
                
            </td>
            <td id="ghostlval" align="center">
                
            </td>
            <td id="steelval" align="center">
                
            </td>
        </tr>
        <tr>
            <th width="100px" id="firestrong">
                
            </th>
            <th width="100px" id="waterstrong">
                
            </th>
            <th width="100px" id="grassstrong">
                
            </th>
            <th width="100px" id="electricstrong">
                
            </th>
            <th width="100px" id="psychicstrong">
                
            </th>
            <th width="100px" id="icestrong">
                
            </th>
            <th width="100px" id="dragonstrong">
                
            </th>
            <th width="100px" id="fairystrong">
                
            </th>
            <th width="100px" id="darkstrong">
                
            </th>
        </tr>
    </table>
    <table align="center" border="1" bgcolor="#FFA07A">
        <tr>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
            <th>
                Pokemon
            </th>
            <th>
                Type
            </th>
        </tr>
        <tr>
            <td id="group1name">
            </td>
            <td id="group1type">
            </td>  
            <td id="group2name">
            </td>
            <td id="group2type">
            </td> 
            <td id="group3name">
            </td>
            <td id="group3type">
            </td> 
            <td id="group4name">
            </td>
            <td id="group4type">
            </td> 
            <td id="group5name">
            </td>
            <td id="group5type">
            </td> 
            <td id="group6name">
            </td>
            <td id="group6type">
            </td> 
            <td id="group7name">
            </td>
            <td id="group7type">
            </td> 
            <td id="group8name">
            </td>
            <td id="group8type">
            </td> 
            <td id="group9name" align="top">
            </td>
            <td id="group9type" align="top">
            </td> 
        </tr>
    </table>
    <div style="margin-left: 32%">
    <h1 id="confirmation"><strong><font size="25"></font></strong></h1>
    </div>
</body>
<html>