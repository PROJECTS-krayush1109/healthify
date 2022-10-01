<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS alert dissimissible -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Bootstrap CSS Navbar dominating -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">




    <?php require 'partials/css/_date.php' ?>

    <?php 
    // require 'stylesheet/_mobile.php'
    // my custom css is added to the _header.php because it is included in all other file already
    ?>

    <title>Healthify+ ~ Book Appointment</title>
</head>

<body style="background-color:whitesmoke">

    <!-- connecting to the database -->
    <?php require 'partials/_dbconnect.php';  ?>

    <!-- Invoking Navbar -->
    <?php require 'partials/_header.php';  ?>



    


    <?php

if( !isset($_SESSION['user_email']) == "admin@a" ){
// if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] == true){
    echo '

    <!-- LOGIN AS ADMIN FORM -->
    <h2 class="text-center my-3">Please Login first to Book an Appointment</h2>
    <form class="" action="/ayush/healthify/partials/_handleLogin.php" method="POST">
        <div class="container my-5 col-md-3 justify-content-center">
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email" name="loginEmail">
            <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            
            <input type="hidden" name="login_from_appointment_page" value="true">

            <button type="submit" class="btn btn-info">Login</button>
            </div>
            </form>
          
            ';
        }
        ?>







    
    <?php

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
        // echo "Now you can book appointment";
    

    $user_id = $_SESSION['user_id'];
    // echo $user_id;
    $sql = "SELECT * FROM `h_users` WHERE user_id=$user_id ";
    $result = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)) {
        // echo "Test successful";
        $user_id = $row['user_id'];
        $user_fullname = $row['user_fullname'];
        $user_email = $row['user_email'];
        $dob = $row['dob'];
        $user_age = $row['user_age'];

        // $user_appointment_type = $row['user_appointment_type'];
        // $user_prefered_data = $row['user_prefered_data'];
        // $user_prefered_time= $row['user_prefered_time'];
        // $user_disease = $row['user_disease'];
        // $user_disease_desc = $row['user_disease_desc'];
        
        
echo '

<form action="/ayush/healthify/partials/_handleAppointment.php" method="POST" class="needs-validation" novalidate>

    <div class="container my-3">
        <div class="jumbotron pt-3 alert-info">
            <h1 class=" text-center mb-5">Book an Appointment</h1>
            
            
                <div class="form-inline row mb-3 ">
                    
                    <div class="form-group col-md-4">
                        
                        <label for="fullname" class="form-label col-md-4">Full Name</label>
                        <input type="text" class="form-control  col-md-8" autofocus id="fullname"
                            aria-describedby="fullname" name="fullname" value=" '.$user_fullname .'" disabled
                            required>
                            
                        </div>
                        
                        
                        
                        <div class=" form-group col-md-4">
                            <label for="signupEmail" class="form-label col-md-4">Email address</label>
                            <input type="email" class="form-control col-md-8" id="signupEmail" aria-describedby="emailHelp"
                            name="signupEmail" value=" '. $user_email.'" disabled required>
                        </div>
                        
                    <div class="form-group col-md-4">
                        <label for="dob" class="form-label col-md-4">Date of Birth</label>
                        <input type="text" class="form-control  col-md-8" id="dob" aria-describedby="dob" name="dob"
                        value=" '. $dob .'" disabled required>
                        
                    </div>
                </div>
                
                
                <!-- Second row -->
                <div class="row mb-3 ml-3">
                    
                    <div class="col-md-3 form-group">
                        <label for="appointment_type" class="form-label" required>Appointment Type</label>
                        <div class="form-check">
                            <label class="form-check-label" for="a_type">
                                <input class=" form-check-input " type="radio" name="a_type" id="a_type" value="New">
                                New
                            </label>
                            
                            <br>
                            <input class="form-check-input" type="radio" name="a_type" id="a_type2"
                            value="Visited in Last 14 days">
                            <label class="form-check-label" for="a_type2">
                                Visited in Last 14 Days.
                            </label>
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Appointment Type.
                        </div>
                    </div>

                    
                    
                    <div class="col-md-3 form-group">
                        <label for="date" class="form-label" required>Prefered Appointment Date</label>
                        '; ?> <?php require "partials/_calender.php"; ?>
                        
                        </div>
                        
                        <?php echo '
                        
                        <div class="col-md-2 form-group">
                        <label for="time" class="form-label" required>Prefered Time</label>
                        <select class="form-select" aria-label="Default select example" name="time" id="time">
                        <option selected>Select time</option>
                        <option value="7 AM ~ 11 AM">7 AM ~ 10 AM </option>
                        <option value="11 AM ~ 3 PM">10 AM ~ 1 PM</option>
                        <option value="3 PM ~ 7 PM">1 PM ~ 4 PM</option>
                            <option value="7 PM ~ 10 PM">4 PM ~ 7 PM</option>
                            <option value="7 PM ~ 10 PM">7 PM ~ 10 PM</option>
                        </select>
                        
                        </div>
                        
                        
                        <div class="col-md-4 form-group">
                        <div class="mb-3 col-md-12 form-inline">
                        
                        <input type="hidden" name="country" id="countryId" value="IN" />
                        
                        <div class="form-group col-6">
                        <label for="stateId" class="form-label">Select State </label>
                        <select name="state" class="states order-alpha mt-1 form-select " id="stateId">
                        <option value="">Select State</option>
                        </select>
                        </div>
                        
                        <div class="form-group col-6">
                        <label for="cityId" class="form-label ">Select City</label>
                        <select name="city" class="cities order-alpha mt-1 form-select" id="cityId">
                        <option selected>Select City</option>
                        <option value="">Select City</option>
                        </select>
                        </div>
                        <div id="emailHelp" class="form-text">(Appointment Nearest Location)</div>
                        
                        </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        </div> <!-- 2nd Row end here  -->

                        
                        <div class="row mb-3 ml-3">
                        <div class="col-md-6 form-group">

                        <label for="concern" class="form-label" required>Describe Your Concern or Problem : </label>
                        <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="concern" name="concern"
                        style="height: 8rem;"></textarea>
                        <label for="floatingTextarea">Comments</label>
                        </div>
                        </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-success ml-4"> Submit </button>
                        
                        </div> <!-- Jumbotron ends here  -->
                        </div> <!-- Container ends here  -->
                        </form>
                    ';    
    }
                    }
                    ?>
                        
                        <!-- Invoking Footer -->
                        <?php require 'partials/_footer.php';  ?>
                        
                        <!-- All JS are kept in the footer -->
                        
                        </body>
                        
                        </html>