<?php
	require_once __DIR__ . '/../header.php';
?>
	
	<p>検索画面</p>
	<form method="POST">
	<table>
		<tr><th>場所</th>
			<td><input type = "text" name = "area"></td></tr>
		<tr><th>価　格</th>
			<td><select name="price">
        		<option value="1">~2000</option>
        		<option value="2">2000~5000</option>
        		<option value="3">5000~10000</option>
        		<option value="3">10000~</option>
    	</select></td></tr>
		<tr><th>目的</th>
    	<td><select name="purpose">
        		<option value="1">宿泊</option>
        		<option value="2">駐車場</option>
        		<option value="3">短時間</option>	
    	</select></td></tr>
		<tr><th colspan="2"><input type="submit" value="検索"></th></tr>
	</table>
	</form>

<?php
	require_once __DIR__ . '/../footer.php';
?>