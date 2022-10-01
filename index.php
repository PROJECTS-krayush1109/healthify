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

        
           <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
    <?php 
    // require 'stylesheet/_mobile.php'
    // my custom css is added to the _header.php because it is included in all other file already
    ?>

    <title>Healthify+</title>
</head>

<body style="background-color:whitesmoke">

    <!-- connecting to the database -->
    <?php require 'partials/_dbconnect.php';  ?>

    <!-- Invoking Navbar -->
    <?php require 'partials/_header.php';  ?>



    <!-- Carousel starts from here -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x300/?nature health" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x300/?ayurveda yoga" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x300/?meditation" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>




    <!-- Heading and all card are here -->
    <h1 class="mt-3 mb-5 text-center fw-bold">Welcome to Healthcare Platform ~ Healthify+</h1>
    <div class="container ">

        <!-- Rows for all category display and auto go down if excess boxes are there -->
        <div class="row ">

            <!-- Fetching all category from the database  -->
            <?php
                $select = "SELECT * FROM `h_categories` ";
                $result = mysqli_query($conn, $select);
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['h_cat_id'];
                    $cat = $row['h_cat_name'];
                    $desc = $row['h_cat_desc'];
                    
                    
                    // Displaying all cards using while loop
                    echo '    
                    
                    
                    <div class="col-md-4 my-4 d-flex justify-content-center">
                    <a href="all_cat_here.php?catid='.$id.' " class="">
                    <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1600x900/?'. $cat .' health fruits" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none" href="all_cat_here.php?catid='.$id.' ">'.$cat .'</a></h5>
                    <p class="card-text">
                        '.  substr($desc, 0, 100)  .' ....
                    </p>
                    <a href="all_cat_here.php?catid='.$id.' " class="btn btn-primary">Book Now</a>
                    </div>
                    </div>
                    </a>
                    </div>

                    
                    
                ';    
                } 
            ?>

        </div>
    </div>






















    <!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->

</body>

</html>