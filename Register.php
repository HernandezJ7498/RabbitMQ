<!DOCTYPE html>
<html lang="en">
<script>

function HandleRegistrationResponse(response)
{
	var registrationresponse = JSON.parse(response);
    if(registrationresponse == "1"){
        window.location = "index.php";
    }
    
    //gotopage(text);
}

function SendRegistrationRequest()
{
	var newEmail = document.getElementById("newEmail").value;
    var newUsername = document.getElementById('newUsername').value;
    var newPassword = document.getElementById('newPassword').value;
    var registrationRequest = new XMLHttpRequest();
	registrationRequest.open("POST","Login.php",true);
	registrationRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	registrationRequest.onreadystatechange= function ()
	{
		
		if ((this.readyState == 4)&&(this.status == 200))
		{
            HandleRegistrationResponse(this.responseText);
		}
        //document.write(newPassword);
	}
	registrationRequest.send("type=register&email="+newEmail+"&uname="+newUsername+"&pword="+newPassword);
}
function gotopage(canthey){
    if(canthey == "1"){
       document.location.href = "Homepage.php";
    }
    else{
       //document.getElementById("textResponse").innerHTML = "response: Wrong password<p>";
       }
}
    </script>
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/league.jpg');">
			<div class="wrap-login100">
				<!--<form class="login100-form validate-form">-->


					<span class="login100-form-title p-b-34 p-t-27">
						Registration Form
					</span>
                    <div class="wrap-input100 validate-input">
						<input class="input100" id="newEmail" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" id="newUsername" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" id="newPassword" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" id="passwordconfirm" type="password" name="passwordcofirm" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick="SendRegistrationRequest()">
							Register
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="index.php">
							Already have an account? Login.
						</a>
					</div>
				<!--</form>-->
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
