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


$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "FitnessCentre";
        
  $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


      $sql= "INSERT INTO 
      registration (`registration_id`, `first_name`, `last_name`, `address`, ` contact_number`, `email_address`, `password`, `gender`)
       VALUES (NULL, '$first_name', '$last_name', '$address', '$contact_number', '$email_address', '$password', '$gender')";

       
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
    }

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
    <input required type="text" name="first_name"><br><br>

    Last Name
    <input required type="text" name="last_name"><br><br>

    Address
    <input required type="text" name="address"><br><br>

    Contact Number
    <input required type="text" name="contact_number"><br><br>

    Email Address
    <input required type="text" name="email_address"><br><br>

    Password
    <input required type="password" name="password"><br><br>

    Confirm Password
    <input required type="password" name="confirm_password"><br><br>

<?php  
    $errors= array();
if( strcmp($password, $confirm_password) != 0 ) {
            array_push($errors, "Passwords do not match");
        }

?>


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
