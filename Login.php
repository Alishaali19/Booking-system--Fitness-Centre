<?php include "header.php"; ?>
<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"]== "POST") {

	require "connection.php";

	$email_address= $_POST["email_address"];
	$password= $_POST["password"];


	$sql= "SELECT * from registration WHERE email_address = '$email_address' AND password= sha1('$password')";
	echo ("Please enter valid login info.");

	$result = mysqli_query ($conn, $sql);

	

	if (mysqli_num_rows ($result)> 0) {
		//output data of each row
		while ($row= mysqli_fetch_assoc($result)){
			
			$_SESSION["registration_id"] = $row["registration_id"];

			header ("location: Classes.php");

		}
	} else { echo "";
}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<style type="text/css">
		input[type=text], input[type=password], input[type=email], input[type=number]{
    width: 20%;
    padding: 10px;
    margin: 8px 0 2px 0;
    border: none;
    background-color: white;
    outline-color: black;
    color: black;
    outline: solid;
    
}

	</style>
</head>
<body>

<center>
	

	<div id="loginform">


    <h2>Login </h2>
	<h3> Welcome back! </h3>

<form action = "login.php" method ="post">
	
	Email <br>
	<input required placeholder="Enter Email" type="email" name="email_address"> <br> <br>

    Password <br>
	<input minlength="8 characters" required placeholder="Enter Password" id= 'pass' type="password" name="password" > <br> <br>

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
	<button name="confirm" class="btn btn-primary btn-large" type="submit" >Login</button>
 <br><br>

	<a href="reset_password.php"> Forgot password? </a> <br><br>
	Don't have an account? <a href="Registration.php">Register Here!</a> <br><br>



</form>
	</div>
</center>
</body>
</html>

<?php include "footer.php" ?>

