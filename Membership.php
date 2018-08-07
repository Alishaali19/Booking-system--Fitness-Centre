<?php include "header.php" ?>

<?php 
require "connection.php";

if (isset($_POST['signup'])) {

    $mem_first_name = $_POST["mem_first_name"];
    $mem_last_name = $_POST["mem_last_name"];
    $mem_email_address = $_POST["mem_email_address"];
    $age = $_POST["age"];
    $ec_first_name = $_POST["ec_first_name"];
    $ec_last_name = $_POST["ec_last_name"];
    $ec_contact_number = $_POST["ec_contact_number"];
    $personal_trainer = $_POST["personal_trainer"];
    $weight = $_POST["weight"];



$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "FitnessCentre";
        
  $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql= "INSERT INTO `membership` (`membership_id`, `mem_first_name`, `mem_last_name`, `mem_email_address`, `age`, `ec_first_name`, `ec_last_name`, `ec_contact_number`, `personal_trainer`, `weight`) VALUES (NULL, '$mem_first_name', '$mem_last_name', 'l$mem_email_address', '$age', '$ec_first_name', '$ec_last_name', '$ec_contact_number', '$personal_trainer', '$weight')";




  if (mysqli_query($conn, $sql)) {
    echo "Thank you for signning up with us!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
    }

?>

  
<!DOCTYPE html>
<html>
<head>
    <title>Membership</title>
</head>
<body>
<center>
    <div class="container" id="container">

        <h2> Membership Sign Up </h2>

<form action = "Membership.php" method = "POST" id="membershipform"> 

<h4>Personal Information</h4>
        

    First Name<br>
    <input required placeholder="Enter First Name" type="text" name="mem_first_name"><br><br>

    Last Name<br>
    <input required placeholder="Enter Last Name" type="text" name="mem_last_name"><br><br>

    Email Address <br>
    <input required placeholder="Enter Email" type="email" name="mem_email_address"><br><br>

     Age <br>
    <input required placeholder="Age" type="number" name="age"><br><br>



<h4>Emergency Contact Information</h4>
    
    First Name <br>
    <input required placeholder="Enter First Name" type="text" name="ec_first_name"><br> <br>

    Last Name <br>
    <input required placeholder="Enter Last Name"  type="text" name="ec_last_name"><br><br>

    Contact Number <br>
    <input required placeholder="Contact Number"  type="text" name="ec_contact_number"><br>


<h4>*optional </h4>

    Would you like a Personal Trainer?<br>
    <input type="radio" name="personal trainer"
    <?php if (isset($personal_trainer) && $personal_trainer=="yes") echo "checked";?>
    value="yes">Yes
    <input type="radio" name="personal trainer"
     <?php if (isset($personal_trainer) && $personal_trainer=="no") echo "checked";?>
    value="no">No<br><br>

    Weight  <br>
    <input required placeholder="Enter Weight"  type="text" name="weight"> <br><br>

    <input type="submit" name="signup" value="Sign Up">

        
    </div>
    </center>
</body>
</html>

<?php include "footer.php" ?>
