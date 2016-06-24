課題10:profileIDで指定したレコードを削除できるフォームを作成してください

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="challenge7_10.php" method="post">
    profilesID:<input type="text" name="id">
       <input type="submit" value="削除">
  </form>

<?php
  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }else{
    exit;
  }
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "delete from profiles where profilesID = $id";
  $query = $pdo -> prepare($sql);
  $query -> execute();
?>
</body>
</html>
