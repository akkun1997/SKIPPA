<?php
	// スーパークラスであるDbDataを利用するため
  	require_once __DIR__ . '/DBdata.php';
  	class Garden extends DbData{

      //物件登録処理
      public function gardenUp($userId,$zip,$address,$startPeriod,$endPeriod,$price,$image,$purpose){
          $sql = "select * from garden where address=?";
          $stmt = $this->query($sql,[$address]);
          $result = $stmt->fetch();
          //登録しようとしているユーザーID(Eメール)がすでに登録されているなら
          if($result['address']){
            return 'この'.$address.'は既に登録されています。';
          }
          $sql = "insert into garden(userId,zip,address,startPeriod,endPeriod,price,image,purpose) values(?,?,?,?,?,?,?,?)";
          $result = $this->exec($sql, [$userId,$zip,$address,$startPeriod,$endPeriod,$price,$image,$purpose]);
          if($result){

            return "";
          }else{
            //失敗した場合
            return '新規登録できませんでした。管理者にお問い合わせください。';
          }
      }
      public function updateGarden($userId,$zip,$address,$startPeriod,$endPeriod,$price,$image,$purpose){
          $sql = "update users set userId=?,zip=?,address=?,startPeriod=?,endPeriod=?,price=?,image=?,purpose=? where userId=?";
          $result=$this->exec($sql,[$userId,$zip,$address,$startPeriod,$endPeriod,$price,$image,$purpose]);

      }

  	}
    ?>
