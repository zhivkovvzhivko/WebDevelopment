<?php

if (isset($_GET['text'])) {
	$text = $_GET['text'];
	preg_match_all('/\b[A-Z]+\b/', $_GET['text'], $matches);
	echo implode(', ', $matches[0]);
}

?>

<!-- 5. Extract Capital Case Words
We start by HTML, CSS, JavaScript, JSON and REST.
Later we touch some PHP, MySQL and SQL.
Later we play with C#, EF, SQL Server and ASP.NET MVC.
Finally, we touch some Java, Hibernate and Spring.MVC.
-->
<form>
	<textarea rows="10" name="text"></textarea><br/>
	<input type="submit" value="Extract">
</form>