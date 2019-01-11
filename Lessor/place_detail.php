<?php
  require_once __DIR__ .'/../header.php';
?>
<!DOCTYPE  html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>詳細表示</title>
<link rel="stylesheet" href="../css/skippa.css">
</head>
<body>
  <p class="float"><img src="../images/kobedenshi.png" width="259" height="269" alt="写真"></p>
<table>
<tr><th>価　格</th>
<td>&yen;<?= number_format(5000) ?></td></tr>
<tr><th>使用可能期間</th>
<td>2019/03/09 12:00 ~ 2019/03/11 15:00</td></tr>
<tr><th>郵便番号</th>
<td>663-9090</td></tr>
<tr><th>住所</th>
<td>兵庫県のどっか</td></tr>
<tr><th>TEL</th>
<td>080-9999-9999</td></tr>
<tr><th>コメント</th>
<td>立地がわるいよ</td></tr>
</table>
</form>
<a href="product_select.php?genre=<?= $item['genre'] ?>"><span class="button_image">ジャンル別商品一覧に戻る</span></a>
<br><br>
<table>
<tr><th>よかった</th>
  <td>神戸　太郎<br>★★★★☆</td></tr>
  <tr><td colspan="2">自作動画の撮影のために使いましたが、色んな教室があり<br>様々なシーンを撮影出来た。坂道がしんどいです</td></tr>
</table>
<?php 
    require_once __DIR__ .'/../footer.php';
 ?>