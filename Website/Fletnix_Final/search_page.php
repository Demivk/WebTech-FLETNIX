<?php
  session_start();
  if(!isset($_SESSION['login_token'])){
    header('Location: login_page.php');
  }
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <title>Fletnix</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require 'components/connect.php' ?>
  </head>

  <body>
    <?php require_once 'components/header.php' ?>

    <main class="search_result_container">
      <h2><?="Results for: " . $_POST['search']?></h2>
      <div class="search_result_box">
        <?php require_once 'components/search.php' ?>
      </div>
    </main>

    <?php require_once 'components/footer.php' ?>
  </body>
</html>
