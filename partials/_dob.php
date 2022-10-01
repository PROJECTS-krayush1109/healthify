<!-- <select class="form-select" aria-label="Default select example" name="dd">
    <option selected>DD</option>
    <option value="1">One</option>
    <option value="1">One</option>

</select> -->




<div class="mb-3 col-md-7 d-flex row">
    <div class="col-12">
        <label for="dropdownMenuButton1"> Date of Birth (dd, mm, yy)</label>
    </div>

    <div class="col-md-3">
        <select class="form-select" aria-label="Default select example" name="dd">
            <option selected>DD</option>
            <!-- <option value="1">One</option> -->
            <?php
                $d=1;
                while($d<=31){
                    // echo $d;
                    echo '<option value="'.$d.'"> '.$d.' </option> ';
                    $d++;
                };
            ?>
        </select>
    </div>

    <div class="col-md-5">
        <select class="form-select" aria-label="Default select example" name="mm">
            <option selected>MM</option>
            <?php
                for ($m=1; $m<=12; $m++) {
                    $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                    echo '<option value="'.$month.'"> '.$month.' </option> ';
                    }
                ?>

        </select>
    </div>

    <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" name="yy">
            <option selected>YY</option>
            <?php
                $y=2019;
                while($y>=1930){                    
                    echo '<option value="'.$y.'"> '.$y.' </option> ';
                    $y--;
                };
            ?>
        </select>
    </div>
</div>