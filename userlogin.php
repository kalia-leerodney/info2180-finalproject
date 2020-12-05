<?php session_start();
require 'dbconfig.php';

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $useremail= filter_input(INPUT_POST,"useremail",FILTER_SANITIZE_EMAIL); 
    $userpassword= filter_input(INPUT_POST,"userpassword",FILTER_SANITIZE_STRING);
    #$useremail="admin@project2.com";
    #$userpassword="password123";
    $findps=$conn->query("SELECT _password FROM Users WHERE email='$useremail'");
    $ps= $findps->fetch(PDO::FETCH_ASSOC);
    if(isset($ps)){
    $hps=$ps['_password'];
    }
    if(password_verify($userpassword,$hps)){
        $find=$conn->query("SELECT * FROM Users WHERE _password='$hps' AND email='$useremail'");
        $resultsf= $find->fetch(PDO::FETCH_ASSOC);
        if(isset($resultsf)){
            $_SESSION['logined_user']=$resultsf['email'];
            $_SESSION['firstname']=$resultsf['firstname'];
            $_SESSION['lastname']=$resultsf['lastname'];
            $_SESSION['user_id']=$resultsf['id'];
            if(isset($_SESSION['logined_user'])){
            header("Location:http://localhost/info2180-project2/dashboard.php" );
            }
        }else{
            $error="Login Failed. Invalid Email-address or Password";
        }
    }
    ?>