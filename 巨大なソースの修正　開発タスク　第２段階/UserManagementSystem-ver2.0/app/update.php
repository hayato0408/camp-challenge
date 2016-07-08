<?php
session_start();
/*update.php
フォームから入力するデータで既にあるデ.ータを更新できる
画面構成はinsert.phpと同じ。ただし初めはresult_detail.phpから個人のデータを受け取り、フォーム内に直接記入された状態である。このフォームの内容を書き換えていくことでデータの更新ができる
送信ボタン、詳細画面へ戻るボタン付き*/



require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';


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
      <title>変更入力画面</title>
</head>
<body>

  <?php


      // 登録者のレコードを連想配列として受け取り格納
      //修正箇所　$_GET['id']→$idに修正
      $result = profile_detail($id);

      //修正箇所 更新前の情報を変数に格納する
      $ini_name     = $result[0]['name'];
      $ini_birthday = $result[0]['birthday'];
      $ini_type     = $result[0]['type'];
      $ini_tell     = $result[0]['tell'];
      $ini_comment  = $result[0]['comment'];

      $ini_birthday2   = explode('-', $ini_birthday);
      $ini_year     = $ini_birthday2[0];
      $ini_month    = $ini_birthday2[1];
      $ini_day      = $ini_birthday2[2];

  ?>

    <form action="<?php echo UPDATE_RESULT ?>" method="POST">
    <?php
    //修正箇所　登録者のレコードを連想配列として受け取り格納
    //修正箇所 $_GET['id']→$idに修正
      $result = profile_detail($id);
    ?>
    名前:
    <input type="text" name="ud_name" value="<?php echo $ini_name ?>">
    <br><br>

    生年月日:　
    <select name="ud_year">
        <option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>

<!--.再度入力する際に、値が保持されている状態にする。-->
        <option value="<?php echo $i;?>" <?php if($i==$ini_year){echo "selected";}?>><?php echo $i;?></option>

        <?php } ?>

    </select>年
    <select name="ud_month">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>

  <!--再度入力する際に、値が保持されている状態にする-->
        <option value="<?php echo $i;?>"<?php if($i==$ini_month){echo "selected";}?>><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="ud_day">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"<?php if($i==$ini_day){echo "selected";}?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for($i = 1; $i<=3; $i++){ ?>


    <input type="radio" name="ud_type" value="<?php echo $i; ?>"<?php if($i==$ini_type){echo "checked";}?>><?php echo ex_typenum($i);?><br>
    <?php }?>
    <br>

    電話番号:
    <input type="text" name="ud_tell" value="<?php echo $ini_tell ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="ud_comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $ini_comment ?></textarea><br><br>


    <!-- 修正箇所 変更結果画面への不正アクセス対策＆値を渡すため、hiddenで$idの値を送信 -->
       <input type="hidden" name="id" value="<?php echo $id; ?>">

     <!--修正箇所　更新前の値を送る-->
       <input type="hidden" name="name" value="<?php echo $ini_name; ?>">
       <input type="hidden" name="year" value="<?php echo $ini_year; ?>">
       <input type="hidden" name="month" value="<?php echo $ini_month;?>">
       <inrut type="hiddem" name="day" value="<?php echo $ini_day;?>">
       <input type="hidden" name="type" value="<?php echo $ini_type; ?>">
       <input type="hidden" name="tell" value="<?php echo $ini_tell; ?>">
       <input type="hidden" name="comment" value="<?php echo $ini_comment; ?>">



    <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    </form>
    <form action="<?php echo RESULT_DETAIL; ?>" method="GET">
      <!--修正箇所　詳細画面へIDのデータを渡すhiddenを追加する。-->
        <input type="hidden" name="id" value="<?php echo $id ?>">
       <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    </form>
    <?php echo return_top(); ?>
</body>

</html>
