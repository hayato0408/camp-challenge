４．３と同じ機能をセッションで作成してください。


<?php

  $access_time = date("Y年m月d日 H時:i分:s秒");

  session_start();

  $_SESSION['access_time'] = $access_time;

  echo '前回ログイン:'.$_SESSION['access_time'];

?>
