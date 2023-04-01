<!-- Database conn -->
<?php include "includes/db.php"; ?>

<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navbar -->
<?php include "includes/nav.php"; ?>

    <div class="container">
        <div class="row">
                <?php
                    $query = "SELECT * FROM dvd ";
                    $select_all_categories_query = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $sku = $row['SKU'];
                        $name = $row['Name'];
                        $price = $row['Price'];
                        $size = $row['Size'];
                ?>
                
                    <div class="col-md-3 box" style="background-color:#33475b">
                        <input class="form-check-input delete-checkbox" type="checkbox" value="" id="flexCheckDefault">
                        <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                        <p><?php echo $sku ?></p>
                        <p><?php echo $name ?></p>
                        <p><?php echo $price ?></p>
                        <p><?php echo $size ?></p>
                    </div>
                       
                <?php
                    } 
                ?>
                
                <?php
                    $query = "SELECT * FROM book ";
                    $select_all_categories_query = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $sku = $row['SKU'];
                        $name = $row['Name'];
                        $price = $row['Price'];
                        $weight = $row['Weight'];
                ?>
                
                    <div class="col-md-3 box" style="background-color:#33475b">
                        <input class="form-check-input delete-checkbox" type="checkbox" value="" id="flexCheckDefault">
                        <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                        <p><?php echo $sku ?></p>
                        <p><?php echo $name ?></p>
                        <p><?php echo $price ?></p>
                        <p><?php echo $weight ?></p>
                    </div>
                       
                <?php
                    } 
                ?>

                <?php
                    $query = "SELECT * FROM furniture ";
                    $select_all_categories_query = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $sku = $row['SKU'];
                        $name = $row['Name'];
                        $price = $row['Price'];
                        $dimHeight = $row['DimHeight'];
                        $dimWidth = $row['DimWidth'];
                        $dimLength = $row['DimLength'];
                ?>
                
                    <div class="col-md-3 box" style="background-color:#33475b">
                        <input class="form-check-input delete-checkbox" type="checkbox" value="" id="flexCheckDefault">
                        <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                        <p><?php echo $sku ?></p>
                        <p><?php echo $name ?></p>
                        <p><?php echo $price ?></p>
                        <p><?php echo strval($dimHeight) . 'x' . strval($dimWidth) . 'x' . strval($dimLength) ?></p>
                    </div>
                       
                <?php
                    } 
                ?>
            
        </div> 
    </div>
    





</body>
</html>