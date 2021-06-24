<?php 
session_start();

include '../inc/config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM `users` WHERE email='$email'";
$db_pwd = $mysqli->query($query);

function login($email, $db_pwd, $password) {
    include '../inc/config.php';
    if(!empty($email) && !empty($password)) {
        if(mysqli_num_rows($db_pwd) > 0) {
            while ($row = mysqli_fetch_array($db_pwd)) {
                if(password_verify($password, $row['password'])) {
                    echo "Checking Records...";
                    $_SESSION['loggedin'] = true;
                    header("location: http://localhost/");
                } else {
                    echo "Sorry, your credentials are wrong!";
                }
            }
            
        } else {
            echo "Sorry, no record matches your credentials...";
        }
    } else {
        echo "All fields are required!";
    }
}

login($email, $db_pwd, $password);
?>