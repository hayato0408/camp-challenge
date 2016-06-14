

 <?php

//1.「Hello world.」を表示してください。
echo'Hello world!!'.'<br>';

 //２．「groove」「-」「gear」の３つの文字列を連結して表示してください。
echo'groove.-.gear'.'<br>'.'<br>';



//３．自分の自己紹介を作成してみてください。
echo'安井勇人'.'<br>'.'27歳'.'<br>'.'福井県出身'.
'<br>'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>';

//４．定数と変数を宣言し、それぞれに数値を入れて四則演算を行ってください。
$tasi = 5 + 5;    // 足し算
$hiki = 15 - 5;    // 引き算
$kake = 2 * 5;    // 掛け算
$wari = 20 / 2;   // 割り算
$amari = 65 % 11;   // 剰余：


//５．四則演算の結果をそれぞれ表示してください。
echo $tasi.'<br>';
echo $hiki.'<br>';
echo $kake.'<br>';
echo $wari.'<br>';
echo $amari.'<br>'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>';


/*６．変数を宣言し、その変数の中身によって以下の表示を行ってください。
　　　//⇒値が 1 なら「１です！」
　　　⇒値が 2 なら「プログラミングキャンプ！」
　　　⇒値が 'a' なら「文字です！」
　　　⇒それ以外なら「その他です！」　*/


$atai = 1;

if($atai=1){echo '「１です。」';
}

  elseif($atai=2){echo '「プログラミングキャンプ」';
}



elseif($atai='a'){echo '「文字です」';
}


else {echo '「その他です」';}




/*①商品種別は、３つ。１：雑貨、２：生鮮食品、３：その他
　　まずは、この商品種別を表示してください。*/

echo"雑貨<br>";
echo"総額".$goods_total_amount."円<br>";
echo"１個あたりの値段".$goods_amount."円<br><br>";


echo"生鮮食品<br>";
echo"総額".$foods_total_amount."円<br>";
echo"一個あたりの値段".$foods_amount."円<br＞＜br>";

echo"その他<br>";
echo"総額".$other_total_amount."円<br>";
echo"一個あたりの値段".$others_amount."円<br><br>";

/*②総額と個数から１個当たりの値段を算出してください。
　　総額と１個当たりの値段を表示してください。*/

$goods_total_amount=$_GET['goods_total_amount'];
$goods_count=$_GET['goods_count'];
$goods_type=$_GET['goods_type'];

$foods_total_amount=$_GET[foods_total_amount];
$foods_count=$_GET['foods_count'];
$foods_type=$_GET['foods_type'];


$others_total_amount=$_GET['others_total_amount'];
$others_count=$_GET['others_count'];
$others_type=$_GET['ohters_type'];

echo $goods_type;
echo $foods_type;
echo $others_type.'<br><br>';

$goods_amount=$goods_total_amount/$goods_count;
$foods_amount=$foods_total_amount/$foods_count;
$others_amount=$others_total_amount/$others_count;




/*③3000円以上購入で4%、5000円以上購入で5%のポイントが付きます。
　　購入額に応じたポイントの表示を行ってください。*/


$total_amount=$goods_total_amount+$foods_total_amount
+$others_amount;

if($total_amount>=3000){$point=$total_amount*0.04;
echo $point."ポイントが付きます"
}elseif($total_amount>=5000){
$point=$total_amount*0.05;
echo $point.”ポイントが付きます”;
}else{

}
