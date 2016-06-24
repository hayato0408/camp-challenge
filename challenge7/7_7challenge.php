課題7:profileID=1のnameを「松岡 修造」に、ageを48に、birthdayを1967-11-06に更新してください

<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "update profiles set name = '松岡修造', age = 48, birthday = '1976-11-06' where profilesID = 1";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $pdo = null;
?>
