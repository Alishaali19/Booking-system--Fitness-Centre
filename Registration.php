<?php include "header.php" ?>

<?php 
require "connection.php";

     if (isset($_POST['register'])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $address = $_POST["address"];
        $contact_number = $_POST["contact_number"];
        $email_address = $_POST["email_address"];
        $password = $_POST["password"];
        $confirm_password= $_POST ["confirm_password"];
        $gender = $_POST["gender"];

        if ($password ==  $confirm_password) {

      $sql= "INSERT INTO `registration`(`registration_id`, `first_name`, `last_name`, `address`, `contact_number`, `email_address`, `password`, `gender`) VALUES (NULL, '$first_name', '$last_name', '$address', '$contact_number', '$email_address', sha1('$password'), '$gender')";


    if (mysqli_query($conn, $sql)) {
    echo "Thank you for registering!";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

       }else{
        echo "Password does not Match";
       }

header("location: Homepage.php");

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "FitnessCentre";
        
  $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    } //end if

 ?> 


<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
<center>
    
    <div>
        <h2> Register here </h2>
        <h3> Welcome to Registration!</h3>

 <form action = "Registration.php" method = "POST"> 

    First Name 
    <input required placeholder="Enter First Name" type="text" name="first_name"><br><br>

    Last Name 
    <input required placeholder="Enter Last Name" type="text" name="last_name"><br><br>

    Address 
    <input required placeholder="Enter Address" type="text" name="address"><br><br>

    Contact Number 
    <input required placeholder="Contact Number" type="text" name="contact_number"><br><br>

    Email Address 
    <input required placeholder="Enter Email" type="email" name="email_address"><br><br>

    Password
    <input minlength="5 characters" required placeholder="Enter Password"type="password" name="password"><br><br>

    Confirm Password 
    <input minlength="5 characters" required placeholder="Confirm Password" type="password" name="confirm_password"><br><br>

    Gender:
    <input required type="radio" name="gender"
    <?php if (isset($gender) && $gender=="female") echo "checked";?>
    value="female">Female

    <input type="radio" name="gender"
     <?php if (isset($gender) && $gender=="male") echo "checked";?>
    value="male">Male

    <input type="radio" name="gender"
     <?php if (isset($gender) && $gender=="other") echo "checked";?>
    value="other">Other<br><br>

    <input type="Submit" name="register" value="Register">


 </form>
 </center>
    </div>

</body>
</html>

<?php include "footer.php" ?>
