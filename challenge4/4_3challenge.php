３．2016年11月4日 10時0分0秒のタイムスタンプを作成し、
　　「年-月-日 時:分:秒」で表示してください。


<?php

$stamp = mktime(10,0,0,11,4,2016);
$today = date("Y年m月d日 H時:i分:s秒",$stamp);
echo $today;


?>
