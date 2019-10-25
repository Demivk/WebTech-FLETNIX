<?php
  session_start();
  if(isset($_SESSION['login_token'])){
    header('Location: overview.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fletnix</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css"/>

    <?php require 'components/connect.php'; ?>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <main>
       <div class="login-container"> <!-- Achtergrond films langs flashen? -->
           <h2>Hello!</h2>
           <h4>Welcome to Fletnix! Please log in.</h4>
           <form method="post" action="components/login.php">
               <input type="text" name="username" id="username" placeholder="Username" required><br>
               <input type="password" name="password" id="password" placeholder="Password" required><br>

               <input type="submit" name="submit" value="Login">
           </form>
           <p>Forgot password / username?</p>
       </div>
  </main>
  <?php require_once 'components/footer.php'; ?>
</body>
