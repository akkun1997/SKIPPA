<?php
	// スーパークラスであるDbDataを利用するため
  	require_once __DIR__ . '/dbdata.php';

  	class User extends DbData{
  		//ログイン認証
  		public function authUser($userId,$password){
  			$sql = "select * from users where userId=? and password=?";
  			$stmt = $this->query($sql, [$userId,$password]);
  			return $stmt->fetch();
  		}

      //ユーザー登録処理
      public function signUp($userId,$userName,$kana,$zip,$address,$tel,$password,$tempId){
          $sql = "select * from users where userId=?";
          $stmt = $this->query($sql,[$userId]);
          $result = $stmt->fetch();
          //登録しようとしているユーザーID(Eメール)がすでに登録されているなら
          if($result['userId']){
            return 'この'.$userId.'は既に登録されています。';
          }
          $sql = "insert into users(userId,userName,kana,zip,address,tel,password) values(?,?,?,?,?,?,?)";
          $result = $this->exec($sql, [$userId,$userName,$kana,$zip,$address,$tel,$password]);

          if($result){
            //登録に成功した場合、cart内に保存されている商品があれば登録したユーザーIDに変更する(ログイン時と同じ処理)
            $this->changeCartUserId($tempId,$userId);
            return "";
          }else{
            //失敗した場合
            return '新規登録できませんでした。管理者にお問い合わせください。';
          }
      }

      public function updateUser($userId,$userName,$kana,$zip,$address,$tel,$password,$tempId){
          $sql = "update users set userId=?,userName=?,kana=?,zip=?,address=?,tel=?,password=? where userId=?";
          $result=$this->exec($sql,[$userId,$userName,$kana,$zip,$address,$tel,$password,$tempId]);

          /*if($result){
            //更新に成功したが、Cart内に仮のユーザーIDの商品が入っていた場合、新しいユーザーIDに置き換えるまた、過去の注文履歴のユーザーIDも新しいものに置き換える
            if($userId != $tempId){
              $this->changeCartUserId($tempId,$userId);
              $this->changeOrderHistoryUserId($tempId,$userId);
            }
            return "";
          }else{
            return 'ユーザー情報の更新ができませんでした。管理者にお問い合わせください';
          }*/
      }

      /*ユーザーIDを変更した場合、過去の注文履歴のユーザーIDを新しいものに変更する
      public function changeOrderHistoryUserId($tempId,$userId){
        //Orderオブジェクトを生成し、注文履歴のユーザーIDを変更する
        require_once __DIR__ .'/order.php';
        $order = new Order();
        $order->changeUserId($tempId,$userId);
      }*/
  	}