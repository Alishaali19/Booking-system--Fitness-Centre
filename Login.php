<?php include "header.php" ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>
<div class="container">
	<div id="loginform">


    <h2>Login </h2>
	<h3> Welcome back! </h3>

<form action = "login.php" method ="post">
	
	Email 
	<input required placeholder="Enter Email" type="email" name="email"> <br> <br>

    Password
	<input required placeholder="Enter Password" id= 'pass' type="password" name="pass" > <br> <br>

	<input type="checkbox" id= "check" onclick='showPass();'> Show Password

<script>
	function showPass(){
		var pass= document.getElementById('pass');
		if(document.getElementById('check').checked){
			pass.setAttribute('type','text');
		}else{
			pass.setAttribute('type', 'password');
		}
	}
</script>

	<br><br>

	Don't have an account? <a href="Registration.php">Register Here!</a> <br><br>

	Want to become a member? <a href="Membership.php"> Sign Up Here! </a> <br> <br>

	<input type="submit" name="Login" value="Login"> <br><br>


</form>
	</div>
</div>
</center>
</body>
</html>

<?php include "footer.php" ?>

