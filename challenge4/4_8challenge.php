８．ファイルに自己紹介を書き出し、保存してください。


<?php

$fp = fopen('my_introduction','w');

fwrite($fp,'安井勇人');

fclose($fp);


?>
