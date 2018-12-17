<?php
	require_once __DIR__ . '/../header.php';
?>
<p>ログインページ</p>
<form method = "POST" action = "./login_db.php">
	<table>
		<tr><td>Eメール</td><td><input type = "text" name = "userId" required></td></tr>
		<tr><td>パスワード</td><td><input type = "password" name = "password" required></td></tr>
		<tr><td colspan="2"><input type = "submit" value = "ログイン"></td></tr>
	</table>
</form>
<a href = "./sign_up.php"><span class = "button_image">新規登録はこちらから</span></a>
<?php
	require_once __DIR__ . '/../footer.php';
?>