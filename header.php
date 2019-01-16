<?php
	require_once __DIR__ . '/pre.php';
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>SKIPPA</title>
	<link rel = "stylesheet" href="<?= $skippa_css ?>">
</head>
<body>
	<div class = "main">
		<h1><a href = "<?= $index_php ?>" class="">SKIPPA</a></h1>
		<P>ようこそ！<?= $nickName ?>さん</P>
		<div class = "nav">
			<li><a href = "<?= $index_php ?>">トップページ</a></li>
			<li><a href = "<?= $search_php ?>">検索画面</a></li>
			<li><a href = "<?= $entryCategory_php ?>">物件登録</a></li>
			<li><a href = "<?= $skippaInfo_php ?>">SKIPPAとは</a></li>
			<?php
				if($userName === "ゲスト"){
					echo '<li><a href = "' . $login_php . '">ログイン</a></li>';
				}else{
					echo '<li><a href = "' .$mypage_php . '">マイページ</a></li>';
					echo '<li><a href = "' . $logout_php .'">ログアウト</a></li>';
				}
			?>
		</div>
		<hr>
