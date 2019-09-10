<!-- 9. HTMLTable -->
<form>
	Name: <input type="text" name="name"> <br/>
	Phone number: <input type="text" name="phone"> <br/>
	Age: <input type="text" name="age"> <br/>
	Address: <input type="text" name="address"> <br/>

	<input type="submit" name="Submit">
</form>

<?php

if (isset($_GET['name']) && isset($_GET['phone']) 
	&& isset($_GET['age']) && isset($_GET['address'])) {
	
	$name = htmlspecialchars($_GET['name']);
	$phone = htmlspecialchars($_GET['phone']);
	$age = htmlspecialchars($_GET['age']);
	$address = htmlspecialchars($_GET['address']);

	echo '<table border="2">';

	$word = '';
	$value = '';
	for ($i = 1; $i <= 4 ; $i++) {
		switch ($i) {
			case '1':
				$word = 'Name';
				$value = $name;
				break;
			case '2':
				$word = 'Phone number';
				$value = $phone;
				break;
			case '3':
				$word = 'Age';
				$value = $age;
				break;
			case '4':
				$word = 'Address';
				$value = $address;
				break;
		}

		echo "<tr><td style='background-color: orange'>$word</td><td>$value</td></tr>";
	}

	echo '</table>';
}

?>