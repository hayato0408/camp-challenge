課題7:引き数、戻り値はなしの関数を用意。初期値3のglobal値を2倍していく、
ローカルな値はstaticとしてその関数が何回実行されたのかを保持していくような関数である。
この関数を20回呼び出す



<?php
  $var = 3;
  function mul(){
    static $count = 1;
    echo $count++.'回目<br>';
    global $var;
    echo $var = $var * 2;
  }
  for($i = 1; $i <= 20; $i++){
    echo mul();
    echo '<br>';
  }
?>
