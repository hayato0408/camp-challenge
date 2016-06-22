課題5：nameに「茂」を含む情報を取得し、画面に取得した情報を表示してください

<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "select * from profiles where name like '%茂%'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $result = $query -> fetchall(PDO::FETCH_ASSOC);
  foreach ($result as $key => $value) {
    foreach ($value as $key => $value2) {
      echo $key.':'.$value2.'<br>';
    }
  }
?>
