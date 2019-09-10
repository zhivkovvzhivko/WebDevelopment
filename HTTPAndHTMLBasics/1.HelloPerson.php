<?php
	if (isset($_GET['person'])) {
		$name = $_GET['person'];
	 	echo "Hello, $name!";
	}
?>

<!-- 1. Hello Person -->
<form method="get">
	<input type="text" name="person">
	<input type="submit" value="Submit">
</form>
