<?php include "header.php" ?>

<link rel="stylesheet" type="text/css" href="style.css">


<h2> Classes</h2> 

<?php
require "connection.php"

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "FitnessCentre";
        
  $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * from classes";

$results= mysqli_query ($conn, $sql);

if (mysqli_num_rows($result) > 0){
  // output data of each row
 while ($row = mysqli_fetch_assoc($result)){

  $class_id= $row["class_id"];
  $class_name= $row["class_name"];
  $class_description= $row["class_description"];
  $class_price = $row["class_price"];
  $class_schedule= $row["class_schedule"];
  $class_image= $row["class_image"];
  $class_instructor= $row["class_instructor"];



  ?>



  <figure class="snip1195">

  <h4> <?php echo "$class_name"; ?></h4>

  <div class="class_image">
    <img src= <?php echo "$class_image" ?>/>
  </div>

  <div class="rating">
    <i class="ion-ios-star"></i> <i class="ion-ios-star"></i> <i class="ion-ios-star"></i> <i class="ion-ios-star"></i> <i class="ion-ios-star-outline"> </i>
  </div>

  <figcaption>
    <p>
      <?php echo " $class_description " ?>
      <?php echo " $class_schedule " ?>
      <?php echo " $class_instructor " ?>
    </p>

    <div class="price">
      <s> <?php echo"$class_price " ?> </s>
    </div>

  </figcaption><a href="#" class="add-to-cart">Add to Cart</a>
</figure>

  

  <?php  

 }

  } else{
    echo "0 results";
  }

?>


<?php include "footer.php" ?>
