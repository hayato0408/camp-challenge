課題6:課題2でINSERTしたレコードを指定して削除してください。SELECT*で結果を表示してください


<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql  = "delete from profiles where profilesID = 5";
  $sql2 = "select * from profiles";
  $query  = $pdo -> prepare($sql);
  $query2 = $pdo -> prepare($sql2);
  $query  -> execute();
  $query2 -> execute();
  $result  = $query  -> fetchall(PDO::FETCH_ASSOC);
  $result2 = $query2 -> fetchall(PDO::FETCH_ASSOC);
  $pdo = null;
?>
