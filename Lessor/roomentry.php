<?php
session_start();

if($_SESSION['userName']==="ゲスト"){
	header('Location:../user/login.php');
	exit();
}
?>

<?php
	require_once __DIR__ . '/../header.php';

?>

	<p>民泊で登録中です</p>
	<form method="POST" action="./roomEntry_db.php" >
	<table>
		<tr><td>目的</td><td><select name="purpose" >
											<option name="purpose" value="1">民泊</option>
											<option name="purpose" value="2">短時間</option>
		<tr><td>郵便番号</td><td><input type="text" name="zip" ></td></tr>
		<tr><td>住所</td><td><input type="text" name="address" ></td></tr>
		<tr><td>貸す範囲</td><td><select name="lessorcate" >		
											<option name="lessorcate" value="1">部屋のみ</option>
											<option name="lessorcate" value="2">家全体</option>
											</select></td></tr>
		<tr><td>料金(一日辺り)</td><td><input type="text" name="kane"></td></tr>
		<tr><td>貸出期間</td><td><input type="date" name="rental" max="9999-12-31"></td></tr>
		<tr><td>写真登録</td><td><input type="file" >
		<div class="preview" />


<script language="JavaScript">
// documentと毎回書くのがだるいので$に置き換え
var $ = document; 
var $form = $.querySelector('form');// jQueryの $("form")相当

//jQueryの$(function() { 相当(ただし厳密には違う)
$.addEventListener('DOMContentLoaded', function() {
    //画像ファイルプレビュー表示
    //  jQueryの $('input[type="file"]')相当
    // addEventListenerは on("change", function(e){}) 相当
    $.querySelector('input[type="file"]').addEventListener('change', function(e) {
        var file = e.target.files[0],
               reader = new FileReader(),
               $preview =  $.querySelector(".preview"), // jQueryの $(".preview")相当
               t = this;

        // 画像ファイル以外の場合は何もしない
        if(file.type.indexOf("image") < 0){
          return false;
        }

        reader.onload = (function(file) {
          return function(e) {
             //jQueryの$preview.empty(); 相当
             while ($preview.firstChild) $preview.removeChild($preview.firstChild);

            // imgタグを作成
            var img = document.createElement( 'img' );
            img.setAttribute('src',  e.target.result);
            img.setAttribute('width', '150px');
            img.setAttribute('title',  file.name);
            // imgタグを$previeの中に追加
            $preview.appendChild(img);
          }; 
        })(file);

        reader.readAsDataURL(file);
    }); 
});
</script>

</form>
</table>

  
