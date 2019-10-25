<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fletnix</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/styles.css"/>

  <?php require 'components/connect.php'?>
</head>

<body>
  <?php require_once 'components/header.php'; ?>

  <main class="home-backgroundimage">
    <div class="welcome-container">
      <div class="title-box">
        <h2>Welcome to Fletnix</h2>
        <p>The path to joy</p>
      </div>
      <div class="catchy-info-box">
        <p>
          Why Fletnix? <br/>
          Fletnix is a worldwide used platform to stream not only the latest <br/>
          but also older movies and series. <br/>
          Furthermore, Fletnix is created by students for students. <br/>
          Therefore it will be easy to use without any shenanigans.
        </p>
      </div>
    </div>
  </main>
  
  <?php require_once 'components/footer.php' ?>
</body>
</html>
