<?php include "header.php"; ?>
<div class="classes">
<h2> Classes </h2> 

</div>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style class="cp-pen-styles">body {
  padding: 1.5em;
  background: #fff;
  background: whitesmoke;
}
 .classes{
  color: white;
  text-indent: 250px;
 } 

.container {
  width: 100%;
  height: 100%;
}
.container .product {
  width: 610px;
  height: 250px;
  display: flex;
  margin: 1em 0;
  border-radius: 5px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: 0px 0px 21px 3px rgba(0, 0, 0, 0.15);
  transition: all .1s ease-in-out;
}
.container .product:hover {
  box-shadow: 0px 0px 21px 3px rgba(0, 0, 0, 0.11);
}
.container .product .img-container {
  flex: 2;
}
.container .product .img-container img {
  object-fit: cover;
  width: 100%;
  height: 100%;
}
.container .product .product-info {
  background: #fff;
  flex: 3;
}
.container .product .product-info .product-content {
  padding: .2em 0 .2em 1em;
}
.container .product .product-info .product-content h1 {
  font-size: 1.5em;
}
.container .product .product-info .product-content p {
  color: #636363;
  font-size: .9em;
  font-weight: bold;
  width: 90%;
}
.container .product .product-info .product-content ul li {
  color: #636363;
  font-size: .9em;
  margin-left: 0;
}
.container .product .product-info .product-content .buttons {
  padding-top: .4em;
}
.container .product .product-info .product-content .buttons .button {
  text-decoration: none;
  color: #5e5e5e;
  font-weight: bold;
  padding: .3em .65em;
  border-radius: 2.3px;
  transition: all .1s ease-in-out;
}
.container .product .product-info .product-content .buttons .add {
  border: 1px #5e5e5e solid;
}
.container .product .product-info .product-content .buttons .add:hover {
  border-color: #6997b6;
  color: #6997b6;
}
.container .product .product-info .product-content .buttons .buy {
  border: 1px #5e5e5e solid;
}
.container .product .product-info .product-content .buttons .buy:hover {
  border-color: #6997b6;
  color: #6997b6;
}
.container .product .product-info .product-content .buttons #price {
  margin-left: 4em;
  color: #5e5e5e;
  font-weight: bold;
  border: 1px solid rgba(137, 137, 137, 0.2);
  background: rgba(137, 137, 137, 0.04);
}
</style>



<div class="container">
<?php 

require "connection.php";
$sql = "SELECT * from classes";
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


       ?>
        <div class="product">
    <div class="img-container">
      <img src="<?php echo $class_image ?>">
    </div>
    <div class="product-info">
      <div class="product-content">
        <h1><?php echo "$class_name"; ?></h1>
          <p><?php echo "$class_description"; ?></p>
        <ul>
          <li><?php echo "$class_schedule"; ?></li> <br>
          <li> Instructor <?php echo "$class_instructor"; ?></li>
          
        </ul>
        <div class="buttons">
          <a href="Confirmation.php?id=<?php echo "$class_id"; ?>" class="button buy" href="#">Book Now!</a>
          <span class="button" id="price"> $ <?php echo "$class_price"; ?></span>
        </div>
      </div>
    </div>
  </div>

       <?php
    }
} else {
    echo "0 results";
}


 ?>

</div>

<?php include "footer.php" ?>


