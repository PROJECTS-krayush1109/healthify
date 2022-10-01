  <?php require '_dbconnect.php' ?>

  <?php

        session_start();

        $patient_name = $_SESSION['fullname'];
        $user_id = $_SESSION['user_id'];

        $user_appointment_type = $_POST['a_type'];
        $user_prefered_date = $_POST['date'];
        $time = $_POST['time'];
        $concern = $_POST['concern'];
        $query = $concern;
        $query = str_replace("<", "&lt;", $query);
        $query = str_replace(">", "&gt;", $query);
        $concern = $query;
        

        $location = $_POST['city'] . ", " .  $_POST['state'];

            // Learn how to add time 
        $appointment_booked_on = date("h:i A (jS M, Y)", strtotime("+3 hour +30 minutes"));


        $sql = " INSERT INTO `h_appointment` (`appointment_id`, `patient_name`, `user_id`, `appointment_type`, `appointment_prefered_date`, `appointment_prefered_time`, `patient_concern`, `appointment_location`, `appointment_booked_on`, `disease`, `disease_desc`) VALUES (NULL, '$patient_name', '$user_id', '$user_appointment_type', '$user_prefered_date', '$time', '$concern', '$location', '$appointment_booked_on', '', ''); ";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "data inserted successfully. ";
            header("LOCATION: /book_appointment.php?booked_appointment=true");
            exit;
        }else{
            echo "Error Unable to insert data.";            
            echo mysqli_error($conn);
        }







    ?>