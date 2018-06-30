
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div>
        <h2>  </h2>
        <h4> </h4>


        Are you 18 years old or over? 
    <input required type="radio" name="age"
    <?php if (isset($age) && $age=="yes") echo "checked";?>
    value="yes">Yes
    <input type="radio" name="age"
     <?php if (isset($age) && $age=="no") echo "checked";?>
    value="no">No<br><br>


    Emergency Contact <br>
    First Name
    <input required type="text" name="firstname"><br>

    Last Name
    <input required type="text" name="lastname"><br>

    Contact Number

Would you like a Personal Trainer?<br>
    <input required type="radio" name="personal trainer"
    <?php if (isset($personal_trainer) && $personal_trainer=="yes") echo "checked";?>
    value="yes">Yes
    <input type="radio" name="personal trainer"
     <?php if (isset($personal_trainer) && $personal_trainer=="no") echo "checked";?>
    value="no">No<br><br>

    
        
    </div>

</body>
</html>


