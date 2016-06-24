課題8:検索用のフォームを用意し、名前の部分一致で検索＆表示する処理を構築してください。
同じページにリダイレクトするPOST処理と、POSTに値が入っているかの条件分岐を活用すれば、
一つの.phpで完了できますので、チャレンジしてみてください


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="challenge7_8.php" method="post">
    <input type="text" name="search">
    <input type="submit" value = '検索'>
  </form>

<?php
  if(isset($_POST['search'])){
    $search = $_POST['search'];
      if($search == NULL){
        echo '文字を入力してください';
        exit;
      }
  }else{
    exit;
  }
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','youhei','wuskck');
  }catch(PDOException $Exception){
        die('接続に失敗しました:' .$Exception -> getMessage());
  }
  $sql = "select * from profiles where name like '%$search%'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $result = $query -> fetchall(PDO::FETCH_ASSOC);
  var_dump($result);
?>
</body>
</html>
