<?php include "header.php";?>
<?php
session_start();

//checks to see if logged in.

if (isset($_SESSION["registration_id"])) {
  $registration_id =$_SESSION["registration_id"];
}else{ 
  header("location: login.php");
}


//stores the membership id in url
if (isset($_GET["membership_id"])) {
  $membership_id= $_GET["membership_id"];
}else{
  header("location: membership.php");
}


require "connection.php";

$sql = "SELECT * FROM membership where membership_id= $membership_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $membership_title = $row["membership_title"];
        $membership_discount = $row["membership_discount"];
        $membership_price = $row["membership_price"];

    }
} else {
    echo "0 results";
}

//sessions
$_SESSION["membership_id"]= $membership_id;
$_SESSION["membership_discount"]= $membership_discount;
$_SESSION["membership_price"]= $membership_price;



?>

<div class="container">
<h1>Membership Details</h1>

<hr>

<h4>Please review your membership purchase below. 
 </h4> <br>

<p><b>Membership Package:</b> <?php echo $membership_title; ?></p>
<p><b>Membership Cost: </b> $ <?php echo $membership_price; ?> </p>
<p><b>Membership Package Discount:</b> <?php echo $membership_discount; ?>% </p>



<hr>

<h4>Please enter your credit card infomation to submit your purchase.</h4>



<style type="text/css">
	
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
	</style>

<script src="https://js.stripe.com/v3/"></script>

<form action="membership_process.php" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>

<script type="text/javascript">
	
	// Create a Stripe client.
var stripe = Stripe('pk_test_Zxg63EWXANyCzQjt4qxTogZl');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
<?php  

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

?>
</div>

<?php include "footer.php"; ?>