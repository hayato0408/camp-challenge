<?php
/*insert_result.php

プロフィール用のDBに値を挿入。この際、現在時(年日時分)を組み込み関数で取得し、追加。
「以上の内容で登録しました。」とinsert_confirmのようにフォームで入力された値を表示
接続に失敗したときの表示などもカバーすること*/
?>

<?php require_once '../common2/scriptUtil.php'; ?>
<?php require_once '../common2/dbaccesUtil.php'; ?>

<?php

// 課題5:insert_result.phpにて、直接リンクしてアクセスしてしまった際のエラー処理が存在しない。これを、insert_confirmからのhiddenされたフォームによるPOSTを利用して実現しなさい
//  直接リンクしてアクセスされた場合のための$_POST['access']が空ならトップページに戻る処理。
session_start();
if(!isset($_POST['access'])){
  echo "エラー<br>";
  echo "トップ画面に戻ります。";
  echo '<meta http-equiv="refresh" content="3;URL='.ROOT_URL.'">';
  exit;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

    <?php
    session_start();
    $name = $_SESSION['name'];
    $birthday = $_SESSION['birthday'];
    $type = $_SESSION['type'];
    $tell = $_SESSION['tell'];
    $comment = $_SESSION['comment'];

    //6.insert_result.phpにて、SQLを実行した際に現在時刻が正しい型で格納されない。これを修正しなさい
    $date = date("Y-m-d H:i:s");


//7.データベースアクセス系の処理をdbaccesUtil.phpに切り離しなさい
    // データベースに接続し、データを登録する
    db_access();


    ?>

    <h1>登録結果画面</h1><br>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    種別:<?php echo $type?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br>
    以上の内容で登録しました。<br>


    <?php echo return_top(); ?>

</body>

</html>
