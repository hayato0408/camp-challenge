６．show関数で各テーブルの情報の一覧が表示されるようにしてください。


<?php
  abstract class base{
    private $result;
    protected function load($table){
        try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
        }catch(PDOException $Exception){
          die('接続に失敗しました:' .$Exception -> getMessage());
        }
        $sql = "select * from $table";
        $query = $pdo -> prepare($sql);
        $query -> execute();
        $this->result = $query -> fetchall(PDO::FETCH_ASSOC);
    }
    public function show(){
      var_dump($this -> result);
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
  $h->show();
  $s = new Station('Station');
  $s->show();
?>
