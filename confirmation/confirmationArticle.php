<?php

function h($data){
  return htmlspecialchars($data,ENT_QUOTES,"UTF-8");
}


	require_once __DIR__ . '/../header.php';
?>
<?php
  <table>
    <tr><th>郵便番号</th>
        <td>h($_POST['zip'])</td></tr>

  </table>
  ?>
