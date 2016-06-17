６．５で作成したプログラムに、ファイルの中身を読み込んで表示する機能を追加してください。



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form enctype="multipart/form-data" action="test.php" method="POST">
    ファイル選択: <input name="userfile" type="file">
                <input type="submit">
  </form>
<?php
  $file = file_get_contents('uplodedfile.txt');
?>
</body>
</html>
