課題1:Challenge_dbへのエラーハンドリングを含んだ接続の確立を行ってください


<?php

try{$pdo_object = new PDO ('mysql:host = localhost = localhost;

  dbname = Challenge_db;charset = utf8','hayato','H@yato8810');
}

catch(PDOException $Exception)

  {

die ('接続に失敗しました;'.$Exception_>getMessage());

}

?>
