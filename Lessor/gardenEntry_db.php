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
$endPeriod = h($_POST['endPeriod']);
$price = h($_POST['price']);
$image = $_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'],'./../images/'. $image);

//$image = h($image);
$purpose = h($_POST['purpose']);








//郵便番号は半角英数の7桁かどうかだけチェックする
if(empty($address)){
	$_SESSION['gardenUp_error'] = '住所を入力してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(!is_numeric($zip) || strlen($zip) !== 7){
	$_SESSION['gardenUp_error'] = '正しい郵便番号を入力してください。';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($startPeriod)){
	$_SESSION['gardenUp_error'] = '開始日を選択してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($endPeriod)){
	$_SESSION['gardenUp_error'] = '終了日を選択してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($price)){
	$_SESSION['gardenUp_error'] = '金額を入力してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($image)){
	$_SESSION['gardenUp_error'] = '画像を選択してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($purpose)){
	$_SESSION['gardenUp_error'] = '目的を入力してください';
	header('Location:./gardenEntry.php');
	exit();
}



require_once __DIR__ . '/../classes/garden.php';
$garden = new Garden();

$result = $garden->gardenUp($userId,$zip,$address,$startPeriod,$endPeriod,$price,$image,$purpose);

//登録に失敗した場合は、エラーメッセージをセッションに保存し、gardenEntry.phpに遷移する
if($result !== ""){
	$_SESSION['gardenUp_error'] = $result;
	sleep(3);
	header("Location: ./gardenEntry.php");
	exit();
}

//庭情報をセッションに保存する
$_SESSION['userId'] = $userId;
$_SESSION['zip'] = $zip;
$_SESSION['address'] = $address;
$_SESSION['startPeriod'] = $startPeriod;
$_SESSION['endPeriod'] = $endPeriod;
$_SESSION['purpose'] = $purpose;
$_SESSION['price'] = $price;
$_SESSION['image'] = $image;
?>

庭を登録しました。<br>
<table>
	<tr><td>ID</td><td><?= $userId ?></td></tr>
	<tr><td>郵便番号</td><td><?= mb_substr($zip,0,3) ?>-<?= mb_substr($zip,3,6) ?></td></tr>
	<tr><td>住所</td><td><?= $address ?></td></tr>
	<tr><td>貸出期間</td><td><?= $startPeriod ?>~<?= $endPeriod ?></td></tr>
	<tr><td>金額</td><td><?= $price ?></td></tr>
	<tr><td>目的</td><td><?= $purpose ?></td></tr>
	<tr><td>画像</td><td><?= '<img src="img.php?$image='.$image.'">' ?></td></tr>
</table>

<?php
	require_once __DIR__ . '/../footer.php';
?>
