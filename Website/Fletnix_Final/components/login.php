<?php
  session_start();
  require 'connect.php';
  $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
  $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

  GLOBAL $connection;
  // checking connection type
  $state = false;
  if($connection == 2) {
    $state = true;
  }

  // checking if there is a user with login credentials
  if(isset($_POST['submit'])){
    $sql = "select firstname, lastname from customer where (username = '$username' and password = '$password')";
    $result = $dbh->query($sql);
    $count = 0;

    // counting row of result
    if($state){
      $count = $result->rowCount();
      echo $count;
    } else {
      $count = $result->num_rows;
      echo $count;
    }

    // checking if there is only one row
    // for some reason returns rowCount() -1 if it found something, and 0 if not. num_rows is normal
    if($count == -1 || $count == 1){
      $_SESSION['login_token'] = $username;

      // setting session first- and lastname
      if($state) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
          $_SESSION['firstname'] = $row['firstname'];
          $_SESSION['lastname'] = $row['lastname'];
        }
      } else {
        while ($row = $result->fetch_assoc()){
          $_SESSION['firstname'] = $row['firstname'];
          $_SESSION['lastname'] = $row['lastname'];
        }
      }

      // setting session start time
      $time = date("H:i");
      $_SESSION['log_in_time'] = $time;

      header("Location: ../overview.php");
    } else {
      // of user was not found
      header("Location: ../login_page.php");
    }
  }
?>
