<?php
session_start();

if($_SESSION['userName']==="ゲスト"){
	header('Location:../user/login.php');
	exit();
}
?>

<?php
	require_once __DIR__ . '/../header.php';

?>
<?php
  $purpose = "遊ぶ";
 ?>
	<p>民泊で登録中です</p>
	<form method="POST" action="./roomEntry_db.php" >
	<table>
		<tr><td>目的</td><td><input type="text" name="purpose" value="遊ぶ" required ></td></tr>
		<tr><td>郵便番号</td><td><input type="text" name="zip" ></td></tr>
		<tr><td>住所</td><td><input type="text" name="address" ></td></tr>
		<tr><td>貸す範囲</td><td><select name="lessorcate" >
											<option name="lessorcate" value="1">部屋のみ</option>
											<option name="lessorcate" value="2">家全体</option>
											</select></td></tr>
		<tr><td>料金(一日辺り)</td>
		<tr><td>
		<tr><td>
</table>
