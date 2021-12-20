<?php
include 'signup_include.php'
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
  </head>
  <body>

    <?php if(!empty($message)): ?>
      <p style="color:green;" > <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form class="passwordlogin" action="signup.php" method="POST">
      <input style="width: 300px;" name="email" type="text" placeholder="Enter your email">
      <input style="width: 300px;" name="user" type="text" placeholder="Enter your user">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>