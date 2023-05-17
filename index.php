<!-- Database conn -->
<?php include "includes/db.php"; ?>

<!-- This is to avoid error when refreshing header -->
<?php
ob_start();
?>

<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navbar -->
<nav class="navbar border-bottom mx-5">
    <a class="navbar-brand" href="#"><?php echo getPageTitle(); ?></a>
    <form class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0"><a class="button" href="add.php">ADD</a></button>
        <label class="btn btn-outline-success my-2 my-sm-0" for="mass_delete">MASS DELETE</label>
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" name='mass_delete' form="myForm" id='mass_delete' value="Update" type="submit"><?php echo getPageButton2(); ?></button> -->
    </form>
</nav>
<!-- Form - All products -->
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
                        <div class="product-details">
                            <p><?php echo $sku ?></p>
                            <p><?php echo $name ?></p>
                            <p><?php echo $price ?></p>
                            <p><?php echo $size ?></p>
                        </div>
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
                        <div class="product-details">
                            <p><?php echo $sku ?></p>
                            <p><?php echo $name ?></p>
                            <p><?php echo $price ?></p>
                            <p><?php echo $weight ?></p>
                        </div>
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
                        <div class="product-details">
                            <p><?php echo $sku ?></p>
                            <p><?php echo $name ?></p>
                            <p><?php echo $price ?></p>
                            <p><?php echo $dim ?></p>
                        </div>
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
        // Refresh the product list page after deleting the products
        header("Refresh:0; url=index.php");
        exit;
    } 
}
} 

?>
    <input class="hidden" type="submit" name="mass_delete" id="mass_delete" value="" />
    
    </form>

<?php
ob_end_flush();
?>

<?php include "includes/footer.php" ?>