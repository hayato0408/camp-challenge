課題9:フォームからデータを挿入できる処理を構築してください。


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="challenge7_9.php" method="post">
    名前:<input type="text" name="name">
    電話番号:<input type="text" name="tell">
    年齢:<input type="text" name="age">
    生年月日:<input type="text" name="birthday">
    <input type="submit">
  </form>

<?php
  if(isset($_POST['name'],$_POST['tell'],$_POST['age'],$_POST['birthday'])){
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
  $sql = "insert into profiles(name, tell, age, birthday) values('$name', '$tell', $age, '$birthday')";
  $query = $pdo -> prepare($sql);
  $query -> execute();
?>
</body>
</html>
