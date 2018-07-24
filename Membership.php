<?php include "header.php" ?>

<?php 
require "connection.php";



?>

  
<!DOCTYPE html>
<html>
<head>
    <title>Membership</title>
</head>
<body>


    <center>
    <div>
        <h2> Membership Sign Up </h2>
        <h3> Standard Membership </h3> 

<form action = "Membership.php" method = "POST"> 

<h4>Personal Information</h4>
        

    First Name
    <input required type="text" name="first_name"><br><br>

    Last Name
    <input required type="text" name="last_name"><br><br>

    Email Address
    <input required type="text" name="email_address"><br><br>

     Are you over 18 years of age? <br>
    <input required type="radio" name="age"
    <?php if (isset($age) && $age=="yes") echo "checked";?>
    value="yes">Yes
    <input type="radio" name="age"
     <?php if (isset($age) && $age=="no") echo "checked";?>
    value="no">No<br><br>



<h4>Emergency Contact Information</h4>
    
    First Name
    <input required type="text" name="ec_first_name"><br> <br>

    Last Name
    <input required type="text" name="ec_last_name"><br><br>

    Contact Number
    <input required type="text" name="ec_contact_number"><br><br>


<h4>*optional </h4>

    Would you like a Personal Trainer?<br>
    <input type="radio" name="personal trainer"
    <?php if (isset($personal_trainer) && $personal_trainer=="yes") echo "checked";?>
    value="yes">Yes
    <input type="radio" name="personal trainer"
     <?php if (isset($personal_trainer) && $personal_trainer=="no") echo "checked";?>
    value="no">No<br><br>

    Weight  
    <input type="text" name="weight"> <br><br>

    <input type="submit" name="signup" value="Sign Up">

    
        
    </div>
</center>
</body>
</html>

<?php include "footer.php" ?>
