課題4:課題1で定義した関数に追記する形として、戻り値　true(bool値)　を返却するように修正し、関数の呼び出し側でtrueを
受け取れたら「この処理は正しく実行できました」、そうでないなら「正しく実行できませんでした」と表示する


<?php

echo "<br>"."<br>"."<br>";


  function my_profile(){
    echo "私の名前は安井です"."<br>";
    echo "生年月日(4/8)"."<br>";
    echo "27歳です。"."<br>";

  return true;
  }
  $i = my_profile();
  if($i == true){
    echo 'この処理は正しく実行できました';
  }else{
    echo '正しく実行できませんでした';
  }
?>
