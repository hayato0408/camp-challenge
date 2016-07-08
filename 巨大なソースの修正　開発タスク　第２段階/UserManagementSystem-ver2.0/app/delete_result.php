<?php
session_start();
/*
delete_result.php
ここにアクセスした段階で、IDによる削除が実行される
「削除しましたという一文が表示される
失敗したときの表示などもカバーすること
検索結果画面に戻るボタン付き
*/

require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>

<?php
// 直接アクセスしてきた場合の処理
if(!isset($_POST['id'])){
  echo 'もう一度トップページからやり直してください。<br>';
}elseif($_POST['id'] !== $_SESSION['id']){
  echo 'もう一度トップページからやり直してください。<br>';
}else{
  $id = $_POST['id'];
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php

    //修正箇所  $_GET['id']→$idに修正
    $result = delete_profile($id);

    //エラーが発生しなければ表示を行う
    if(!isset($result)){
    ?>
    <h1>削除確認</h1>
    削除しました。<br>
    <?php
    }else{
        echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    echo return_top();
    ?>
   </body>
</body>
</html>
