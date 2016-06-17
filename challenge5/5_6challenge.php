６．５で作成したプログラムに、ファイルの中身を読み込んで表示する機能を追加してください。


<HTML>
    <head>
    </head>
    <body>
        <form enctype="multipart/form-data" action="sample.php" method="post">
            ファイル選択：<input name="userfile" type="file" />
        </form>

        <HTML>
            <head>
            </head>
            <body>
<?php

$file = file_get_contents('uplloded file.text');

echo $file;


?>

    </body>
</HTML>
