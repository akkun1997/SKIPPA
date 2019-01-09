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
        <tr><td>名前</td><td><input type="text" name="Newname" value="<?=$userName?>" required></td></tr>
        <tr><td>メールアドレス</td><td><input type="text" name="NewuserId" value="<?=$userId?>" required></td></tr>
        <tr><td>電話番号</td><td><input type="text" name="Newtel" value="<?=$tel?>" required></td></tr>
    </table>

    <a href="mypage.php" class = "square_btn">変更する</a>   <!--POSTで変更内容を送る予定-->

</body>
<?php
	require_once __DIR__ . '/../footer.php';
?>