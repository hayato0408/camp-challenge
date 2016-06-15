課題3:引き数が3つの関数を定義する。1つ目は適当な数値を、2つ目はデフォルト値が5の数値を、
最後はデフォルト値がfalse(bool値)の$typeを引き数として定義する。1つ目の引き数に2つ目の引き数を掛ける計算をする関数を作成し、
$typeがfalseの時はその値を表示、trueのときはさらに2乗して表示する。
　例）function sample($□□□, $△△△, $type) // 引数が３つの関数書き出し部分(デフォルト値なし)


<?php
  function num($num1, $num2 = 5, $type = false){
    if($type == false){
      echo $num1 * $num2;
    }elseif($type == true){
      echo ($num1 * $num2) ** 2;
    }
  }
  echo num(4, 4, 0);
?>



function sample($□□□, $△△△, $type) // 引数が３つの関数書き出し部分(デフォルト値なし)
