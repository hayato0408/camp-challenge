<?php
session_start();

/*update_result.php
IDなどを受け取り、DBに値を挿入。現在時(年日時分)を組み込み関数で取得し、更新。
「以上の内容で更新しました。」と、フォームで入力された値を表示
詳細画面へ戻るボタン付き
接続に失敗したときの表示などもカバーすること*/



require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';


// 修正箇所　直接アクセスしてきた場合の処理
if(!isset($_POST['id'])){
  echo 'もう一度トップページからやり直してください。<br>';
}elseif($_POST['id'] !== $_SESSION['id']){
  echo 'もう一度トップページからやり直してください。<br>';
}else{
  $id = $_POST['id'];

}
//修正箇所　更新画面でラジオボタンに値が入っていない場合の処理。
if(!isset($_POST['ud_type'])){
  $ud_type = null;
}else{$ud_type = $_POST['ud_type'];

}

// 修正箇所　更新後の値をセッションに格納する

$_SESSION['ud_name']     =  $_POST['ud_name'];
$_SESSION['ud_year']     =  $_POST['ud_year'];
$_SESSION['ud_month']    =  $_POST['ud_month'];
$_SESSION['ud_day']      =  $_POST['ud_day'];
$_SESSION['ud_type']     =  $_POST['ud_type'];
$_SESSION['ud_tell']     =  $_POST['ud_tell'];
$_SESSION['ud_comment']  =  $_POST['ud_comment'];


//修正箇所　更新後のセンション情報を変数に格納する。

$ud_name    =  $_SESSION['ud_name'] ;
$ud_year    =  $_SESSION['ud_year'] ;
$ud_month   =  $_SESSION['ud_month'] ;
$ud_day     =  $_SESSION['ud_day'] ;
$ud_type    =  $_SESSION['ud_type'] ;
$ud_tell    =  $_SESSION['ud_tell'] ;
$ud_comment =  $_SESSION['ud_comment'];


// 修正箇所　更新した値があればその値を入れる、更新した値がなければ更新前の値を変数に格納する

$ud_name    = isset($ud_name) ? $ud_name : $ini_name;
$ud_year    = isset($ud_year)? $ud_year : $ini_year;
$ud_month   = isset($ud_month) ? $ud_month : $ini_month;
$ud_day     = isset($ud_day) ? $ud_day : $ini_day;
$ud_type    = isset($ud_type) ? $ud_type : $ini_type;
$ud_tell    = isset($ud_tell) ? $ud_tell : $ini_tell;
$ud_comment = isset($ud_comment) ? $ud_comment : $ini_comment;


$ud_birthday = "$ud_year-$ud_month-$ud_day" ;


//修正箇所 dbaccesUtillで定義したdateTime型の関数で現在時を取得。
$ud_date = current_time();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php


//修正箇所　update_profile();の引数を$_GET['id']→$id, $ud_name, $ud_birthday, $ud_type, $ud_tell, $ud_commentに変更。
    $result = update_profile($id, $ud_name, $ud_birthday, $ud_type, $ud_tell, $ud_comment,$ud_date);




    //エラーが発生しなければ表示を行う
    if(!isset($result)){
    ?>
    <h1>更新確認</h1>
    以上の内容で更新しました。<br>
    <?php
    }else{
        echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }

    echo return_top();
    ?>
  </body>
</html>
