<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','12345');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "insert into profiles values(5, '田中', '000-0000-0000', 27, '1987-06-21')";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $pdo = null;
?>
