<?php $active='About'; // for navbar active link glow ?>


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


    <title>Healthify+ ~ About</title>
</head>

<body style="background-color:whitesmoke">

    <!-- connecting to the database -->
    <?php require 'partials/_dbconnect.php';  ?>

    <!-- Invoking Navbar -->
    <?php require 'partials/_header.php';  ?>

    <!-- Specific Thread container heading and description -->
    <div class="container mt-4">
        <div class="jumbotron alert alert-info">
            <h1 class="mb-2 text-center fw-bold"> About Us </h1>
            <p class="mx-5 fs-5 text-center">
                Healthify+ is a platform where any user or patient can Book an Appointment to the Doctor, With a single
                Search we provide all Buy Medicines Links from the different trusted and verfied website, and It has
                Documentation of Disease Symptoms and Prevention.
            </p>
            <br>
            <p class="text-center fs-5">Healthify+ Platform is Designed and Developed as Minor Project by Ayush | Aryan
                | Ashutosh ~
                LNCT Group of
                Colleges(3rd year students). <br> To add any feature or if found any bug of this Website must inform in
                the Comments. <br> Thank You! </p>

            <hr class="my-4">
            <p class="mx-5 fs-7 text-center">No Spam /
                Advertising / Self-promote in the forums. <br> Do not post copyright-infringing material. Do not post
                “offensive” posts, links or images. <br> Do not cross post questions. Remain respectful to other doctors
                at all times.</p>
        </div>
    </div>





    <!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->

</body>

</html>