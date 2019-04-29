<?php include "header.php";?>
<?php 
session_start();
//checks to see if you're logged in
if(isset($_SESSION["registration_id"])){

  $reg_id = $_SESSION["registration_id"];
}else{
  header("location: Login.php");
}

//checks for a class id
if(isset($_GET["id"])){
  $class_id = $_GET["id"];
}else{
  header("location: Login.php");
}



//get membership discount
 /* $sql = "SELECT * 
FROM members,membership  
WHERE members.membership_id = membership.membership_id
AND members.registration_id = $registration_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { 
        $membership_discount =$row["membership_discount"];
    }
} else {
 

    echo "0 Result";
}

*/

//calculation for total cost.
$discount_price= ($membership_discount / 100) * $class_price;
$total_cost = $class_price - $discount_price; 


// if the confirmation button was clicked information goes into database.

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




 ?>

<div class="confirmation">
<?php 

require "connection.php";

//get class info
$sql = "SELECT * from classes where class_id = $class_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

  $class_id= $row["class_id"];
  $class_name= $row["class_name"];
  $class_price = $row["class_price"];
  
}
}
       ?>

    
          <div class="container">

  <h2> Booking Confirmation</h2> <br>
       
        <h3>Please review your booking below and proceed with the confirmation of your booking.</h3>
       
        <b>Class Name :</b> <?php echo "$class_name"; ?>  <br> <br>

       <b>Class Price: $ </b> <?php echo "$class_price"; ?> <br><br>

     <!--   <b>Membership Discount: </b> <?php echo "$membership_discount"; ?> % <br><br>  -->

      
       <!-- <b>Total Cost: $ </b>  <?php echo "$total_cost"; ?> <br><br> -->

        <b>Enter your payment info below </b><?php  




?>
        
<style type="text/css">
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
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

<form action="testing.php" method="post" id="payment-form">
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

<hr>


     <!-- <div class="modal-footer"> -->
       <form action="Confirmation.php?id=<?php echo "$class_id"; ?>" method="post">


       <button name="confirm" class="btn btn-primary btn-medium" type="submit">Confirm Booking</button>

       <button name="cancel" class="btn btn-danger btn-medium" type="submit">Cancel</button>

       <hr>

</form>
</center>
</div>
</div>
</div>
</div>
</div>

<?php include "footer.php";?>


