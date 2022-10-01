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

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">

    <?php 
    // require 'css/shop_by_health_condition.php'
    // require 'css/_mobile.php'
    // my custom css is added to the _header.php because it is included in all other file already
    ?>

    <title>Healthify+</title>
</head>

<body style="background-color:whitesmoke">

    <!-- connecting to the database -->
    <?php require 'partials/_dbconnect.php';  ?>

    <!-- Invoking Navbar -->
    <?php require 'partials/_header.php';  ?>




    <div class="container-fluid alert-inf py-3 cover-img">

        <div class="row">

            <div class="col-md my-2 ">
                <a href="#"><img src="img/shop_by_health_condition/cardiac.jpg" class="img-fluid rounded hc"
                        alt="" srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#cardiac"><img src="img/shop_by_health_condition/diabetes.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#diabetes"> <img src="img/shop_by_health_condition/eye.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#eye"> <img src="img/shop_by_health_condition/hair.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#hair"> <img src="img/shop_by_health_condition/lungs.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#lungs"> <img src="img/shop_by_health_condition/neuro.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#neuro"> <img src="img/shop_by_health_condition/ortho.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#ortho"> <img src="img/shop_by_health_condition/skin.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>

            <div class="col-md my-2">
                <a href="#skin"> <img src="img/shop_by_health_condition/stomach.jpg" class="img-fluid rounded hc" alt=""
                        srcset=""></a>
            </div>
        </div>
    </div>
    <h3 class="my-3 mx-5">Shop by Health Condition</h3>



    <?php 
        $sql = " SELECT * FROM `h_disease_list` ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result) ) {
            $title = $row['d_title'];
            $symptom = $row['d_symptom'];
            $prevention = $row['d_prevention'];
            $link = $row['link'];
            
            echo '
            
            <div class="container mt-3"  >
                <div class=" alert alert-info p-5 pt-3 ">
                    
                    <h1 class="justify-content-center d-flex" > '. $title .' </h1>
                    
                    <span class="fw-bold fs-5 text-danger">Symptoms : </span>
<pre style="white-space: pre-wrap; font-family: "Baloo 2", cursive;">
'.$symptom.' </pre>
                        
                        <span class="fw-bold fs-5 text-primary" >Prevention :</span>
                        
<pre style="white-space: pre-wrap; font-family: "Baloo 2", cursive;" >
'.$prevention.'
</pre>                           
                        
                        
                        <a href="https://www.netmeds.com/catalogsearch/result?q='.$link.'" target="_blank"><button class="btn btn-success" type="button">Suggested Medicine for '.$title.' </button></a>
                        "
                        <div type="hidden" name="" id="'.$link.'" > </div>

                        </div>
                        </div>
                   
                        ';
                        }
                    ?>


    <nav aria-label="Page navigation example" style="position: sticky; bottom: 1rem; " >
    <ul class="pagination justify-content-center">
    <li class="page-item disabled">
    <!-- <a class="page-link" href="#" tabindex="-1">Previous</a> -->
    </li>
        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
        
        <?php 
        $sql = " SELECT * FROM `h_disease_list` ";
        $result = mysqli_query($conn, $sql);
        $link = "cardiac";
        while($row = mysqli_fetch_assoc($result) ) {
            $pagination_name = $row['d_title'];
            
            if($row['link'] == "cardiac"){
                $link = "";
            }
            
            echo '        
            
            <li class="page-item"><a class="page-link" href="#'.$link.'"> '.$pagination_name .' </a></li>
            ';
            
            $link = $row['link'];
        }
    ?>
        
        <li class="page-item">
        <!-- <a class="page-link" href="#">Next</a> -->
        </li>
        </ul>
        </nav>








<!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->

</body>

</html>