
<?php 
    /* if (isset($_POST['register'])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $address = $_POST["address"];
        $contact_number = $_POST["contact_number"];
        $email_address = $_POST["email_address"];
        $password = $_POST["password"];
        $gender = $_POST["gender"];
        

       require "connection.php";


        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

            $conn->close();

    }
 
    $errors = array();

      if( strcmp($password, $confirm_password) != 0 ) {
            array_push($errors, "Passwords do not match");
        }*/


 ?> 


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<center>
    
    <div>
        <h2> Register here </h2>
        <h3> Welcome to Registration!</h3>


 <form action = "registration.php" method = "POST"> 

    First Name
    <input required type="text" name="firstname"><br><br>

    Last Name
    <input required type="text" name="lastname"><br><br>

    Address
    <input required type="text" name="address"><br><br>

    Contact Number
    <input required type="text" name="contact"><br><br>

    Email Address
    <input required type="text" name="email"><br><br>

    Password
    <input required type="password" name="password"><br><br>

    Confirm Password
    <input required type="password" name="confirm_password"><br><br>

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
