<?php
	//エスケープ処理
	function h($data){
		return htmlspecialchars($data,ENT_QUOTES,"UTF-8");
	}

	//送られてきたユーザIDとパスワードを受け取り、エスケープ処理を行う
	$userId = h($_POST['userId']);
	$password = h($_POST['password']);

	//Userオブジェクトを生成し、認証処理を行う
	require_once __DIR__ . '/../classes/user.php';
	$user = new User();
	$result = $user->authUser($userId,$password);

	session_start();
	//ログインに失敗した場合、エラーメッセージをセッションに保存し、ログイン画面委遷移する
	if(empty($result['userId'])){
		$_SESSION['login_error'] = 'ユーザーID、パスワードを確認してください。';
		header("Location:login.php");
		exit();
	}

	//データベースから名前を取り出す
	$userName = $result['userName'];

	//cartテーブルに仮のuserIdで保存された商品があれば正式なログインユーザーのuserIdに変更する
	//$user->changeCartUserId($_SESSION['userId'],$userId);

	//ユーザー情報をセッションに保存する
	$_SESSION['userId'] = $userId;
	$_SESSION['userName'] = $userName;
	$_SESSION['kana'] = $result['kana'];
	$_SESSION['nickName'] = $result['nickName'];
	$_SESSION['zip'] = $result['zip'];
	$_SESSION['address'] = $result['address'];
	$_SESSION['tel'] = $result['tel'];

	//ユーザーIDと名前をクッキーに保存する(有効期限は2週間)
	setcookie("userId",$userId,time() + 60*60*24*14,'/');
	setcookie("userName",$userName,time() + 60*60*24*14,'/');

	require_once __DIR__ . '/../header.php';
?>
	<p>こんにちは、<?= $userName ?>さん。</p>
	<p>ショッピングをお楽しみください。</p>
	<?php
		header('Location:' .$index_php);
	?>