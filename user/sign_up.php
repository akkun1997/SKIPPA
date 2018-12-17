<?php
	require_once __DIR__ . '/../header.php';

	if(isset($_SESSION['signup_error'])){
		echo '<p class = "error_class">'. $_SESSION['signup_error'] .'</p>';
		unset($_SESSION['signup_error']);
	}

	//ログイン済みの場合、セッションにユーザー情報が保持されているので、それを取り出す
	/*$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : '';
	$userName = isset($_SESSION['userName']) ? $_SESSION['userName'] : '';
	$kana = isset($_SESSION['kana']) ? $_SESSION['kana'] : '';
	$zip = isset($_SESSION['zip']) ? $_SESSION['zip'] : '';
	$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
	$tel = isset($_SESSION['tel']) ? $_SESSION['tel'] : '';*/

?>
<p>ユーザー情報を登録して下さい</p>
<form method = "POST" action = "./sign_up_DB.php">
	<table>
		<tr><td>Eメール</td><td><input type="text" name="userId" required></td></tr> 
		<tr><td>名前</td><td><input type="text" name="userName" required></td></tr> 
		<tr><td>フリガナ</td><td><input type="text" name="kana" required></td></tr> 
		<tr><td>郵便番号</td><td><input type="text" name="zip" required></td></tr> 
		<tr><td>住所</td><td><input type="text" name="address" required></td></tr> 
		<tr><td>電話番号</td><td><input type="text" name="tel" required></td></tr> 
		<tr><td>パスワード</td><td><input type="password" name="password" required></td></tr>
		<tr><td colspan="2"><input type="submit" value="送信"></td></tr>
	</table>
</form>
<?php
	require_once __DIR__ . '/../footer.php';
?>