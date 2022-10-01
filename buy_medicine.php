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

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />


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



    <h2 class="text-center my-3 mb-5">Buy Medicine Form Trusted and Verified Link</h2>

<form action="/ayush/healthify/buy_medicine.php" method="POST"> 

    <div class="input-group justify-content-center my-5 outline-black" style="" >
        <div class="form-outline">
            <input type="search" name="search" style="border: 1px solid blue; width: 25rem;" id="form1" class="form-control" />
            <label class="form-label" for="form1"></label>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>



    <div class="container-fluid row g-4">


        <?php 

            $kwd = false;

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                include 'partials/_dbconnect.php';

                $query = $_POST['search'];
                // qurey sanitization
                $query = str_replace("<", "&lt;", $query);
                $query = str_replace(">", "&gt;", $query);
                $kwd = $query;        
            }            

            if(!isset($_POST['search']) || $_POST['search'] == "" ){
                echo ' <div style="height: 25rem" ></div> ';
            }

            if(isset($_POST['search']) && !$_POST['search'] == "" ){
                // echo "Something is searched.";
            

            echo ' <h3>For Searched keyword "<span class="text-danger" >'.$kwd.'</span>". Buy Medicine from </h3> ';


        
            $sql = " SELECT * FROM `h_buy_medicine` ";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)){
                $title = $row['title'];
                $desc_med = $row['desc_med'];
                $link = $row['link'];
                $img_name = $row['img_name'];                
                

                echo '
                
                <div class="col-md-4 my-3 d-flex justify-content-center">
                
                <a href="'.$link.$kwd.'" target="_blank" style="text-decoration: none !important;">
                <div class="card" style="width: 27rem;">
                <img src="img/buy_medicine_from/'.$img_name.'.jpg" class="card-img-top" style="height: 13.5rem " alt="...">
                <div class="card-body">
                <h5 class="card-title"> '. $title .'</h5>
                <p class="card-text text-dark"  >'.$desc_med.'</p>
                <a href="'.$link.$kwd.'" target="_blank" class="btn btn-success mt-3">Buy From '.$title.' </a>
                </div>
                </div>
                </a>
                
                </div>
                
                ';
            }
            }
                ?>

    </div>
    <!--- CONTAINER ENDS HERE ->
                









    <!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->

</body>

</html>