<?php
	require_once __DIR__ . '/../header.php';
?>
	
	<p>物件登録</p>
	<form method="POST">
	<table>
		<tr><th>郵便番号</th>
			<td><input type = "text" name = "zip"></td></tr>
		<tr><th>住　所</th>
			<td><input type = "text" name = "address"></td></tr>
		<tr><th>価　格</th>
			<td><input type = "text" name = "price"></td></tr>
		<tr><th>目　的</th>
    	<td><input type = "text" name = "purpose"></td></tr>
    	<tr><th>期　間</th>
			<td><select name="startPeriod">
    		<?php
    			for($i=1; $i<=31; $i++){
       				echo '<option value="1' . $i . '">12/'. $i . '</option>';
      			}
    		?>
    		</select>~
    		<select name="lastPeriod">
    		<?php
    			for($i=1; $i<=30; $i++){
       				echo '<option value="' . $i . '">1/'. $i . '</option>';
      			}
    		?>
    		</select></td></tr>
    	<tr><th>写真</th>
    	<td><input type = "text" name = "purpose"></td></tr>
		<tr><th colspan="2"><input type="submit" value="登録する"></th></tr>
	</table>
	</form>
<?php
	require_once __DIR__ . '/../footer.php';
?>