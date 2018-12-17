<?php
	require_once __DIR__ . '/../header.php';
	//セッションに保存されている情報を空にし、
	//クッキーに保存されているセッションIDも無効にし、セッションを破棄する
	$_SESSION = [];
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-1000,'/');
	}
	session_destroy();

	//ユーザーIDと名前のクッキー情報も破棄する
	setcookie('userId','',time()-1000,'/');
	setcookie('userName','',$userName,time()-1000,'/');

	//ジャンル選択画面に遷移する
	header("Location:" .$index_php);