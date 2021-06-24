<?php 

include '../inc/config.php';

// Find Notes on the Documentation page - Work in Progress
// Please enter credentials in the inc folder config.php file

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$conpass = $_POST['conpass'];
$hash = password_hash($password, PASSWORD_DEFAULT);

// Find a template of a sign up Form in the teamplates folder

function signup($fname, $lname, $email, $password, $conpass, $hash) {
    include '../inc/config.php';
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($conpass)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($conpass === $password) {

                $query = "INSERT INTO `users`(`id`, `fname`, `lname`, `email`, `password`) VALUES (NULL,'$fname','$lname', '$email', '$hash')";
                $mysqli->query($query);

                header('location: /');

            }
        }
    }
}

signup($fname, $lname, $email, $password, $conpass, $hash);

?>