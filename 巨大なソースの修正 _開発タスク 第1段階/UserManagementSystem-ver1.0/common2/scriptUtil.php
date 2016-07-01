<?php

/*
scriptUtil.php

よく使うユーザー定義関数をまとめておく
例えば、トップへのリンクを挿入する処理をまとめておけば、すべてのページでこのリンクを使用するときにそのユーザー定義関数を挿入するだけでよくなる*/



 require_once '../common2/defineUtil.php';


  function return_top(){
      return "<a href='".ROOT_URL."'>トップへ戻る</a>";
  }
  ?>
