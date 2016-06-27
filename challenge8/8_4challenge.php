
4．3のクラスを継承し、以下の機能を持つクラスを作成してください。

・２つの変数の中身をクリアするパブリックな関数


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
  class clear_menu extends menu{
    public function clear(){
            $this -> food = null;
            $this -> drink  = null;
            return [$this -> food, $this -> drink];
    }
  }
$sushi = new clear_menu();
$sushi -> write('大トロ', 'お茶');
$menu = $sushi -> clear();
var_dump($menu);
?>
