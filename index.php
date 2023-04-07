<!-- Database conn -->
<?php include "includes/db.php"; ?>

<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navbar -->
<?php include "includes/nav.php"; ?>

    <div class="container min-vw-100 px-5">
        <div class="row gy-4 pt-5">
            <!-- Select DVD -->
            <?php
                $query = "SELECT * FROM products WHERE Type = 'DVD' ORDER by SKU";

                $select_all_categories_query = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                    $sku = $row['SKU'];
                    $name = $row['Name'];
                    $price = $row['Price'];
                    $size = $row['Size'];  
            ?>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="col box">
                    <input class="form-check-input delete-checkbox" type="checkbox" value="">
                    <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                        <p><?php echo $sku ?></p>
                        <p><?php echo $name ?></p>
                        <p><?php echo $price ?></p>
                        <p><?php echo $size ?></p>
                    </div>
                </div>
            <?php
                } 
            ?>

            <!-- Select Book -->
            <?php
                $query = "SELECT * FROM products WHERE Type = 'Book'";

                $select_all_categories_query = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                    $sku = $row['SKU'];
                    $name = $row['Name'];
                    $price = $row['Price'];
                    $weight = $row['Weight'];
            ?>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="col box">
                    <input class="form-check-input delete-checkbox" type="checkbox" value="">
                    <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                        <p><?php echo $sku ?></p>
                        <p><?php echo $name ?></p>
                        <p><?php echo $price ?></p>
                        <p><?php echo $weight ?></p>
                    </div>
                </div>
            <?php
                } 
            ?>

            <!-- Select Furniture -->
            <?php
                $query = "SELECT * FROM products WHERE Type = 'Furniture'";

                $select_all_categories_query = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                    $sku = $row['SKU'];
                    $name = $row['Name'];
                    $price = $row['Price'];
                    $dim = $row['dimHeight'] . 'x'. $row['dimWidth'] .'x'. $row['dimLength'];   
            ?>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="col box">
                    <input class="form-check-input delete-checkbox" type="checkbox" value="">
                    <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                        <p><?php echo $sku ?></p>
                        <p><?php echo $name ?></p>
                        <p><?php echo $price ?></p>
                        <p><?php echo $dim ?></p>
                    </div>
                </div>
            <?php
                } 
            ?>


        </div> 
    </div>
<?php include "includes/footer.php" ?>