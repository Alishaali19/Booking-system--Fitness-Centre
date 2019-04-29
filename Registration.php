<?php include "header.php" ?>


<?php 
require "connection.php";

     if (isset($_POST['register'])) {
        
        //google captcha

        $url="https://www.google.com/recaptcha/api/siteverify";
        $secret_key="6Lc3yZcUAAAAADXoVKhMCby0SjiL5ZrkmG0pMlf6";
        $response= $_POST ["g-recaptcha-response"];
        $remoteip= $_SERVER ["REMOTE_ADDR"];

        $details= file_get_contents("$url?secret=$secret_key&response=$response&remoteip=$remoteip");

        $details_info= json_decode($details);  //takes data from webserver and displays it in the webpage. 


        if ($details_info->success) {
          
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $address = $_POST["address"];
        $contact_number = $_POST["contact_number"];
        $email_address = $_POST["email_address"];
        $password = $_POST["password"];
        $confirm_password= $_POST ["confirm_password"];
        $gender = $_POST["gender"];
        $ec_first_name = $_POST["ec_first_name"];
        $ec_last_name = $_POST["ec_last_name"];
        $ec_contact_number = $_POST["ec_contact_number"];

        if ($password ==  $confirm_password) {

      $sql= "INSERT INTO `registration`(`registration_id`, `first_name`, `last_name`, `address`, `contact_number`, `email_address`, `password`, `gender`,`ec_first_name`, `ec_last_name`, `ec_contact_number`)
       VALUES (NULL, '$first_name', '$last_name', '$address', '$contact_number', '$email_address', sha1('$password'), '$gender', '$ec_first_name', '$ec_last_name', '$ec_contact_number')";



    if (mysqli_query($conn, $sql)) {
    header("location: Login.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

       }else{
        echo "Password does not Match";
       }


$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "FitnessCentre";
        
  $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
        }

        else{
            echo "Registration was not successful";
        }


    } //end if

 ?> 


<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>

<style type="text/css">
    input[type=text], input[type=password], input[type=email], input[type=number]{
    width: 20%;
    padding: 10px;
    margin: 8px 0 20px 0;
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

    
    <div id="registration">
        <h2> Register here </h2>
        <h3> Welcome to Registration!</h3>
        <h5>Please fill out the form below:</h5>

 <form action = "Registration.php" method = "POST"> 

    First Name <br>
    <input required placeholder="Enter First Name" type="text" name="first_name"><br><br>

    Last Name <br>
    <input required placeholder="Enter Last Name" type="text" name="last_name"><br><br>

    Address <br>
    <input required placeholder="Enter Address" type="text" name="address"><br><br>

    Contact Number <br>
    <input required placeholder="Contact Number" type="text" name="contact_number"><br><br>

    Email Address <br>
    <input required placeholder="Enter Email" type="email" name="email_address"><br><br>

    Password<br>
    <input minlength="5 characters" maxlength="12 characters" pattern="(?=.*\d)(?=.*[a-z]).{9,}" required placeholder="Enter Password"type="password" name="password"><br><br>

    Confirm Password <br>
    <input minlength="8 characters" required placeholder="Confirm Password" type="password" name="confirm_password"><br><br>


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


    <h4>Emergency Contact Information</h4>
    
    First Name <br>
    <input required placeholder="Enter First Name" type="text" name="ec_first_name"><br> <br>

    Last Name <br>
    <input required placeholder="Enter Last Name"  type="text" name="ec_last_name"><br><br>

    Contact Number <br>
    <input required placeholder="Contact Number"  type="text" name="ec_contact_number"><br>

    <div class="g-recaptcha" data-sitekey="6Lc3yZcUAAAAAMPOPmagOjwn8pWh78KvpFTertwm"></div> <br>


    <input type="submit" name="register" value="Register" class="btn btn-primary btn-large" ><br><br>
    
    
    <br><br>


 </form>
 </center>
    </div>

</body>
</html>

<?php include "footer.php" ?>
