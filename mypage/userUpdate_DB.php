<?php

	require_once __DIR__ . '/../header.php';

	//エスケープ処理
	function h($data){
		return htmlspecialchars($data,ENT_QUOTES,"UTF-8");
	}

	//セッションが開始されていなければ開始する
	if(!isset($_SESSION)){
		session_start();
	}

	//変更内容の受け取り
	$userId = h($_POST['newUserId']);
	$userName = h($_POST['newName']);
	$kana = h($_POST['newKana']);
	$nickName = h($_POST['newNick']);
	$zip = h($_POST['newZip']);
	$address = h($_POST['newAddress']);
	$tel = h($_POST['newTel']);
	$license = h($_FILES['newLicense']['name']);

	//バリデーションはメアドと郵便番号のみとする
	//メアドのバリデーションはfilter_var()を使い、RFCに準拠しないメアドはエラーとする
	if(!filter_var($userId,FILTER_VALIDATE_EMAIL)){
		$_SESSION['update_error'] = '正しいメールアドレスを入力して下さい';
		header("Location:" .$mypageUser_php);
		exit();
	}

	//郵便番号は半角数字の7桁かどうかのチェック
	if(!is_numeric($zip) || strlen($zip) != 7){
		$_SESSION['update_error'] = '正しい郵便番号を入力して下さい';
		header("Location:" .$mypageUser_php);
		exit();	
	}

	//画像ファイルを保存する
	$filedir = "C:/xampp/htdocs/SKIPPA/LicenseImg/";
	if(is_uploaded_file($_FILES["newLicense"]["tmp_name"])){

		if(move_uploaded_file($_FILES["newLicense"]["tmp_name"],$filedir.$_FILES["newLicense"]["name"])){
		}else{
			$_SESSION['update_error'] = 'ファイルをアップデートできません';
			header("Location:" .$mypageUser_php);
			exit();
		}
	}else{
			$_SESSION['update_error'] = 'ファイルが選択されていません';
			header("Location:" .$mypageUser_php);
			exit();
	}

	require_once __DIR__ . '/../classes/user.php';
	$user = new User();
	$result = $user->updateUser($userId,$userName,$kana,$nickName,$zip,$address,$tel,$_SESSION['userId']);

	//ユーザー情報をセッションに保存する
	$_SESSION['userId'] = $userId;
	$_SESSION['userName'] = $userName;
	$_SESSION['kana'] = $kana;
	$_SESSION['nickName'] = $nickName;
	$_SESSION['zip'] = $zip;
	$_SESSION['address'] = $address;
	$_SESSION['license'] = $license;
	$_SESSION['tel'] = $tel;

	//ユーザーIDと名前をクッキーに保存する(期限は二週間)
	setcookie("userId",$userId,time() + 60*60*24*14,'/');
	setcookie("userName",$userName,time() + 60*60*24*14,'/');


	//更新した内容を表示
	require_once __DIR__ . '/mypage_user.php';