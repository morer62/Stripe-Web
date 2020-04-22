Tanks for your Payment - Go to Charge.php to verify the information of your code<br><br>

If you have any error on yout code, Go to the "Events" Panel in your Stripe Dashboard to verify<br><br>

Always Remenber to change your Public Key and your Private KeY!!!

<?php
require_once('stripe-php/init.php');
\Stripe\Stripe::setApiKey('sk_test_CmS3AbaKxnt9kBZwL4OOSh8h00V6Dw2z51'); //YOUR_STRIPE_SECRET_KEY
// Get the token from the JS script
$token = $_POST["stripeToken"];

 

 
// This is a $20.00 charge in US Dollar.
//Charging a Customer
// Create a Customer
$name_first = "Jonny";
$name_last = "Moreno";
$address = "Miami Beach";
$state = "Florida";
$zip = "33326";
$country = "USA";
$phone = "013053443344";


$user_info = array("First Name" => $name_first, "Last Name" => $name_last, "Address" => $address, "State" => $state, "Zip Code" => $zip, "Country" => $country, "Phone" => $phone);


$customer = \Stripe\Customer::create(array(
    "email" => "noche4@gmail.com",
    "source" => $token,
    'metadata' => $user_info,
));


/* $customer give you all the information of the user, Including de type of credit card, last 4 numbers, due date:

{
  "id": "ch_1GaXie2eZvKYlo2ClHStI9It",
  "object": "charge",
  "amount": 100,
  "amount_refunded": 0,
  "application": null,
  "application_fee": null,
  "application_fee_amount": null,
  "balance_transaction": "txn_19XJJ02eZvKYlo2ClwuJ1rbA",
  "billing_details": {
    "address": {
      "city": null,
      "country": null,
      "line1": null,
      "line2": null,
      "postal_code": "77429",
      "state": null
    },
    "email": null,
    "name": null,
    "phone": null
  },
  "calculated_statement_descriptor": null,
  "captured": false,
  "created": 1587520184,
  "currency": "usd",
  "customer": null,
  "description": "My First Test Charge (created for API docs)",
  "disputed": false,
  "failure_code": null,
  "failure_message": null,
  "fraud_details": {},
  "invoice": null,
  "livemode": false,
  "metadata": {
    "order_id": "6735"
  },
  "on_behalf_of": null,
  "order": null,
  "outcome": null,
  "paid": true,
  "payment_intent": null,
  "payment_method": "card_1GaXiU2eZvKYlo2CDk1N5JqN",
  "payment_method_details": {
    "card": {
      "brand": "visa",
      "checks": {
        "address_line1_check": null,
        "address_postal_code_check": "unchecked",
        "cvc_check": "unchecked"
      },
      "country": "US",
      "exp_month": 8,
      "exp_year": 2023,
      "fingerprint": "th5t1W1YyEsmpQV2",
      "funding": "debit",
      "installments": null,
      "last4": "5261",
      "network": "visa",
      "three_d_secure": null,
      "wallet": null
    },
    "type": "card"
  },
  "receipt_email": null,
  "receipt_number": null,
  "receipt_url": "https://pay.stripe.com/receipts/acct_1032D82eZvKYlo2C/ch_1GaXie2eZvKYlo2ClHStI9It/rcpt_H8pNaBnK0t6Fegsw5tvDRNs6MTjTqL0",
  "refunded": false,
  "refunds": {
    "object": "list",
    "data": [],
    "has_more": false,
    "url": "/v1/charges/ch_1GaXie2eZvKYlo2ClHStI9It/refunds"
  },
  "review": null,
  "shipping": null,
  "source_transfer": null,
  "statement_descriptor": null,
  "statement_descriptor_suffix": null,
  "status": "succeeded",
  "transfer_data": null,
  "transfer_group": null
}
*/

// Save the customer id in your own database!
// Charge the Customer instead of the card
$charge = \Stripe\Charge::create(array(
    "amount" => 2000,
 "description" => "Purchase off Caite watch",
    "currency" => "usd",
    "customer" => $customer->id,
 'metadata' => $user_info
));


//print_r($charge);
// You can charge the customer later by using the customer id.
 
//Making a Subscription Charge
// Get the token from the JS script
//$token = $_POST['stripeToken'];
// Create a Customer
//$customer = \Stripe\Customer::create(array(
//    "email" => "paying.user@example.com",
//    "source" => $token,
//));
// or you can fetch customer id from the database too.
// Creates a subscription plan. This can also be done through the Stripe dashboard.
// You only need to create the plan once.
//$subscription = \Stripe\Plan::create(array(
//    "amount" => 2000,
//    "interval" => "month",
//    "name" => "Gold large",
//    "currency" => "cad",
//    "id" => "gold"
//));
// Subscribe the customer to the plan
//$subscription = \Stripe\Subscription::create(array(
//    "customer" => $customer->id,
//    "plan" => "gold"
//));
//print_r($subscription);
?>