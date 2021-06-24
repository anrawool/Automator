<?php
session_start();
$project_name = $_POST['project_name'];
$_SESSION['type'] = $project_type = $_POST['project_type'];


$infoApp = 
`
{
  "info": [
      {
          "version" : "1.0",
          "type" : "Web Application",
      }
  ]
}

`;

$infoWeb = 
'
{
  "info": [
      {
          "version" : "1.0",
          "type" : "Website"
      }
  ]
}

';


$infoBasic = 
'


{
  "info": [
      {
          "version" : "1.0",
          "type" : "Basic"
      }
  ]
}


';


$infoBasicDB = 
'
{
  "info": [
      {
          "version" : "1.0",
          "type" : "Basic + DB"
      }
  ]
}

';


$info = 
'
{
  "info": [
      {
          "version" : "1.0",
          "type" : "Any"
      }
  ]
}

';

$login = "<?php 
session_start();

include '../inc/config.php';

\$email = \$_POST['email'];
\$password = \$_POST['password'];

\$query = \"SELECT * FROM `users` WHERE email='\$email'\";
\$db_pwd = \$mysqli->query(\$query);

function login(\$email, \$db_pwd, \$password) {
    include '../inc/config.php';
    if(!empty(\$email) && !empty(\$password)) {
        if(mysqli_num_rows(\$db_pwd) > 0) {
            while (\$row = mysqli_fetch_array(\$db_pwd)) {
                if(password_verify(\$password, \$row['password'])) {
                    echo \"Checking Records...\";
                    \$_SESSION['loggedin'] = true;
                    header(\"location: http://localhost/\");
                } else {
                    echo \"Sorry, your credentials are wrong!\";
                }
            }
            
        } else {
            echo \"Sorry, no record matches your credentials...\";
        }
    } else {
        echo \"All fields are required!\";
    }
}

login(\$email, \$db_pwd, \$password);
?>";

$cssApp = '
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: white;
}
.container {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  -webkit-box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, 0.49);
  -moz-box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, 0.49);
  box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, 0.49);
}
.container .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: rgb(40, 42, 52);
}
.content form .user-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid {
  border-color: #878e99;
}
form .gender-details .gender-title {
  font-size: 20px;
  font-weight: 500;
}
form .category {
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}
form .category label {
  display: flex;
  align-items: center;
  cursor: pointer;
}
form .category label .dot {
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
form .button {
  height: 45px;
  margin: 35px 0;
}
form .button input {
  height: 100%;
  width: 100%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background: #032b43;
}

form .button input:hover {
  height: 110%;
}

#conpass {
  width: 213.99%;
}

