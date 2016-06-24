課題11:profileIDで指定したレコードの、profileID以外の要素をすべて上書きできるフォームを作成してください



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="challenge7_11.php" method="post">
    profilesID:<input type="text" name="id"><br>
    名前:<input type="text" name="name">
    電話番号:<input type="text" name="tell">
    年齢:<input type="text" name="age">
    生年月日:<input type="text" name="birthday">
        <input type="submit" value="更新">
  </form>

<?php
  if(isset($_POST['id'],$_POST['name'],$_POST['tell'],$_POST['age'],$_POST['birthday'])){
      $id = $_POST['id'];
      $name = $_POST['name'];
      $tell = $_POST['tell'];
      $age = $_POST['age'];
      $birthday = $_POST['birthday'];
  }else{

    exit;
  }
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "update profiles set name = '$name', tell ='$tell', age = '$age', birthday = '$birthday' where profilesID = $id";
  $query = $pdo -> prepare($sql);
  $query -> execute();
?>
</body>
</html>
