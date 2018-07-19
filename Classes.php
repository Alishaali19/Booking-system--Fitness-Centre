<?php include "header.php" ?>

<link rel="stylesheet" type="text/css" href="style.css">


<h2> Classes</h2> 

<?php
require "connection.php"

$sql = "SELECT * from classes";

$results= mysqli_query ($conn, $sql);

if (mysqli_num_rows($result) > 0){
  // output data of each row
 while ($row = mysqli_fetch_assoc($result)){

  ?>


  <figure class="snip1195">

  <h4>Zumba</h4>

  <div class="image">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample14.jpg" alt="sq-sample14"/>
  </div>

  <div class="rating">
    <i class="ion-ios-star"></i> <i class="ion-ios-star"></i> <i class="ion-ios-star"></i> <i class="ion-ios-star"></i> <i class="ion-ios-star-outline"> </i>
  </div>

  <figcaption>
    <p>
      Zumba description
      Zumba Schedule
      Zumba instructor name
    </p>

    <div class="price">
      <s>$24.00</s>$19.00
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
