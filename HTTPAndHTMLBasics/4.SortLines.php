<?php
	if (isset($_GET['lines'])) {
		$input = array_filter(array_map('trim', explode(' ', $_GET['lines'])));
		sort($input, SORT_STRING);
		$sortedLines = implode("\n", $input);
		$sortedLines = $sortedLines ?? null;
	}
?>

<!-- 4. Sort Lines
Sofia Varna Plovdiv
-->
<form>
	<textarea rows="10" name="lines"> <?= $sortedLines ?? null ?> </textarea><br/>
	<input type="submit" value="Sort">
</form>