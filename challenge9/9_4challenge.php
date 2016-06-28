４．３で作成した抽象クラスを継承して、以下のクラスを作成してください。
　　・人の情報を扱うHumanクラス
　　・駅の情報を扱うStationクラス
　　また、各クラスに隠匿変数でtableという変数を用意し、各クラスの初期化処理で
　　table変数にテーブル名を設定してください。


<?php
  abstract class base{
    protected function load(){
    }
    public function show(){
    }
    function __construct(){
    }
  }
  class Human extends base{
    private $table;
    function __construct($t){
      $this -> table = $t;
    }
  }
  class Station extends base{
    private $table;
    function __construct($t){
      $this -> table = $t;
    }
  }
?>
