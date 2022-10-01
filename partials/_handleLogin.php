<?php

$showError = false;
$showAlert = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){

    include '_dbconnect.php';

    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    $sql = "SELECT * FROM `h_users` WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    
    // Equality to 1 means entered email ID exists
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);

        if( password_verify($pass, $row['user_password']) ) {

            // start the login session
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['fullname'] = $row['user_fullname'];
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $row['user_id'];

            

            // SPECIAL LOGIN FOR ADMIN IN IF CONDITION
            if($_SESSION['user_email'] == "admin@a"){
                header("LOCATION: /admin.php");
                exit;
            }elseif($_POST['login_from_appointment_page'] == "true"){
                // echo "You are Logged In from appointment table ";
                header("LOCATION: /book_appointment.php");
            }            
            else{
                
                // $showAlert = "You are Logged in & Your Session has been Started";
                header("LOCATION: /index.php?login=true");
                echo "loggedin";
                exit;
            }  
        }
        else{
            header("LOCATION: /index.php?incorrectPassword=true");
            // $showError = "Incorrect Password Entered.";
            exit;
        }
    }
    else{
        header("LOCATION: /index.php?emailNotExist=true");
        // $showError = " '.$email.' This Email ID doesn't Exists. Please Sign Up first.";
        exit;
    }

}

?>