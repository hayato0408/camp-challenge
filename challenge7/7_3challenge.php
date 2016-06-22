課題3:前回の課題1で作成したテーブルからSELECT*により全件取得し、画面に取得した全情報を表示してください

<?php

try{
  $pdo = new PDO('mysql:host = localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
}catch(PDOException $Exception){
  die('接続に失敗しました:' .$Exception-> getMessage());
}


  $sql = "select * from profiles";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $result = $query -> fetchall(PDO::FETCH_ASSOC);
  var_dump($result);
  $pdo = null;

?>
