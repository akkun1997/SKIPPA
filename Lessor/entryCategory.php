<?php
	require_once __DIR__ . '/../header.php';
?>

<p>どの場所を登録する？？？？</p>
<form method="POST">
  <table>
		<tr><th>郵便番号</th>
			<td><select name=entryplace></td></tr>
        <option value="room">民泊</option>
        <option value="parking">駐車場</option>
        <option value="garden">庭</option>
  </table>
</form>
  <?php
  	require_once __DIR__ . '/../footer.php';
  ?>
