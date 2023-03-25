<?php
function getPageTitle() {
	$pageTitle = "Scandiweb"; // Set default title

	// Check which page we're on and set the title accordingly
	if ($_SERVER["PHP_SELF"] == "/scandiweb/index.php") {
		$pageTitle = "Product List";
	} elseif ($_SERVER["PHP_SELF"] == "/scandiweb/add.php") {
		$pageTitle = "Product Add";
	}

	return $pageTitle;
}

?>