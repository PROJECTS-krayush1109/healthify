<?php
    $id = $_GET['catid'] ;


    if($id==1){
        header("LOCATION: book_appointment.php");
        exit;
    }


    if($id==2){
        header("LOCATION: shop_by_health_condition.php");
        exit;
    }

    if($id==3){
        header("LOCATION: buy_medicine.php");
        exit;
    }


    // DELETE THESE LATER ON
    
    // $sql = "SELECT * FROM `h_users` WHERE category_id=$id ";
    // $result = mysqli_query($conn, $sql);
    // while($row=mysqli_fetch_assoc($result)) {
    //     // echo "Test successful";
    //     $cat_name = $row['category_name'];
    //     $desc = $row['category_description'];
    // }
    ?>