<?php

if (isset($_GET['input'])) {
	$text = $_GET['input'];

	for ($i=0; $i < strlen($text); $i++) { 
		$currentSymbol = ord($text[$i]);

		if ($text[$i] != '') {

			$result = "";
			if ($currentSymbol % 2 == 0) {
				$result .= "<span style='color: red'>$text[$i] </span>";
			} else {
				$result .= "<span style='color: blue'>$text[$i] </span>";
			}
			echo $result;
		}
	}
}

?>

<!-- 7. Coloring text
What a wonderful world!
-->
<form>
	<textarea cols="50" name="input"></textarea><br/>
	<input type="submit" value="Count Words">
</form>