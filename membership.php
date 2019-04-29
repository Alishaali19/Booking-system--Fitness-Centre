<?php include "header.php";?>

<div class="packages">
	 

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
	
	h1{
		color: black;
		text-align: center;
	}
</style>



<div class="container">

	<h1>Membership Packages</h1>
<hr>
<center>
    			<div class="row_pricing">
						<div class="col-md-4">
						<div class="well">
							<h3><b> Silver </b></h3>
							<hr>
							<p> Get a 2 percent discount on all bookings. </p>
							<hr>
							<p>$120 </p>
							<hr>


							<form action="membership_details.php" method="get">
						<input type="hidden" name="membership_id" value="1">

						<input type="Submit" class="btn btn-success btn-block" name="purchase" value="Purchase">
							</form>


						</div>
					</div>



					<div class="row_pricing">
						<div class="col-md-4">
						<div class="well">
							<h3><b> Gold </b></h3>
							<hr>
							<p> Get a 8 percent discount on all bookings. </p>
							<hr>
							<p>$200 </p>
							<hr>
							


							<form action="membership_details.php" method="get">
						<input type="hidden" name="membership_id" value="2">
							<input type="Submit" class="btn btn-success btn-block" name="purchase" value="Purchase">
							</form>


						</div>
					</div>

				<div class="row_pricing">
						<div class="col-md-4">
						<div class="well">
							<h3><b> Platinum </b></h3>
							<hr>
							<p> Get a 10 percent discount on all bookings. </p>
							<hr>
							<p>$250 </p>
							<hr>
							


							<form action="membership_details.php" method="get">
						<input type="hidden" name="membership_id" value="3">
							<input type="Submit" class="btn btn-success btn-block" name="purchase" value="Purchase">
							</form>


						</div>
					</div>



					
					<div class="row_pricing">
						<div class="col-md-4">
						<div class="well">
							<h3><b> Student </b></h3>
							<hr>
							<p> Get a 5 percent discount on all bookings. </p>
							<hr>
							<p>$165 </p>
							<hr>
					

							<form action="membership_details.php" method="get">
						<input type="hidden" name="membership_id" value="4">
							<input type="Submit" class="btn btn-success btn-block" name="purchase" value="Purchase">
							</form>


						</div>
					</div>
				


</div>
</div>
</div>
</div>
</div>
</div>
</center>

<?php include "Footer.php" ?>



