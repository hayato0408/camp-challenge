課題4:前回の課題1で作成したテーブルからprofileID=1の情報を取得し、画面に取得した情報を表示してください



<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','youhei','wuskck');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "select * from profiles";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $result = $query -> fetchall(PDO::FETCH_ASSOC);
  foreach ($result as $key => $value) {
    foreach ($value as $key => $value2) {
      if($value2 == 1){
        $result = $value;
      }
    }
  }
  foreach ($result as $key => $value) {
    echo $key.':'.$value.'<br>';
  }
?>
