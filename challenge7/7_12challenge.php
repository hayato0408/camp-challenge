課題12:検索用のフォームを用意し、名前、年齢、誕生日を使った複合検索ができるようにしてください。




<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="challenge7_12.php" method="post">
    名前:　<input type="text" name="name"><br>
    年齢:　<input type="text" name="age"><br>
    誕生日:<input type="text" name="birthday"><br>
    <input type="submit" value="検索">
  </form>

<?php
  if(isset($_POST['name'], $_POST['age'], $_POST['birthday']) == false){
    exit;
  }
  elseif($_POST['name'] == "" && $_POST['age'] == "" && $_POST['birthday'] ==""){
    exit;
  }else{
  $name = $_POST['name'];
  $age = $_POST['age'];
  $birthday = $_POST['birthday'];
  }
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "select * from profiles where name like '%$name%' AND age like '%$age%' AND birthday like '%$birthday%' ";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $result = $query -> fetchall(PDO::FETCH_ASSOC);
  var_dump($result);
?>
</body>
</html>
