<?php

if( !isset($_SESSION['user_email']) == "admin@a" ){
// if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] == true){
    echo '

    <!-- LOGIN AS ADMIN FORM -->
    <form class="" action="/partials/_handleLogin.php" method="POST">
    <div class="container my-5 col-md-3 justify-content-center">
        <div class="form-group">
            <label for="exampleInputEmail1">Admin Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email" name="loginEmail">
            <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Admin Password</label>
            <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-warning">Access</button>
            </div>
            </form>
          
            ';
        }
        ?>


<!-- LOGIN AS ADMIN FORM ENDS HERE -->




<!-- DISPLAY ALL PATIENT DETAILS -->
<div class="container-fluid my-3">

    <!-- Displaying Recorded Data in Tables (Output) -->

    <table class="table table-striped table-hover table-bordered" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Name</th>
                <th scope="col">Patient Type</th>
                <th scope="col">Concern</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">At Location</th>
                <th scope="col">Booking On</th>


                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $table_name = "h_appointment";
            $table_selected = "SELECT * FROM `$table_name` ORDER BY `appointment_id` DESC ";
            $result = mysqli_query($conn, $table_selected);

            $s_no = 1;
            
            if(isset($_SESSION['user_email']) && $_SESSION['user_email']== "admin@a"){

                while ($rows = mysqli_fetch_assoc($result)) {
                    // echo var_dump($rows);
                    
                    echo '<tr>
                    <th scope="row"> ' . $s_no . '</th>
                    <td>' . $rows['patient_name'] . '</td>
                    <td>' . $rows['appointment_type'] . '</td>
                    <td>' . $rows['patient_concern'] . '</td>
                    <td>' . $rows['appointment_prefered_time'] . '</td>
                    <td>' . $rows['appointment_prefered_date'] . '</td>
                    <td>' . $rows['appointment_location'] . '</td>
                    <td>' . $rows['appointment_booked_on'] . '</td>
                    
                    
                    <td> 
                    <button type="submit" class="btn btn-sm btn-primary edit mt-1" id=" '. $rows['appointment_type'] .' ">Edit</button> 
                    &nbsp;
                    <button type="submit"  class="btn btn-sm btn-primary delete mt-1" id=" '. $rows['appointment_type'] .' "> Delete  </button> 
                    </td>
                    </tr>';
                    
                    
                    
                    $s_no++;
                }
            }
                ?>

        </tbody>
    </table>
</div>