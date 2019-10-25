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

  <?php require 'components/connect.php'; ?>
</head>

<body>
  <?php require_once 'components/header.php'; ?>

  <main>
    <div class="information-container" style="justify-content: space-around">
      <div class="personal-info">
        <h2>Jannick Joosten</h2>

        <img src="images/jannick_300x300.jpg" alt="Jannick Joosten"/>

        <p>I am Jannick Joosten. I am 18 years old and I am currently studying ICT at the Hogeschool Arnhem
          Nijmegen.
          Usually, I am hanging around with my friends and when I have some time left I am coding for fun.</p>
          <p><i>Jannick Joosten, 1 december 2017</i></p>
        </div>

        <div class="personal-info">
          <h2>Demi van Kesteren</h2>

          <img src="images/demi_300x300.png" alt="Demi van Kesteren"/>

          <p>Hi, I am Demi van Kesteren and I am 17 years old. At the moment, I am a student at the Hogeschool Arnhem
            Nijmegen. In my spare time, I like to read, listen to music, draw and play games.</p>
            <p><i>Demi van Kesteren, 1 december 2017</i></p>
          </div>
        </div>
      </main>

      <?php require_once 'components/footer.php' ?>
    </body>
    </html>
