<?php
session_start();
$_SESSION['loggedin'] = false;

?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css/signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualArc | Log In</title>
   </head>
<body>
  <div class="container">
    <div class="title">Log In</div>
    <div class="content">

      <form action="../controllers/LoginController.php" method="post" autocomplete="off">
      <div class="user-details">
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Enter your email" required name="email">
            </div>
            <div class="input-box">
                <span class="details">Your Password</span>
                <input type="password" placeholder="Enter your password" required name="password">
            </div>
          </div>
        <div class="button">
          <input type="submit" value="Register" name="submit">
        </div>

        <span><a href="signup.php" style="color:#032b43; font-weight:600">Don't have a account?</a></span>
      </form>
    </div>
  </div>

</body>
</html>
