<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualArc | Registration</title>
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">

      <form action="redirects/signup.php" method="post" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your first name" required name="fname">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" required name="lname">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" required name="email">
          </div>
          <div class="input-box">
            <span class="details">New Password</span>
            <input type="password" placeholder="Enter a new password" required name="password">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" id="conpass" required name="conpass">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="submit">
        </div>

        <!-- <span><a href="signin.php" style="color:#032b43; font-weight:600">Already Have A Account?</a></span> -->
      </form>
    </div>
  </div>
  <script src="js/close_tab.js"></script>
</body>
</html>
