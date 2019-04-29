<?php include "header.php";?>
<?php 
session_start();

require "connection.php";

if (isset($_SESSION["registration_id"])) {
  $registration_id =$_SESSION["registration_id"];
}else{ 
  header("location: login.php");
exit();
}


if (isset($_SESSION["membership_id"])) {
	$membership_id = $_SESSION["membership_id"];
	$membership_price= $_SESSION["membership_price"];
	$membership_name=$_SESSION["membership_name"];
}else{
	header("location: membership.php");
	exit();
}

require "connection.php";

//code to insert stripe payment
require_once('stripe/init.php');

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_DxbefFqPl82Ce76BZZken9K7");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
    'amount' => 999,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
]);



//insert into database
$sql = "INSERT INTO `members` (`member_id`, `registration_id`, `membership_id`, `start_date`, `expiry_date`) 
	VALUES (NULL, '$registration_id', '$membership_id', CURRENT_TIMESTAMP, ADDDATE(now(), INTERVAL 1 YEAR));";



	if (mysqli_query($conn, $sql)) {
		
	    header ("location: thank_you.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


 ?>

<?php include "footer.php";?>
