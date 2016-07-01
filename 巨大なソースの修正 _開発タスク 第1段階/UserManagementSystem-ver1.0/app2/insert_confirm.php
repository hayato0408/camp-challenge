<?php
/*
insert_confirm.php

フォームで入力された文字や選択を表示し、「上記の内容で登録いたします。よろしいですか？」と表示。
「はい」でinsert_resultに遷移「いいえ」でinsertに値を保持したまま(戻った時にフォーム入力済みになっている)遷移。
もし不足していた場合はどの項目のデータが不足しているのかを表示。insertに値を保持したまま遷移するリンクを表示*/


    //課題２：insert_confirm.phpにて生年月日の入力がされていない(年月日が「----」のままでも処理を通過してしまう)時にも正しく判定されるようにしなさい

    //　!empty($_POST['comment'])の後にctype_digit()（文字列に数字だけが含まれているかどうかを確認する関数）を追加する


   require_once '../common2/scriptUtil.php';

    if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['type'])
            && !empty($_POST['tell']) && !empty($_POST['comment']) && ctype_digit($_POST['year']) && ctype_digit($_POST['month']) && ctype_digit($_POST['day'])
        ){
        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納
        session_start();
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">

<!--課題5.insert_result.phpにて、直接リンクしてアクセスしてしまった際のエラー処理が存在しない。これを、insert_confirmからのhiddenされたフォームによるPOSTを利用して実現しなさい-->

<!--insert_confirmからのhiddenされたフォームによるPOST-->
        <input type="hidden" name="access" value="access">
        <input type="submit" name="yes" value="はい">
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>

        <br>

        <?php

       //課題1.トップページへの戻るリンクが存在しないページがある。定義済みの関数を利用して実装しなさい

      //scriptUtil.php（よく使うユーザー定義関数をまとめておくファイル）で定義済みの関数を呼び出す。


       echo return_top();

?>

    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        再度入力を行ってください
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>


        <?php


        // 課題3:.insert_confirm.phpにてどの項目が不完全なのかをわかるようにしなさい

          //未入力の時のため、empty関数（()内の変数が0か空ならTRUEを返す）で確認。
          if(empty($_POST['name'])){
              echo '名前を入力してください。<br>';
          }
          if(empty($_POST['type'])){
              echo '種別を入力してください。<br>';
          }
          if(empty($_POST['tell'])){
              echo '電話番号を入力してくだい。<br>';
          }
          if(empty($_POST['comment'])){
              echo '自己紹介を入力してください。<br>';
          }
          if(empty($_POST['year'])){
              echo '年を入力してください。<br>';
          }
          if(empty($_POST['month'])){
              echo '月を入力してください。<br>';
          }
          if(empty($_POST['day'])){
              echo '日を入力してください。<br>';
          }

?>

  <?php

    /*1.トップページへの戻るリンクが存在しないページがある。定義済みの関数を利用して実装しなさい*/

      echo return_top();

       ?>



    <?php }?>
</body>
</html>
