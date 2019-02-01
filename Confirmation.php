<?php 
session_start();

if(isset($_SESSION["registration_id"])){

  $reg_id = $_SESSION["registration_id"];
}else{
  header("location: Confirmation.php");
}


if(isset($_GET["id"])){
  $class_id = $_GET["id"];
}else{
  header("location: Login.php");
}


  if (isset($_POST["confirm"])) {


    require "connection.php";


    $sql = "INSERT INTO `confirmation` (`confirmation_id`, `class_id`, `registration_id`, `confirmation_date`) 
    VALUES (NULL, '$class_id', '$reg_id', CURRENT_TIMESTAMP)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

    header("location: classes.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

    
  }



if (isset($_POST["cancel"])) {
  header("location: classes.php");
}



include "header.php"; ?>




<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
  .confirmation{
    
    opacity: 1;
    filter: alpha(opacity= 100);
    color: black;


  }


</style>




<div class="confirmation">
<?php 

require "connection.php";
$sql = "SELECT * from classes where class_id = $class_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

  $class_id= $row["class_id"];
  $class_name= $row["class_name"];
  $class_description= $row["class_description"];
  $class_price = $row["class_price"];
  $class_schedule= $row["class_schedule"];
  $class_image= $row["class_image"];
  $class_instructor= $row["class_instructor"];

}
}
       ?>

       <div class="modal-dialog">
        <div class="modal-content">

        
<center>
  <h2> Booking Confirmation</h2> <br>
       <h3>Confirmation</h3>
        <!-- design here -->
       
        Class Name : <?php echo "$class_name"; ?>  <br> <br>
        Class Price: <?php echo "$class_price"; ?> <br><br>
        Class Instructor:  <?php echo "$class_instructor"; ?> <br><br>

  
      <div class="modal-footer">
       <form action="Confirmation.php?id=<?php echo "$class_id"; ?>" method="post">
       <button name="confirm" class="btn btn-primary btn-lg" type="submit">Confirm Booking</button>

       <button name="cancel" class="btn btn-danger btn-medium" type="submit">Cancel</button>

</form>
</center>
</div>
</div>
</div>
</div>



