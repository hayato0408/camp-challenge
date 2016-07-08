<?php

/*search_result.php
検索結果がID昇順にテーブル型で表示される
検索結果として表示されるのは名前、生年、種別、登録日のみ
名前がクリック可能になっており、クリックするとresult_detail.phpへ遷移する
検索で何も入力されていないときは全件表示
*/

require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';



//修正箇所 直接アクセスしてきた場合の処理。（search.phpからGETで受け取る）
if(!isset($_GET['id'])){
    echo 'もう一度トップページからやり直してください。<br>';
}elseif ($_GET['id'] !== 'id') {
    echo 'もう一度トップページからやり直してください。<br>';
}else{$id = $_GET['id'];
}



//修正箇所　$_GET[]で受け取った値を変数に格納する
$search_name = $_GET['name'];
$search_year = $_GET['year'];

//修正箇所　種別のラジオボタンにチェックが入っていない場合、nullを返す
if(!isset($_GET['type'])){
  $search_type = null;

}else{
  $search_type = $_GET['type'];
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
      //$resultをnullで初期化する
        $result = null;

      //もし名前、年、種別が空なら、DBからすべてのレコードを連想配列で受け取る。
        if(empty($search_name) && empty($search_year) && empty($search_type)){
          //修正箇所　スペルミスを修正（searchに）

            $result = search_all_profiles();
        }else{
          //名前か年か種別で、複合検索をかけ、該当箇所を連想配列で受け取る。
            $result = search_profiles($search_name,$search_year,$search_type);
        }


        foreach($result as $value){

        ?>
            <tr>
                <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate']));; ?></td>
            </tr>

        <?php
        }

        ?>

    <form action="<?php echo RESULT_DETAIL; ?>" method="GET">
      <!--詳細ページにhiddenで値を送る-->
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="search_name" value="<?php echo $search_name; ?>">
     <input type="hidden" name="search_year" value="<?php echo $search_year; ?>">
     <input type="hidden" name="search_type" value="<?php echo $search_type;?>">
   </form>




<?php
//トップに戻る処理を挿入
echo return_top(); ?>

        </table>
</body>
</html>