@media (max-width: 584px) {
  .container {
    max-width: 100%;
  }
  form .user-details .input-box {
    margin-bottom: 15px;
    width: 100%;
  }
  form .category {
    width: 100%;
  }
  .content form .user-details {
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar {
    width: 5px;
  }
}
@media (max-width: 459px) {
  .container .content .category {
    flex-direction: column;
  }
}

.errmsg {
  background: rgb(3, 43, 67);
}
';

$loginFormCode = '<?php
session_start();
$_SESSION[\'loggedin\'] = false;

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

        <span><a href="signup.php" style="color:#032b43; font-weight:600">Don\'t have a account?</a></span>
      </form>
    </div>
  </div>

</body>
</html>
';

$htmlApp = '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>
<body>
    <h1 class="welcome">Welcome</h1>
</body>
</html>';

$configApp = '<?php
$db_host = \'localhost\'; // change this field to your settings
$db_user = \'\';
$db_password = \'\';
$db_db = \'\';

// Give the name of the table in which all user information is stored (matchCase)
$usersTable = "";

$mysqli = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);
  
if ($mysqli->connect_error) {
  echo \'Errno: \'.$mysqli->connect_errno;
  echo \'<br>\';
  echo \'Error: \'.$mysqli->connect_error;
  exit();
}

// echo \'Success: A proper connection to MySQL was made.\';
// echo \'<br>\';
// echo \'Host information: \'.$mysqli->host_info;
// echo \'<br>\';
// echo \'Protocol version: \'.$mysqli->protocol_version;


?>';

$signup = '<?php 

include \'../inc/config.php\';

// Find Notes on the Documentation page - Work in Progress
// Please enter credentials in the inc folder config.php file

$fname = $_POST[\'fname\'];
$lname = $_POST[\'lname\'];
$email = $_POST[\'email\'];
$password = $_POST[\'password\'];
$conpass = $_POST[\'conpass\'];
$hash = password_hash($password, PASSWORD_DEFAULT);

// Find a template of a sign up Form in the teamplates folder

function signup($fname, $lname, $email, $password, $conpass, $hash) {
    include \'../inc/config.php\';
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($conpass)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($conpass === $password) {

                $query = "INSERT INTO `users`(`id`, `fname`, `lname`, `email`, `password`) VALUES (NULL,\'$fname\',\'$lname\', \'$email\', \'$hash\')";
                $mysqli->query($query);

                header(\'location: /\');

            }
        }
    }
}

signup($fname, $lname, $email, $password, $conpass, $hash);

?>';

$signupFormCode = "
<!DOCTYPE html>
<html lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"../css/signup.css\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>PHP Automator | Registration</title>
   </head>
<body>
  <div class=\"container\">
    <div class=\"title\">Registration</div>
    <div class=\"content\">

      <form action=\"../controllers/SignupController.php\" method=\"post\" autocomplete=\"off\">
        <div class=\"user-details\">
          <div class=\"input-box\">
            <span class=\"details\">First Name</span>
            <input type=\"text\" placeholder=\"Enter your first name\" required name=\"fname\">
          </div>
          <div class=\"input-box\">
            <span class=\"details\">Last Name</span>
            <input type=\"text\" placeholder=\"Enter your last name\" required name=\"lname\">
          </div>
          <div class=\"input-box\">
            <span class=\"details\">Email</span>
            <input type=\"email\" placeholder=\"Enter your email\" required name=\"email\">
          </div>
          <div class=\"input-box\">
            <span class=\"details\">New Password</span>
            <input type=\"password\" placeholder=\"Enter a new password\" required name=\"password\">
          </div>
          <div class=\"input-box\">
            <span class=\"details\">Confirm Password</span>
            <input type=\"password\" placeholder=\"Confirm your password\" id=\"conpass\" required name=\"conpass\">
          </div>
        </div>
        <div class=\"button\">
          <input type=\"submit\" value=\"Register\" name=\"submit\">
        </div>

        <!-- <span><a href=\"signin.php\" style=\"color:#032b43; font-weight:600\">Already Have A Account?</a></span> -->
      </form>
    </div>
  </div>
</body>
</html>
";


$html = "<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"css/style.css\">
    <title>Welcome</title>
</head>
<body>
    Welcome
</body>
</html>";

$css = "body {
    font-family: \"Lucida Sans\", \"Lucida Sans Regular\", \"Lucida Grande\",
      \"Lucida Sans Unicode\", Geneva, Verdana, sans-serif;
    text-align: center;
    margin-top: 200px;
    text-decoration: underline;
    font-size: 200px;
    color: rgb(107, 106, 106);
  }
  ";

$controlSystemCode = '<?php
include \'../inc/config.php\';
//Please fill in config.php with correct credentials of user, password and Database name

function someFunction() {
    //code...
}';

$functions ='<?php
include \'../inc/config.php\';
//Please fill in config.php with correct credentials of user, password and Database name

function signup($username, $fname, $lname, $email, $password) {
    // code...
}';

$config = '<?php
$db_host = \'localhost\';
$db_user = \'\';
$db_password = \'root\';
$db_db = \'\';

$mysqli = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);
  
if ($mysqli->connect_error) {
  echo \'Errno: \'.$mysqli->connect_errno;
  echo \'<br>\';
  echo \'Error: \'.$mysqli->connect_error;
  exit();
}

// echo \'Success: A proper connection to MySQL was made.\';
// echo \'<br>\';
// echo \'Host information: \'.$mysqli->host_info;
// echo \'<br>\';
// echo \'Protocol version: \'.$mysqli->protocol_version;


?>';



mkdir($project_name);
switch ($project_type) {
    default:
        mkdir("$project_name/css");
        mkdir("$project_name/js");
        mkdir("$project_name/inc");
        $header = fopen("$project_name/inc/header.php", "w");
        $footer = fopen("$project_name/inc/footer.php", "w");
        $configFile = fopen("$project_name/inc/config.php", "w");
        $file = fopen("$project_name/index.php", "w");
        fwrite($file, $html);
        fwrite($configFile, $config);
        $file = fopen("$project_name/css/style.css", "w");

        $versionFile = fopen("$project_name/version.json", "w");
        fwrite($versionFile, $infoBasic);

        fwrite($file, $css);
        header("location: $project_name");
        break;
    case 'Basic + DB':
        mkdir("$project_name/css");
        mkdir("$project_name/js");
        mkdir("$project_name/inc");
        mkdir("$project_name/php");
        mkdir("$project_name/redirects");
        $controlSystem = fopen("$project_name/php/controlSystem.php", "w");
        $functionFile = fopen("$project_name/inc/functions.php", "w");
        $configFile = fopen("$project_name/inc/config.php", "w");
        $header = fopen("$project_name/inc/header.php", "w");
        $footer = fopen("$project_name/inc/footer.php", "w");
        $file = fopen("$project_name/index.php", "w");
        $cssFile = fopen("$project_name/css/style.css", "w");

        $versionFile = fopen("$project_name/version.json", "w");
        fwrite($versionFile, $infoBasicDB);

        fwrite($file, $html);
        fwrite($cssFile, $css);
        fwrite($configFile, $config);
        fwrite($controlSystem, $controlSystemCode);
        fwrite($functionFile, $functions);
        header("location: $project_name");
        break;
    case 'Website':
        mkdir("$project_name/css");
        mkdir("$project_name/js");
        $file = fopen("$project_name/index.html", "w");
        fwrite($file, $html);
        $cssFile = fopen("$project_name/css/style.css", "w");
        fwrite($cssFile, $css);

        $versionFile = fopen("$project_name/version.json", "w");
        fwrite($versionFile, $infoWeb);

        header("location: $project_name");
        break;

    case 'Web Application':

            
      mkdir("$project_name/js");
      mkdir("$project_name/inc");
      mkdir("$project_name/php");
      mkdir("$project_name/css");
      mkdir("$project_name/redirects");
      mkdir("$project_name/controllers");
      mkdir("$project_name/control");
      mkdir("$project_name/templates");
      mkdir("$project_name/views");


      $controlSystem = fopen("$project_name/control/controlSystem.php", "w");
      $mainControllor = fopen("$project_name/controllers/AppController.php", "w");
      $loginControllor = fopen("$project_name/controllers/LoginController.php", "w");
      $signupControllor = fopen("$project_name/controllers/SignupController.php", "w");
      $signupForm = fopen("$project_name/templates/signup.php", "w");
      $loginForm = fopen("$project_name/templates/signin.php", "w");


      $functionFile = fopen("$project_name/inc/functions.php", "w");

      $configFile = fopen("$project_name/inc/config.php", "w");

      $header = fopen("$project_name/inc/header.php", "w");
      $footer = fopen("$project_name/inc/footer.php", "w");
      $file = fopen("$project_name/index.php", "w");


      $cssFile = fopen("$project_name/css/style.css", "w");
      $signupCssFile = fopen("$project_name/css/signup.css", "w");

      $versionFile = fopen("$project_name/version.json", "w");
      fwrite($versionFile, $infoApp);

      fwrite($file, $html);
      fwrite($signupCssFile, $cssApp);
      fwrite($configFile, $configApp);
      fwrite($controlSystem, $controlSystemCode);
      fwrite($functionFile, $functions);
      fwrite($signupControllor, $signup);
      fwrite($loginControllor, $login);
      fwrite($signupForm, $signupFormCode);
      fwrite($loginForm, $loginFormCode);
      header("location: $project_name");
}