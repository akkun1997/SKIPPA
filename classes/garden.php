<?php
	// スーパークラスであるDbDataを利用するため
  	require_once __DIR__ . '/DBdata.php';
  	class Garden extends DbData{
  		//ログイン認証
  	/*	public function authUser($userId,$password){
  			$sql = "select * from users where userId=? and password=?";
  			$stmt = $this->query($sql, [$userId,$password]);
  			return $stmt->fetch();
  		}*/
      //庭登録処理
      public function gardenUp($userId,$zip,$address,$startPeriod,$lastPeriod,$kane,$purpose,$gazou){
          $sql = "select * from garden where address=?";
          $stmt = $this->query($sql,[$address]);
          $result = $stmt->fetch();
          //登録しようとしているユーザーID(Eメール)がすでに登録されているなら
          if($result['address']){
            return 'この住所は既に登録されています。';
          }
          $sql = "insert into garden(userId,zip,address,startPeriod,endPeriod,price,image,purpose) values(?,?,?,?,?,?,?,?)";
          $result = $this->exec($sql, [$userId,$zip,$address,$startPeriod,$lastPeriod,$kane,$gazou,$purpose]);
          if($result){

            return '';
          }else{
            //失敗した場合
            return '庭登録できませんでした。管理者にお問い合わせください。';

          }
      }
      public function updategarden($userId,$zip,$address,$startPeriod,$lastPeriod,$kane,$purpose,$gazou){
          $sql = "update garden set userId=?,zip=?,address=?,startPeriod=?,endPeriod=?,price=?,purpose=?,image=? where userId=?";
          $result=$this->exec($sql,[$userId,$zip,$address,$startPeriod,$lastPeriod,$kane,$purpose,$gazou]);

      }

      }


      ?>
