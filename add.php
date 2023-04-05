<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navbar -->
<?php include "includes/nav.php"; ?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="product-form">
		
		<select value="<?php echo $typeSwitcher; ?> selected" name="typeOptions" onchange="this.form.submit();" id=""><?php echo get_options(); ?></select>
	</form>

<!-- Footer -->
<?php include "includes/footer.php" ?>