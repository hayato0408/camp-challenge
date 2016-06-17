２．以下の機能を実装してください。
　　　１で作成したHTMLの入力データを取得し、画面に表示する



<?php
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $hobby = $_POST['hobby'];
  echo '名前:'.$name.'<br>';
  echo '性別:'.$gender.'<br>';
  echo '趣味:'.$hobby;
?>
