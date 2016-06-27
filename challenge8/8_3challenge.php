3．以下の機能を持つクラスを作成してください。

・パブリックな２つの変数
・２つの変数に値を設定するパブリックな関数
・２つの変数の中身をechoするパブリックな関数


<?php
  class menu{
    public $food;
    public $drink;
    public function write($fo,$dr){
            $this -> food = $fo;
            $this -> drink  = $dr;
    }
    public function menu_list(){
            return [$this -> food, $this -> drink];
    }
  }
$sushi = new menu();


$sushi -> write('大トロ', 'お茶');
$menu = $sushi -> menu_list();
foreach ($menu as $key => $value) {
  echo $value.'<br>';
}
?>
