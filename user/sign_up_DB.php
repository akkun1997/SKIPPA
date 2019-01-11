<?php
	//エスケープ処理関数
	function h($data){
		return htmlspecialchars($data,ENT_QUOTES,"UTF-8");
	}

	require_once __DIR__ . '/../header.php';

	//データ受け取りとエスケープ処理
	$userId = h($_POST['userId']);
	$userName = h($_POST['userName']);
	$kana = h($_POST['kana']);
	$nickName = h($_POST['nickName']);
	$zip = h($_POST['zip']);
	$address = h($_POST['address']);
	$tel = h($_POST['tel']);
	$license = h($_POST['license']);
	$password = h($_POST['password']);

	//セッションが開始されていなければ開始する
	if(!isset($_SESSION)){
		session_start();
	}

	//バリデーションはメアドと郵便番号のみとする
	//メアドのバリデーションはfilter_var()を使い、RFCに準拠しないメアドはエラーとする
	if(!filter_var($userId,FILTER_VALIDATE_EMAIL)){
		$_SESSION['signup_error'] = '正しいメールアドレスを入力して下さい';
		header("Location:" .$signup_php);
		exit();
	}

	//郵便番号は半角数字の7桁かどうかのチェック
	if(!is_numeric($zip) || strlen($zip) != 7){
		$_SESSION['signup_error'] = '正しい郵便番号を入力して下さい';
		header("Location:" .$signup_php);
		exit();	
	}

	//Userオブジェクトを生成し、ユーザー登録処理を行うsignUp()メソッドを呼び出し、結果を受け取る
	require_once __DIR__ . '/../classes/user.php';
	$user = new User();
	$result = $user->signUp($userId,$userName,$kana,$nickName,$zip,$address,$tel,$license,$password,$_SESSION['userId']);

	//登録に失敗した場合は、エラーメッセージをセッションに保存し、signup.phpに遷移する
	if($result !== ""){
		$_SESSION['signup_error'] = $result;
		sleep(3);
		header("Location:" .$signup_php);
		exit();
	}


	//ユーザー情報をセッションに保存する
	$_SESSION['userId'] = $userId;
	$_SESSION['userName'] = $userName;
	$_SESSION['kana'] = $kana;
	$_SESSION['nickName'] = $nickName;
	$_SESSION['zip'] = $zip;
	$_SESSION['address'] = $address;
	$_SESSION['tel'] = $tel;
	$_SESSION['license'] = $license;

	//ユーザーIDと名前をクッキーに保存する(期限は二週間)
	setcookie("userId",$userId,time() + 60*60*24*14,'/');
	setcookie("userName",$userName,time() + 60*60*24*14,'/');

?>

ユーザー情報を登録・更新しました。<br>
<table>
	<tr><td>Eメール</td><td><?= $userId ?></td></tr>
	<tr><td>名前</td><td><?= $userName ?></td></tr>
	<tr><td>フリガナ</td><td><?= $kana ?></td></tr>
	<tr><td>ニックネーム</td><td><?= $nickName ?></td></tr>
	<tr><td>郵便番号</td><td><?= mb_substr($zip,0,3) ?>-<?= mb_substr($zip,3,6) ?></td></tr>
	<tr><td>住所</td><td><?= $address ?></td></tr>
	<tr><td>電話番号</td><td><?= $tel ?></td></tr>
</table>
<?php
	header('Location:' .$index_php);
?>