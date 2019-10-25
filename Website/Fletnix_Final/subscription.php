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
    <!-- Inspiratiebron: https://www.neostrada.nl/  -->
    <div class="information-container">
      <div class="subscription-info">
        <h3>Basic</h3>
        <p class="price">&#8364;4,00 / month</p>
        <p><strong>HD quality:</strong> No</p>
        <p><strong>Number of users:</strong> 1</p>
        <p><strong>Terminable:</strong> Always</p>
        <p><strong>Available on laptop and mobile:</strong> Yes</p>
        <p><strong>Ads:</strong> Yes</p>
      </div>

      <div class="subscription-info">
        <h3>Premium</h3>
        <p class="price">&#8364;5,00 / month</p>
        <p><strong>HD quality:</strong> Yes</p>
        <p><strong>Number of users:</strong> 2</p>
        <p><strong>Terminable:</strong> Always</p>
        <p><strong>Available on laptop and mobile:</strong> Yes</p>
        <p><strong>Ads:</strong> Yes</p>
      </div>

      <div class="subscription-info">
        <h3>Pro</h3>
        <p class="price">&#8364;6,00 / month</p>
        <p><strong>HD quality:</strong> Yes</p>
        <p><strong>Number of users:</strong> 4</p>
        <p><strong>Terminable:</strong> Always</p>
        <p><strong>Available on laptop and mobile:</strong> Yes</p>
        <p><strong>Ads:</strong> No</p>
      </div>
    </div>

    <div class="subscription-form">
        <br>
        <h4>Register now!</h4>
        <br>
        <form method="post" action="submission.php">
            <label for="firstname">First name:</label><br>
            <input type="text" name="firstname" id="firstname" maxlength="20" required><br><br>

            <label for="lastname">Last name:</label><br>
            <input type="text" name="lastname" id="lastname" maxlength="30" required><br><br>

            Gender:<br>
            <input type="radio" name="gender" id="male" value="male" checked>
            <label for="male"> Male</label><br>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female"> Female</label><br><br>

            <label for="email">Email adress:</label><br>
            <input type="email" name="email" id="email" maxlength="50" required><br><br>

            <label for="bday">Birthday:</label><br>
            <input type="date" name="bday" id="bday"><br><br>

            <label for="country">Country:</label><br>
            <select name="country" id="country">
                <option>The Netherlands</option>
                <option>Belgium</option>
                <option>France</option>
                <option>Germany</option>
                <option>Ireland</option>
                <option>China</option>
                <option>Japan</option>
            </select><br><br>

            <label for="cardnumer">Cardnumber:</label><br>
            <input type="text" name="cardnumber" id=cardnumer maxlength="30" required><br><br>

            <label for="username">Username (max. 20):</label><br>
            <input type="text" name="username" id="username" maxlength="20" required><br><br>

            <label for="password1">Password:</label><br>
            <input type="password" name="password1" id="password1" maxlength="30" required><br><br>

            <label for="password2">Repeat password:</label><br>
            <input type="password" name="password2" id="password2" maxlength="30" required><br><br>

            Subscription:<br>
            <select name="subscription" id="subscription">
                <option>Basic</option>
                <option>Premium</option>
                <option>Pro</option>
            </select><br><br>

            <input type="checkbox" name="acceptterms" required> I accept the terms and conditions<br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
  </main>

  <?php require_once 'components/footer.php' ?>
</body>
</html>
