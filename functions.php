<!-- Get page title -->
<?php
function getPageTitle() {
	$pageTitle = "Scandiweb"; // Set default title

	// Check which page we're on and set the title accordingly
	if ($_SERVER["PHP_SELF"] == "/Scandiweb/index.php") {
		$pageTitle = "Product List";
	} elseif ($_SERVER["PHP_SELF"] == "/Scandiweb/add.php") {
		$pageTitle = "Product Add";
	}

	return $pageTitle;
}

?>

<!-- Get page button1 -->
<?php
function getPageButton1() {
	$pageButton1 = "Button1"; // Set default button1

	// Check which page we're on and set the button1 accordingly
	if ($_SERVER["PHP_SELF"] == "/Scandiweb/index.php") {
		$pageButton1 = "ADD";
	} elseif ($_SERVER["PHP_SELF"] == "/Scandiweb/add.php") {
		$pageButton1 = "SAVE";
	}

	return $pageButton1;
}

?>

<!-- Get page button2 -->
<?php
function getPageButton2() {
	$pageButton1 = "Button2"; // Set default button1

	// Check which page we're on and set the button1 accordingly
	if ($_SERVER["PHP_SELF"] == "/Scandiweb/index.php") {
		$pageButton2 = "MASS DELETE";
	} elseif ($_SERVER["PHP_SELF"] == "/Scandiweb/add.php") {
		$pageButton2 = "CANCEL";
	}

	return $pageButton2;
}

?>

<!-- Get typeSwitcher -->
<?php 
	$selected = '';

	function get_options() {
	$typeOptions = array('Type Switcher', 'SKU', 'Name', 'Price');
	$typeSwitcher = '';
	for($i=0; $i<count($typeOptions); $i++) {
		$typeSwitcher .= '<option '
							. ($_GET['typeSwitcher'] == $typeOptions[$i] ? 'selected="selected"' : '' ) . '>'
							. $typeOptions[$i]
							. '</options>';
	}
		echo $typeSwitcher;
	
	}
	if(isset($_POST['typeOptions'])) {
		$selected = $_POST['typeOptions'];
		echo $selected;
	}



?>