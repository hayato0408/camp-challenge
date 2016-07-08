<?php
/*search.php
検索条件をフォームに記入してから検索できる
検索条件は以下の通り
名前(部分一致)
生年
種別
値の渡し方はGETを使用
複合検索
*/
?>


<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報検索画面</title>
</head>
  <body>

  <!-- 修正箇所　見出しがないため<h1>を追加-->
    <h1>ユーザー情報検索画面</h1>

    <form action="<?php echo SEARCH_RESULT ?>" method="GET">

        名前:
        <br>
        <input type="text" name="name">
        <br><br>

        生年:
        <br>
        <select name="year">
            <option value="">----</option>
            <?php
            for($i=1950; $i<=2010; $i++){ ?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select>年生まれ
        <br><br>

        種別:
        <br>
        <?php
        for($i = 1; $i<=3; $i++){ ?>
        <input type="radio" name="type" value="<?php echo $i; ?>"><?php echo ex_typenum($i);?><br>


        <?php } ?>
        <br>

        <input type="submit" name="btnSubmit" value="検索">
        <!-- 修正箇所　不正アクセス対策として検索結果ページにhiddenで値を送信 -->
       <input type="hidden" name="id" value="<?php echo $id ?>">

      </form>
      <?php
        //修正箇所　トップに戻る処理を追加
        echo return_top();
      ?>
  </body>
</html>
