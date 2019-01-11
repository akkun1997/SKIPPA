<?php
//現在アクセスしているユーザーのユーザーID($userid)とユーザー名($userName)を特定する
//セッションからもクッキーからも取得できなかった場合、仮のユーザーIDを発行する
//この場合、ユーザーIDは「8桁の乱数」、ユーザー名は「ゲスト」とする

//セッションが開始されていなければ開始する
if(!isset($_SESSION)){
	session_start();
}

//セッション情報としてユーザーID、名前が保持されているならそれを取得する
$userId = isset($_SESSION['userId']) ? $_SESSION['userId']:'';
$userName = isset($_SESSION['userName']) ? $_SESSION['userName']:'';
$kana = isset($_SESSION['kana']) ? $_SESSION['kana']:'';
$nickName = isset($_SESSION['nickName']) ? $_SESSION['nickName']:'';
$tel = isset($_SESSION['tel']) ? $_SESSION['tel']:'';
$zip = isset($_SESSION['zip']) ? $_SESSION['zip']:'';
$address = isset($_SESSION['address']) ? $_SESSION['address']:'';
$license = isset($_SESSION['license']) ? $_SESSION['license']:'';

//セッション情報にユーザーID、名前が保持されていない場合
if(empty($userId) || empty($userName) || empty($tel)){
	//クッキーにユーザーID、名前が保持されているなら、それを取得する
	if(isset($_COOKIE['userId']) && isset($_COOKIE['userName']) && isset($_COOKIE['tel'])){
		$uerId = $_COOKIE['userId'];
		$userName = $_COOKIE['userName'];
		$nickName = $_COOKIE['nickName'];
		$tel = $_COOKIE['tel'];
	}else{
		$userId = (string)mt_rand(10000000,99999999);
		$userName = 'ゲスト';
		$nickName = 'ゲスト';
		setcookie("userId",$userId,time() + 60*60*24*14,'/');
		setcookie("userName",$userName,time() + 60*60*24*14,'/');
	}

	//以上で決定したユーザーID、名前をセッション情報として保持する。
	$_SESSION['userId'] = $userId;
	$_SESSION['userName'] = $userName;
	$_SESSION['nickName'] = $nickName;
	$_SESSION['tel'] = $tel;
}

//ヘッダー、フッターで使用するリンクのFQDN作成の準備
$http_host = '//' . $_SERVER['SERVER_NAME'];

//ヘッダー、フッターで使用するリンクのURLを用意する
$index_php = $http_host.'/'.'SKIPPA/index.php';
$skippaInfo_php = $http_host . '/' . 'SKIPPA/Info/skippaInfo.php'; //SKIPPAについてのインフォ画面
$search_php = $http_host . '/' . 'SKIPPA/Lessee/search.php';//検索画面
$entryCategory_php = $http_host . '/' . 'SKIPPA/Lessor/entryCategory.php';//検索結果一覧画面
//物件登録画面
//物件詳細画面
//契約画面
$login_php = $http_host . '/' . 'SKIPPA/user/login.php';//ログイン画面
$logout_php = $http_host . '/' . 'SKIPPA/user/logout.php';//ログアウト画面
$signup_php = $http_host . '/' . 'SKIPPA/user/sign_up.php';
$mypage_php = $http_host . '/' . 'SKIPPA/mypage/mypage.php';
$mypageUser_php = $http_host . '/' . 'SKIPPA/mypage/mypage_user.php';
//CSSファイルを用意する
$skippa_css = $http_host . '/' . 'SKIPPA/css/skippa.css';
