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
<script>
function screenChange(){
	cateselect = document.pullform.entryplace.selectedIndex;
	location.href=document.pullform.entryplace.options[cateselect].value;
}
</script>
<p>どの場所を登録する？？？？</p>
<form name="pullform">
  <table>
    <tr><th>場所</th>
			<td><select name=entryplace>
        <option name="entryplace" value="roomentry.php">民泊</option>
        <option name="entryplace" value="parkingentry.php">駐車場</option>
        <option name="entryplace" value="gardenEntry.php">庭</option>
      </td></tr></select>
  </table>
  <br><input type="button" value="決定" onclick="screenChange()">
</form>
  <?php
  	require_once __DIR__ . '/../footer.php';
  ?>
