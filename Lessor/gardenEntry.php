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

  <p>庭で登録中です</p>
	<form method="POST" action="./gardenEntry_db.php" enctype="multipart/form-data">
    <table>
        <tr><td>目的</td><td><input type="text" name="purpose" ></td></tr>
    		<tr><td>郵便番号</td><td><input type="text" name="zip" ></td></tr>
    		<tr><td>住所</td><td><input type="text" name="address" ></td></tr>
    		<tr><td>貸出期間</td><td><input type="date"  name="startPeriod"  max="9999-12-31">
				~
				<input type="date" name="lastPeriod" max="9999-12-31"></td></tr>
    		<tr><td>料金(1時間単位)</td><td><input type="text" name="kane"></td></tr>
        <tr><td>写真</td><td><input type="file" name="gazou"></td></tr>
        <tr><td colspan="2"><input type="submit" value="送信"></td></tr>
    </table>

    <?php
    	require_once __DIR__ . '/../footer.php';
    ?>
