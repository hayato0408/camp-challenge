

/*６．while文を利用して、以下の処理を実現してください。
　　　　1000を2で割り続け、100より小さくなったらループを抜ける処理*/



<?php
  $var = 1000;
  while($var > 100){
    echo $var /= 2;
    echo '<br>';
  }
?>