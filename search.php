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





            <!-- Specific Thread container heading and description -->
            <div class="container mt-4">
        <div class="jumbotron alert alert-info">
            <h1 class="mb-3 text-center fw-bold">
                Search Result for
                <span class="text-info" style="text-shadow: 1px 2px 3px black;">
                <?php echo $_GET['search']; ?>
                </span> 
            </h1>
            <hr class="my-">


            <?php

                $query = $_GET["search"];

                // qurey sanitization
                $query = str_replace("<", "&lt;", $query);
                $query = str_replace(">", "&gt;", $query);

                $noResult = true;

                $sql = "SELECT * FROM h_disease_list WHERE d_title LIKE '%$query%' OR d_symptom LIKE '%$query%' OR d_prevention LIKE '%$query%' ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $d_id =  $row['d_id'];
                    $title =  $row['d_title'];

                    $symptom =  $row['d_symptom'];
                    $symptom =  substr($symptom, 0, 150);
                    
                    $prevention =  $row['d_prevention'];
                    $prevention =  substr($prevention, 0, 150);

                    // JOGAR TECHNOLOGY FOR DOLLAR LINK
                    $nxtnum = $d_id-1;
                    $sql2 = "SELECT * FROM h_disease_list WHERE d_id='$nxtnum' ";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $link = $row2['link'];
                    
                    
                    $url = "/ayush/healthify/shop_by_health_condition.php#$link";

                    $noResult = false;


                    echo '
                    <div class="result">
                    <h3> <a href="'.$url.'"> '. $title .' </a> </h3>
                    <pre class="fs-5" style="white-space: pre-wrap;">
                       '. $symptom .'
                    </pre>
                    <pre class="fs-5" style="white-space: pre-wrap;">
                       '. $prevention .'
                    </pre>
                    </div>
                    ';

                }
                if($noResult){
                    echo ' <h3>It looks like there aren\'t many great matches for your search</h3> 
                            <p class="fs-5">Tip Try using words that might appear on the page that you’re looking for.</p>
                            <ul class="fs-5" >
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords.</li>
                            
                            </ul>

                            ';
                }
                
            
            ?>












    <!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->

</body>

</html>