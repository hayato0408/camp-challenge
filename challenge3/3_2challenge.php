
<?php
  function discriminant($num){
    if($num % 2 == 0){
      echo "偶数です。";
    }else{
      echo "奇数です。";
    }
  }
  echo discriminant(2);
?>
