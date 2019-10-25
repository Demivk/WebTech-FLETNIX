<?php
require 'connect.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$bday = $_POST['bday'];
$country = $_POST['country'];
$cardnumber = $_POST['cardnumber'];
$username = $_POST['username'];
$password = $_POST['password1'];
$subscription = $_POST['subscription'];

// storing all user information in database
// password should be encrypted!
$sql = "insert into customer values ('$firstname', '$lastname', '$gender', '$email', '$bday', '$country', '$cardnumber', '$username', '$password', '$subscription')";

if($dbh->query($sql) == TRUE) {
  echo "<div class='submit-text'>";
  echo "Thank you $firstname ($username) for subscribing to our service. <br /> We hope that you will have a great time here on Fletnix! <br />";
  echo "<a href='login_page.php'>return to login page</a>";
  echo "</div>";
} else {
  echo "<div class='submit-text'>";
  echo "An error has occured while creating the account. Please try again later. <br />";
  echo "<a href='index.php'>return to home page</a>";
  echo "</div>";
}
?>
