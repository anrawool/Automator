<?php
session_start();
$project_name = $_POST['project_name'];
$_SESSION['type'] = $project_type = $_POST['project_type'];

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

function something() {
    // code...
}';

$config = '<?php
$db_host = \'localhost\';
$db_user = \'\';
$db_password = \'root\';
$db_db = \'\';

// Give the name of the table in which all user information is stored (matchCase)
$usersTable = \'\';

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

// Include the page which you have made in this include:
include \'../templates/sigup.html\';

$fname = $_POST[\'fname\'];
$lname = $_POST[\'lname\'];
$email = $_POST[\'email\'];
$password = $_POST[\'password\'];
$conpass = $_POST[\'conpass\'];

// Find a template of a sign up Form in the teamplates folder

function signup($fname, $lname, $email, $password, $conpass) {
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($conpass)){
        if(strpos($email, "@")) {
            if($conpass === $password) {

                $query = "INSERT INTO $usersTable (id, fname, lname, email, password) VALUES (NULL, $fname, $lname, $email, $password)";
                $mysqli->query($query);

            }
        }
    }
}

signup($fname, $lname, $email, $password, $conpass);

?>';

$signupFormCode = '';



mkdir("$project_name/js");
mkdir("$project_name/inc");
mkdir("$project_name/php");
mkdir("$project_name/redirects");
mkdir("$project_name/controllers");
mkdir("$project_name/control");
mkdir("$project_name/templates");


$controlSystem = fopen("$project_name/control/controlSystem.php", "w");
$mainControllor = fopen("$project_name/controllers/AppController.php", "w");
$loginControllor = fopen("$project_name/controllers/LoginController.php", "w");
$signupControllor = fopen("$project_name/controllers/SignupController.php", "w");
$signupForm = fopen("$project_name/templates/signup.html", "w");


$functionFile = fopen("$project_name/inc/functions.php", "w");

$configFile = fopen("$project_name/inc/config.php", "w");

$header = fopen("$project_name/inc/header.php", "w");
$footer = fopen("$project_name/inc/footer.php", "w");
$file = fopen("$project_name/views/index.php", "w");


$cssFile = fopen("$project_name/css/style.css", "w");
fwrite($file, $html);
fwrite($cssFile, $css);
fwrite($configFile, $config);
fwrite($controlSystem, $controlSystemCode);
fwrite($functionFile, $functions);
fwrite($signupControllor, $signup);
fwrite($signupForm, $signupFormCode);
header("location: $project_name");

?>