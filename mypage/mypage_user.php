<?php
	require_once __DIR__ . '/../header.php';
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
    <p>ユーザー情報の編集</p>
</head>
<body>
<!--<form method="POST" action="./signup_db.php"> dbファイルで処理するか検討中-->
    <table>
        <tr><td>性</td><td><input type="text" name="Newname" value="<?=$userName?>" required></td></tr>
        <tr><td>名（userIdで性名を登録してるので分ける必要がある）</td><td><input type="text" name="Newname" value="<?=$userName?>" required></td></tr>
        <tr><td>メールアドレス</td><td><input type="text" name="NewuserId" value="<?=$userId?>" required></td></tr>
        <tr><td>電話番号</td><td><input type="text" name="Newtel" value="<?=$tel?>" required></td></tr>

        <!--<tr><td>住所</td><td><input type="text" name="address" value="<?=$address?>" required></td></tr>
        <tr><td>電話番号</td><td><input type="text" name="tel" value="<?=$tel?>" required></td></tr>
        <tr><td>パスワード</td><td><input type="password" name="password" required></td></tr>
        <tr><td colspan="2"><input type="submit" value="送信"></td></tr>-->

    </table>

    <a href="mypage.php">変更する</a>   <!--POSTで変更内容を送る予定-->
    <p align="right"><a href = "mypage.php">戻る（その他サイトでは戻るボタンがないため削除予定）</a></p>

</body>
<?php
	require_once __DIR__ . '/../footer.php';
?>