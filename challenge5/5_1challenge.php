１．以下の入力フィールドを持ったHTMLを、PHPで処理する想定で記述してください。
　　　・名前（テキストボックス）、性別（ラジオボタン）、趣味（複数行テキストボックス）


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="challenge5_2.php" method="post">
    名前:<input type="text" name="name">
    性別:<input type="radio" name="gender" value="男">男
        <input type="radio" name="gender" value="女">女
    趣味:<input type="textarea" name="hobby">
        <input type="submit">
  </form>
</body>
</html>
