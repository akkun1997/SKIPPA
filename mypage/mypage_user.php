<?php
	require_once __DIR__ . '/../header.php';

	if(isset($_SESSION['update_error'])){
		echo '<p class = "error_class">'. $_SESSION['update_error'] .'</p>';
		unset($_SESSION['update_error']);
	}

    $license_path = "../LicenseImg/" . $license
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
    <p>ユーザー情報の編集</p>
</head>
<body>
    <script src = "previewImg.js"></script>
	<form method="POST" action="./userUpdate_DB.php" enctype="multipart/form-data">
    <table>
        <tr><td>名前</td><td><input type="text" name="newName" value="<?=$userName?>" required></td></tr>
        <tr><td>フリガナ</td><td><input type="text" name="newKana" value="<?=$kana?>" required></td></tr>
        <tr><td>ニックネーム</td><td><input type="text" name="newNick" value="<?=$nickName?>" required></td></tr>
        <tr><td>メールアドレス</td><td><input type="text" name="newUserId" value="<?=$userId?>" required></td></tr>
        <tr><td>電話番号</td><td><input type="text" name="newTel" value="<?=$tel?>" required></td></tr>
        <tr><td>郵便番号</td><td><input type="text" name="newZip" value="<?=$zip?>" required></td></tr>
        <tr><td>住所</td><td><input type="text" name="newAddress" value="<?=$address?>" required></td></tr>
        <tr><td>身分証明証</td><td><?php echo '<img src = "' .$license_path .'">'; ?></td></tr>
        <tr><td></td><td><input type="file" id = "myImage" name="newLicense" accept = "image/*" required><img id = "preview"></td></tr>
    </table>

    <input type = "submit" value = "変更する" class = "square_btn">

</body>
<?php
	require_once __DIR__ . '/../footer.php';
?>