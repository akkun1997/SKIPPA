<?php

function h($data){
	return htmlspecialchars($data,ENT_QUOTES,"UTF-8");
}

session_start();

	require_once __DIR__ . '/../header.php';

?>

<?PHP
$userId =h($userId);
$zip =h($_POST['zip']);
$address = h($_POST['address']);
$startPeriod = h($_POST['startPeriod']);
$lastPeriod = h($_POST['lastPeriod']);
?>
