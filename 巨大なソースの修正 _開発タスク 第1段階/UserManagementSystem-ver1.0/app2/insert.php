<?php

/*
insert.php

プロフィールを入力できるフォームを設置
設置するフォームは以下の通り
名前
生年月日(1950~2010年までのプルダウン選択式。月、日も)
種別(エンジニアか、営業かをラジオボタンで選択)
電話番号
自己紹介
送信ボタン付き
insert_confimから戻ってきた場合、フォームや選択ボタンは入力済みになる
送信ボタン押下後はinsert_confirm.phpへとデータを渡しながら(SESSIONに再度格納)遷移
*/


      require_once '../common2/defineUtil.php';
      require_once '../common2/scriptUtil.php';
      session_start();


  // 課題4;再度入力する際に、このままではフォームに値が保持されていない。適切な処理を施して、再度入力の際にはフォームに値を保持したままにさせなさい


      //セッションに何も入っていないときのために!issetを使う。
      if(!isset($_SESSION['name'])){
        $_SESSION['name'] = null;
      }
      if(!isset($_SESSION['year'])){
        $_SESSION['year'] = '----';
      }
      if(!isset($_SESSION['month'])){
        $_SESSION['month'] = '--';
      }
      if(!isset($_SESSION['day'])){
        $_SESSION['day'] = '--';
      }
      if(!isset($_SESSION['type'])){
        $_SESSION['type'] = null;
      }
      if(!isset($_SESSION['tell'])){
        $_SESSION['tell'] = null;
      }
      if(!isset($_SESSION['comment'])){
        $_SESSION['comment'] = null;
      }

      $checked =  null;
      $checked2 = null;
      $checked3 = null;
      if($_SESSION['type'] == "エンジニア"){
            $checked = 'checked';
      }elseif($_SESSION['type'] == "営業"){
            $checked2 = 'checked';
      }elseif($_SESSION['type'] == "その他"){
            $checked3 = 'checked';
      }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>

    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <!--課題４:値を$_SESSIONに保持する。-->
    <input type="text" name="name" value="<?php echo $_SESSION['name']?>">
    <br><br>
    生年月日:
    <select name="year">
  <!--課題４:値を$_SESSIONに保持する。-->
        <option value="<?php echo $_SESSION['year']?>"><?php echo $_SESSION['year']?></option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
    <!--課題４:値を$_SESSIONに保持する-->
        <option value="<?php echo $_SESSION['month']?>"><?php echo $_SESSION['month']?></option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
  <!--  //課題４:値を$_SESSIONに保持する。-->
        <option value="<?php echo $_SESSION['day']?>"><?php echo $_SESSION['day']?></option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>
    種別:
    <br>
    <!--課題４：値を$_SESSIONに保持する。-->
    <input type="radio" name="type" value="エンジニア" <?php echo $checked ?>>エンジニア<br>
    <input type="radio" name="type" value="営業" <?php echo $checked2 ?>>営業<br>
    <input type="radio" name="type" value="その他" <?php echo $checked3 ?>>その他<br>
    <br>
    電話番号:
    <!--課題４:値を$_SESSIONに保持する。-->
    <input type="text" name="tell" value="<?php echo $_SESSION['tell']?>">
    <br><br>
    自己紹介文
    <br>
    <!--課題４:値を$_SESSIONに保持する。-->
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard" value="<?php echo $_SESSION['comment'];?>"><?php echo $_SESSION['comment'];?></textarea><br><br>
    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>


    <!--課題1:トップページへ戻るために定義済みの関数を利用する。-->
    <br><?php echo return_top();?>

?>
</body>
</html>
