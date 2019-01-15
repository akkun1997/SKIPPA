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
$kane = h($_POST['kane']);
$gazou = $_FILES['gazou']['name'];
$gazou = h($gazou);
$purpose = h($_POST['purpose']);

if(!isset($_SESSION)){
	session_start();
}


//郵便番号は半角英数の7桁かどうかだけチェックする
if(empty($address)){
	$_SESSION['signup_error'] = '住所を入力してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(!is_numeric($zip) || strlen($zip) !== 7){
	$_SESSION['signup_error'] = '正しい郵便番号を入力してください。';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($startPeriod)){
	$_SESSION['signup_error'] = '開始日を選択してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($lastPeriod)){
	$_SESSION['signup_error'] = '終了日を選択してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($kane)){
	$_SESSION['signup_error'] = '金額を入力してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($gazou)){
	$_SESSION['signup_error'] = '画像を選択してください';
	header('Location:./gardenEntry.php');
	exit();
}

if(empty($purpose)){
	$_SESSION['signup_error'] = '目的を入力してください';
	header('Location:./gardenEntry.php');
	exit();
}

require_once __DIR__ . '/../classes/garden.php';
$garden = new Garden();
echo $zip;
$result = $garden->gardenUp($userId,$zip,$address,$startPeriod,$lastPeriod,$kane,$purpose,$gazou);

//登録に失敗した場合は、エラーメッセージをセッションに保存し、gardenEntry.phpに遷移する
if($result !== ""){
	$_SESSION['signup_error'] = $result;
	sleep(3);
	header("Location: ./gardenEntry.php");
	exit();
}

//庭情報をセッションに保存する
$_SESSION['userId'] = $userId;
$_SESSION['zip'] = $zip;
$_SESSION['address'] = $address;
$_SESSION['startPeriod'] = $startPeriod;
$_SESSION['lastPeriod'] = $lastPeriod;
$_SESSION['purpose'] = $purpose;
$_SESSION['kane'] = $kane;
$_SESSION['gazou'] = $gazou;
?>
<?php
	move_uploaded_file($_FILES['gazou']['tmp_name'],'/../images/'. $gazou);
 ?>
庭を登録しました。<br>
<table>
	<tr><td>ID</td><td><?= $userId ?></td></tr>
	<tr><td>郵便番号</td><td><?= mb_substr($zip,0,3) ?>-<?= mb_substr($zip,3,6) ?></td></tr>
	<tr><td>住所</td><td><?= $address ?></td></tr>
	<tr><td>貸出期間</td><td><?= $startPeriod ?>~<?= $lastPeriod ?></td></tr>
	<tr><td>金額</td><td><?= $kane ?></td></tr>
	<tr><td>目的</td><td><?= $purpose ?></td></tr>
	<tr><td>電話番号</td><td><?= $tel ?></td></tr>
</table>

<?php
	header('Location:' .$index_php);
?>
