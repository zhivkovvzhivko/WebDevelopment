<?php

if (isset($_GET['input'])) {
	$wordsCount = [];
	$input = $_GET['input'];
	$input = preg_split("/[^A-Za-z]+/", $input, -1, PREG_SPLIT_NO_EMPTY);

	foreach ($input as $item) {
		$item = strtolower($item);
		if (!array_key_exists($item, $wordsCount)) {
			$wordsCount[$item] = 1;
		} else {
			$wordsCount[$item]++;
		}
	}

	echo "<table border='2'>";
		foreach ($wordsCount as $key => $value) {
			echo "<tr><td>$key</td><td>$value</td></tr>";
		}
	echo '</table>';
}

?>

<!-- 6. Word Mapping 
The quick brows fox.!!! jumped over..// the lazy dog.!
-->
<form>
	<textarea cols="50" name="input"></textarea><br/>
	<input type="submit" value="Count Words">
</form>