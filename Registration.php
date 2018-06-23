
<?php 
    if (isset($_POST['register'])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $address = $_POST["address"];
        $contact_number = $_POST["contact_number"];
        $email_address = $_POST["email_address"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $age = $_POST["age"];
        $weight = $_POST["weight"];
        $gender = $_POST["gender"];
        $personal_trainer = $_POST["personal_trainer"];
        $ec_first_name= $POST["ec_first_name"];
        $ec_last_name= $POST["ec_last_name"];
        $ec_contact_number= $POST["ec_contact_number"];


        require "connection.php";

        $sql = "INSERT INTO Registration ('registration_id', 'first_name', 'last_name', 'address', 'contact_number', 'email_address', 'password', 'confirm_password', 'age', 'weight', 'gender', 'personal_trainer', 'ec_first_name', 'ec_last_name', 'ec_contact_number') VALUES ('$first_name', '$last_name', '$address', '$contact_number', '$email_address', '$password', '$confirm_password', '$age', '$weight', '$gender', '$personal_trainer', '$ec_first_name', '$ec_last_name', '$ec_contact_number') ";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

            $conn->close();

    }

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






 <form action = "" method = "POST"> 

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
    <input required type="password" name="pass"><br><br>

    Confirm Password
    <input required type="password" name="pass"><br><br>

    Age <input required type="Number" name="age">      Weight (optional):<input type="number" name="weight"><br><br>


    Gender:
    <input required type="radio" name="gender"
    <?php if (isset($gender) && $gender=="female") echo "checked";?>
    value="female">Female
    <input type="radio" name="gender"
     <?php if (isset($gender) && $gender=="male") echo "checked";?>
    value="male">Male<br><br>

    Would you like a Personal Trainer?<br>
    <input required type="radio" name="personal trainer"
    <?php if (isset($personal_trainer) && $gender=="yes") echo "checked";?>
    value="yes">Yes
    <input type="radio" name="personal trainer"
     <?php if (isset($personal_trainer) && $gender=="no") echo "checked";?>
    value="no">No<br><br>


    Emergency Contact <br>
    First Name
    <input required type="text" name="firstname"><br>

    Last Name
    <input required type="text" name="lastname"><br>

    Contact Number
    <input required type="text" name="number"><br><br>

    
    <input type="Submit" name="register" value="Register">


 </form>
    </div>
</center>

</body>
</html>
