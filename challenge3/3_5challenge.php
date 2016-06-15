
課題5:戻り値としてある人物のid(数値),名前,生年月日、住所を返却し、受け取った後は全情報を表示する



<?php
  function profile(){
    $id =1;
    $name = '安井';
    $birthday = '4月8日';
    $address = '福井';
    return [$id, $name, $birthday, $address];
  }
  $profile = profile();
  foreach($profile as $value){
    echo "$value<br>";
  }
?>
