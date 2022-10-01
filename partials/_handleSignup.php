<!-- INSERT INTO `h_users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_age`, `user_location`, `user_disease`, `user_disease_desc`, `user_time`) VALUES (NULL, 'admin', 'admin@a', 'admin@a', '', '', '', '', ''); -->


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '_dbconnect.php';

    $user_fullname = $_POST['fullname'];
    $age = $_POST['age'];

    // if($_POST['a_type'] = "on"){
    //     $appointment = "New";
    // }elseif($_POST['a_type2'] = "on"){
    //     $appointment = "Visited within 14 days";
    // }

    $appointment = $_POST['a_type'];
    
    $location = $_POST['location'] . ", " . $_POST['city'] . ", " .  $_POST['state'];
    $user_email = $_POST['signupEmail'];
    $dob = $_POST['dd'] . ", " . $_POST['mm'] . ", " . $_POST['yy'] ;
    
    $user_age =  date('Y') - $_POST['yy'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    $user_location = $_POST['location'];

    // $user_disease = $_POST['disease'];
    // $user_disease_desc = $_POST['disease_desc'];

    // Learn how to add time 
    $user_time = date("h:i A (jS M, Y)", strtotime("+3 hour +30 minutes"));



    // Check whether this email exist or not
    $existSql = "SELECT * FROM `h_users` WHERE user_email='$user_email' ";
    $result = mysqli_query($conn, $existSql); 
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "This Email ID Already Exists!  Go to the Login Page.";
        header("Location: /index.php?emailExists=true");
        exit;
    }elseif($cpass != $pass) {
        $showError = "Password don't match! Please type the correct Password.";
        header("Location: /index.php?passwordNotMatch=true");
        exit;
    }else{
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = " INSERT INTO `h_users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `dob`, `user_age`, `user_location`, `user_appointment_type`, `user_prefered_date`, `user_disease`, `user_disease_desc`, `user_time`) VALUES (NULL, '$user_fullname', '$user_email', '$hash', '$dob', '$user_age', '$location', '$appointment', '', '', '', '$user_time'); ";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = "Your account has been created successfully. Now you can Login.";
            header("Location: /index.php?signupsuccess=true");
            exit;
        }
    }

}

?>