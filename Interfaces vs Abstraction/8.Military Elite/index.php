<?php

include_once('Soldier.php');
include_once('PrivateSoldier.php');
include_once('LeutenantGeneral.php');

while (true) {
	$input = readline();
	if ($input === 'End') {
		break;
	}

	$args = explode(' ', $input);

	$firstName = $args[1];
	$lastName = $args[2];
	$id = $args[3];
	if ($args[0] == 'Private' && count($args) == 5) {
		$salary = $args[4];
		$privateSoldier = new PrivateSoldier($id, $firstName, $lastName, $salary);
	} elseif($args[0] == 'LeutenantGeneral' && count($args) >= 5) {
		$leutenantGeneral = new LeutenantGeneral();
	}
}