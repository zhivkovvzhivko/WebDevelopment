<?php

require_once('Person.php');
require_once('Son.php');
require_once('Father.php');
require_once('GrandSon.php');

$father = Father('James Strong', '1873', '1923');

$son1 = Son('Peter Strong', '1894 ', '1928');
$son2 = Son('Andrew Strong', '1899', '1970');

$grandSon1 = GrandSon('Jackson Strong ', '1927', '1992');
$grandSon2 = GrandSon('Martin Strong', '1927', '1967');
$grandSon3 = GrandSon('Gregory Strong', '1931', '2000');

$familyThree = [$father => [$son1, $son2 => [$grandSon1, $grandSon2, $grandSon3]]];

$fathers = 0;
$totalFathersLivedTime = 0;
$sons = 0;
$totalSonsLivedTime = 0;

foreach ($familyThree as $father) {
	$fathers = 0;
	$totalSonsLivedTime += $father->getTimeLived() ;		
	foreach ($father as $sons) {
		foreach ($sons as $key => $value) {
			# code...
		}
	}
}