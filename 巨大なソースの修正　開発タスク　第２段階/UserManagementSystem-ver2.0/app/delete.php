<?php

/*delete.php
result_detailで表示されていたレコードをまるまる削除する
対象のレコードの全データを表示したのちに、「このレコードを本当に削除しますか？」という質問があり、「はい」と「いいえ」が直リンクとして設置してある。「はい」ならdelete_result.phpへ、「いいえ」ならresult_detailに戻る
*/


require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';



// 直接アクセスの場合の処理（id情報が空の場合）
session_start();
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
      <title>削除確認画面</title>
</head>
  <body>
    <?php
    //登録者のレコードを連想配列として受け取り、格納する。
    //修正箇所　$_GET['id']→$idに変更
    $result = profile_detail($id);

    //エラーが発生しなければ表示を行う
    if(is_array($result)){
    ?>
    <h1>削除確認</h1>
    <!--修正箇所　<br>を追加-->
    以下の内容を削除します。よろしいですか？<br>
    名前:<?php echo $result[0]['name'];?><br>
    生年月日:<?php echo $result[0]['birthday'];?><br>
    種別:<?php echo ex_typenum($result[0]['type']);?><br>
    電話番号:<?php echo $result[0]['tell'];?><br>
    自己紹介:<?php echo $result[0]['comment'];?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>

    <form action="<?php echo DELETE_RESULT; ?>" method="POST">
      <input type="submit" name="YES" value="はい"style="width:100px">

      <!--修正箇所　delete.phpへIDのデータを渡すhiddenを追加する。-->
      　　<input type="hidden" name="id" value="<?php echo $id ?>">

    </form><br>

  <!-- 修正箇所　詳細画面に戻る処理を追加-->
    <form action="<?php echo RESULT_DETAIL; ?>" method="GET">
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
   </form>

    <?php
  }else{//エラーの場合の表示
        echo 'データの取得に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    echo return_top();
    ?>
   </body>
</html>
