５．load関数でDBから全情報を取得するように各クラスの関数を実装してください。
　　その際、table変数を利用して、データを取得するようにしてください。



<?php
  abstract class base{
    protected function load($table){
        try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
        }catch(PDOException $Exception){
          die('接続に失敗しました:' .$Exception -> getMessage());
        }
        $sql = "select * from $table";
        $query = $pdo -> prepare($sql);
        $query -> execute();
        $result = $query -> fetchall(PDO::FETCH_ASSOC);
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
      $this -> load($this -> table);
    }
  }
  class Station extends base{
    private $table;
    function __construct($t){
      $this -> table = $t;
      $this -> load($this -> table);
    }
  }
  $h = new Human('Human');
  $s = new Station('station');
?>
