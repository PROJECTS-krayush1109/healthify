<?php require 'css/_mobile.php' ?>




<nav class="navbar navbar-expand-lg navbar-light bg-inf sticky-top" style="background-color: #1ac6ff;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-danger text-white" href="/">Healthify+</a>


        <?php
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {            
            $fullname = $_SESSION['fullname'];            
            echo '<p class="user-name-display-begining"> Welcome <span class="my-0 fw-bold "> ' . $fullname . ' </span> </p>';
        }
        ?>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                <li class="nav-item">
                    <a class="nav-link <?php if ($active == 'Home') {
                                            echo 'active';
                                        } ?> " aria-current="page" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($active == 'About') {
                                            echo 'active';
                                        } ?> " href="/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($active == 'Contact') {
                                            echo 'active';
                                        } ?> " href="contact.php">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($active == 'admin') {
                                            echo 'active';
                                        } ?> " href="admin.php">Admin</a>
                </li>


                <!-- 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Ayush All Website
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end nav-rgt-sub-menu">

                        <li><a class="dropdown-item" href="/ayush/LearnPHP/crud/main_crud.php" target="_blank">CRUD </a>
                        </li>

                        <li><a class="dropdown-item" href="/ayush/forum/index.php" target="_blank"> Discuss Platform
                            </a>
                        </li>
                    </ul>


                </li>
 -->


                <!--  Drop down on hover Categories -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Categories </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        $sql = "SELECT h_cat_id, h_cat_name FROM `h_categories` ";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "Test successful";
                            $cat_id = $row['h_cat_id'];
                            $cat_name = $row['h_cat_name'];

                            echo ' <li><a class="dropdown-item" href="all_cat_here.php?catid='.$cat_id.'"> ' . $cat_name . ' </a></li> ';
                        }
                        ?>

                    </ul>
                </li>




            </ul>






            <?php
            // session_start();
            // if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] == true) {
            if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] == true) {

                echo ' <button type="button" class="btn-sm btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#loginModal"
            style="background-color: #04E930;">
            Login
            </button>
            
            <button type="button" class="btn-sm btn-warning mx-3 fw-bold" data-bs-toggle="modal"
            data-bs-target="#signupModal" style="background-color: #FC810C;">
            SignUp
            </button> ';
            } else {

                $fullname = $_SESSION['fullname'];
                echo '<p class="user-name-display-end my-auto ">Welcome <span class=" mx-2 fw-bold "> ' . $fullname . ' </span></p>';


                echo ' <button  type="button" class="btn-sm btn-danger mr-3 fw-bold my-logoutbutton" data-bs-toggle="modal"
            data-bs-target="#logoutModal">
            Log Out
        </button> ';
            }
            ?>





            <form class="d-flex" action="search.php" action="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn-sm btn-secondary" type="submit">Search</button>
            </form>


        </div>
    </div>
</nav>






<?php
require '_loginModal.php';
require '_signupModal.php';
require '_logoutModal.php';



// Alert Section starts here

// ALET FOR SIGN UP  
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true') {
    echo ' <div class="mb-0 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Sign up completed. Now you can Login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
} elseif (isset($_GET['emailExists']) && $_GET['emailExists'] == 'true') {
    echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> This Email ID already Exists. Please Login Now.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
} elseif (isset($_GET['passwordNotMatch']) && $_GET['passwordNotMatch'] == 'true') {
    echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> Password do not match.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
}




// Alert for Login by GET    
if (isset($_GET['emailNotExist']) && $_GET['emailNotExist']) {
    $showError = " This Email ID doesn't Exists. Please Sign Up first.";
    echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> ' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
} elseif (isset($_GET['incorrectPassword']) && $_GET['incorrectPassword']) {
    $showError = "Incorrect Password Entered.";
    echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong> ' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
} elseif (isset($_GET['login']) && $_GET['login']) {
    $showAlert = "You are Logged in & Your Session has been Started.";
    echo ' <div class="mb-0 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success! </strong> ' . $showAlert . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
} elseif (isset($_GET['logout']) && $_GET['logout']) {
    $showAlert = "You are Logged Out & Your Session has been Ended.";
    echo ' <div class="mb-0 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success! </strong> ' . $showAlert . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
}






// ALET FOR BOOKED APPOINTMENT
if (isset($_GET['booked_appointment']) && $_GET['booked_appointment'] == 'true') {
    echo ' <div class="mb-0 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Your Appointment has been booked successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';

}

?>