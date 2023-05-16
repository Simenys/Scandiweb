<!-- Database -->
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
		<label class="btn btn-outline-success my-2 my-sm-0" for="submit">Save</label>
        <button class="btn btn-outline-success my-2 my-sm-0"><a class="button" href="index.php">Cancel</a></button>
            <!-- <button class="btn btn-outline-success my-2 my-sm-0" name='mass_delete' form="myForm" id='mass_delete' value="Update" type="submit"><?php echo getPageButton2(); ?></button> -->
    </form>
</nav>
<!-- Form - Add products -->

	<?php
        /* Dropdown selection stored */
        $submittedValue = "";
		$option0 = "Type Switcher";
        $option1 = "DVD";
        $option2 = "Book";
        $option3 = "Furniture";
        if(isset($_POST["typeSwitcher"])) {
            $submittedValue = $_POST["typeSwitcher"];
        }
		/* echo $submittedValue; */
	?>
	<!-- Post to table in database -->
	<?php 
		if(isset($_POST["submit"])) {
            $sku = $_POST['SKU'];
           	$name = $_POST['Name'];
        	$price = $_POST['Price'];
			$type = $_POST['typeSwitcher'];
			$size = isset($_POST['Size']) ? $_POST['Size'] : null;
        	$weight = isset($_POST['Weight']) ? $_POST['Weight'] : null;
        	$dimHeight = isset($_POST['dimHeight']) ? $_POST['dimHeight'] : null;
        	$dimWidth = isset($_POST['dimWidth']) ? $_POST['dimWidth'] : null;
        	$dimLength = isset($_POST['dimLength']) ? $_POST['dimLength'] : null;
            $query = "INSERT INTO products(SKU, Name, Price, Type, Size, Weight, dimHeight, dimWidth, dimLength)";
            $query .= "VALUES ('$sku', '$name', '$price', '$type', '$size', '$weight', '$dimHeight', '$dimWidth', '$dimLength')"; 
            $result = mysqli_query($conn, $query);
            if(!$result) {
                die('Item save failed');
            }
        }
	?>

<!-- Form -->
<form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="POST" id="product_form">
    <label for="SKU">SKU</label><input type="text" name="SKU" id="sku"><br>
    <label for="Name">Name</label><input type="text" name="Name" id="name"><br>
    <label for="Price">Price</label><input type="text" name="Price" id="price"><br>
    <label for="typeSwitcher">Type Switcher</label>
    <select name="typeSwitcher" id="typeSwitcher" style="max-width: 150px">
		<option value="<?php echo $option0; ?>"><?php echo $option0; ?></option>
		<option value="<?php echo $option1; ?>"><?php echo $option1; ?></option>
		<option value="<?php echo $option2; ?>"><?php echo $option2; ?></option>
		<option value="<?php echo $option3; ?>"><?php echo $option3; ?></option>
	</select><br>
    <!-- Input for DVD -->
    <div id="size_container" style="display:none">
        <label for="Size">Size</label><input type="text" name="Size"><br>
    </div>
    <!-- Input for Book -->
    <div id="weight_container" style="display:none">
        <label for="Weight">Weight</label><input type="text" name="Weight"><br>
    </div>
    <!-- Input for Furniture -->
    <div id="dimensions_container" style="display:none">
        <label for="dimHeight">Height</label><input type="text" name="dimHeight"><br>
        <label for="dimWidth">Width</label><input type="text" name="dimWidth"><br>
        <label for="dimLength">Length</label><input type="text" name="dimLength"><br>
    </div>

    
	<script>
		function toggleInputs() {
  		const type = document.getElementById("typeSwitcher").value;
  		const inputMap = {
    		DVD: "size_container",
    		Book: "weight_container",
    		Furniture: "dimensions_container"
  		};
  		const inputContainer = inputMap[type] || "";
  		const allInputContainers = ["size_container", "weight_container", "dimensions_container"];
  		allInputContainers.forEach(input => {
    		const elem = document.getElementById(input);
    		elem.style.display = input === inputContainer ? "block" : "none";
  			});
		}

		document.getElementById("typeSwitcher").addEventListener("change", toggleInputs);
		toggleInputs();
	</script>

	<!-- This button should be moved to navbar as Save button -->
    <input class="hidden" type="submit" name="submit" id="submit" value="">

<?php
	if (isset($_POST['submit'])) {
        header("Refresh:0; url=index.php");
        exit;
    } 
?>


</form>

<?php
ob_end_flush();
?>

<!-- Footer -->
<?php include "includes/footer.php" ?>