<!-- Database conn -->
<?php include "includes/db.php"; ?>

<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navbar -->
<?php include "includes/nav.php"; ?>
    <form id="myForm" method="POST" action="index.php">
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
                    <input class="form-check-input delete-checkbox" type="checkbox" value="<?php echo $row['SKU']; ?>" name="delete[<?php echo $row['SKU']; ?>]">
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
                    <input class="form-check-input delete-checkbox" type="checkbox" value="<?php echo $row['SKU']; ?>" name="delete[<?php echo $row['SKU']; ?>]">
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
                    <input class="form-check-input delete-checkbox" type="checkbox" value="<?php echo $row['SKU']; ?>" name="delete[<?php echo $row['SKU']; ?>]">
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
    <?php

if (isset($_POST['mass_delete'])) {
    if (isset($_POST['delete'])) {
        $delete_checked = $_POST['delete'];

        if (!empty($delete_checked)) {
            foreach ($delete_checked as $sku) {
                $delete_query = "DELETE FROM products WHERE SKU = '$sku'";
                mysqli_query($conn, $delete_query);
            }
        // Redirect to the product list page after deleting the products
        header("Refresh:0");
        exit;
    } 
}
} 

?>
    <input class="hidden" name="mass_delete" id="mass_delete" value='' type="submit"/>
    
    </form>
<?php include "includes/footer.php" ?>