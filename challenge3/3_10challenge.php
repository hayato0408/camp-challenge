課題10:課題9の処理のうち2人目まででforeachのループを抜けるようにする


<?php
	$id = 1;
	$name = '安井';
	$birth = '1989年';
	$birthplace = '福井県';
	$num = array($id,$name,$birth,$birthplace);
	$id1 = 2;
	$name1 = '田中';
	$birth1 = '1988年';
	$birthplace1= '福島県';
	$num1 = array($id1,$name1,$birth1,$birthplace1);
	$id2 = 3;
	$name2 = '山田';
	$birth2= '1987年';
	$birthplace2 ='福岡県';
	$num2 = array($id2,$name2,$birth2,$birthplace2);

	$sum = array($num,$num1,$num2);


	foreach ($sum as $key => $value) {
		foreach ($value as $key1 => $value1) {
			if($key == 2){
				break;
			}
			echo $value1;
		}
	}
?>
