<?php include "header.php" ?>

<div class="packages">
	<h1>Membership Packages</h1> <br>

	<div>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
	
	h1{
		color: white;
		text-align: center;
	}
</style>



<?php  
require "connection.php";
$sql = "SELECT * from packages";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

  $package_id= $row["package_id"];
  $package_name= $row["package_name"];
  $class_details= $row["package_details"];
  $package_price = $row["package_price"];
 

  ?>


<div class="container">
    			<div class="row_pricing">
						<div class="col-md-4">
						<div class="well">
							<h3><b><?php echo "$package_name"; ?></b></h3>
							<hr>
							<p><?php echo "$package_details"; ?></p>
							<hr>
							<p>$ <?php echo "$package_price"; ?></p>
							<hr>
							<a href="#" class="btn btn-success btn-block">Purchase</a>


							<form action="membership_details.php" method="get">
						<input type="text" name="membership_id" value="">
							<input type="submit" name="select">
							</form>


						</div>
					</div>

<?php
    }
} else {
    echo "0 results";
}


 ?>

</div>

</div>

<?php include "Footer.php" ?>



