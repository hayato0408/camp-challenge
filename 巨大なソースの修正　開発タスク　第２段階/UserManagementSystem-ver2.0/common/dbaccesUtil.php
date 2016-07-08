<?php

/*dbaccessUtil.php
データベースアクセス系のユーザー定義関数を格納する*/


//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayato','hone0044');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

//修正箇所 現在時をdatetime型で取得
function current_time(){
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');
    return $date;
}

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_profiles($name, $birthday, $type, $tell, $comment){
    //db接続を確立
    $insert_db = connect2MySQL();

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

    //現在時をdatetime型で取得
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':birthday',$birthday);
    $insert_query->bindValue(':tell',$tell);
    $insert_query->bindValue(':type',$type);
    $insert_query->bindValue(':comment',$comment);
    $insert_query->bindValue(':newDate',$date);

    //SQLを実行
    try{
        $insert_query->execute();
    } catch (PDOException $e) {
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db=null;
        return $e->getMessage();
    }

    $insert_db=null;
    return null;
}
// 空検索を行った際にuser_t テーブルすべてのレコードを返す。全レコードを連想配列として返却。
// 修正箇所 スペル「serch」→「search」に変更　関数内も変更
function search_all_profiles(){
    //db接続を確立
    $search_db = connect2MySQL();
// テーブルに登録されたすべてのレコードを返すSQL文を用意
    $search_sql = "SELECT * FROM user_t";

    //クエリとして用意
    $search_query = $search_db->prepare($search_sql);

    //SQLを実行
    try{
        $search_query->execute();
    } catch (PDOException $e) {
        $search_query=null;
        return $e->getMessage();
    }

    //全レコードを連想配列として返却
    return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 複合条件検索を行う
 * @param type $name
 * @param type $year
 * @param type $type
 * @return type
 */

 //修正箇所　引数を$search_name,$seach_year,$search_typeに変更する。
function search_profiles($search_name=null,$search_year=null,$search_type=null){
    //db接続を確立
    $search_db = connect2MySQL();

    $search_sql = "SELECT * FROM user_t";

    //$flagをfalseに設定する。
    $flag = false;

    //中身を確認し、値が存在するなら、それぞれのコマンドを実行する。
    if(isset($search_name)){
        $search_sql .= " WHERE name like :name";
        $flag = true;
    }

    // 修正箇所 flagにfalseを代入する処理($flag = false)をflag自身がfalseの条件のとき($flag == false)に変更する。
    if(isset($search_year) && $flag == false){
        $search_sql .= " WHERE birthday like :year";
        $flag = true;
    }else if(isset($search_year)){
        $search_sql .= " AND birthday like :year";
    }
    // 修正箇所 flagにfalseを代入する処理($flag = false)をflag自身がfalseの条件のとき($flag == false)に変更する。
    if(isset($search_type) && $flag == false){
        $search_sql .= " WHERE type = :type";
    }else if(isset($search_type)){
        $search_sql .= " AND type = :type";
    }

    //クエリとして用意
    $search_query = $search_db->prepare($search_sql);

    // 修正箇所　$name,$year,$typeに値があれば、検索をかけられる処理を追加。
     if (isset($search_name)) {
         $search_query->bindValue(':name', '%'.$search_name.'%');
     }
     if (isset($search_year)) {
         $search_query->bindValue(':year', '%'.$search_year.'%');
     }
     if (isset($search_type)) {
         $search_query->bindValue(':type', $search_type);
}

    //SQLを実行
    try{
        $search_query->execute();
    } catch (PDOException $e) {
        $search_query=null;
        return $e->getMessage();
    }

    //該当するレコードを連想配列として返却
    return $search_query->fetchAll(PDO::FETCH_ASSOC);
}


// 該当するidの登録者のレコードを連想配列として返却する。 失敗の場合エラー文を返却する
function profile_detail($id){
    //db接続を確立
    $detail_db = connect2MySQL();
//該当するidのレコードを返すSQL文を用意。
    $detail_sql = "SELECT * FROM user_t WHERE userID=:id";

    //クエリとして用意
    $detail_query = $detail_db->prepare($detail_sql);

    $detail_query->bindValue(':id',$id);

    //SQLを実行
    try{
        $detail_query->execute();
    } catch (PDOException $e) {
        $detail_query=null;
        return $e->getMessage();
    }

    //レコードを連想配列として返却
    return $detail_query->fetchAll(PDO::FETCH_ASSOC);
}

//該当するidのレコードを削除する
function delete_profile($id){

//db接続を確立
    $delete_db = connect2MySQL();

//修正箇所　スペルミスを修正
    $delete_sql = "DELETE FROM user_t WHERE userID=:id";

    //クエリとして用意
    $delete_query = $delete_db->prepare($delete_sql);
//削除するidをバインドする
    $delete_query->bindValue(':id',$id);

    //SQLを実行
    try{
        $delete_query->execute();
    } catch (PDOException $e) {
        $delete_query=null;
        return $e->getMessage();
    }
    return null;
}


// 修正箇所　登録済みのデータを更新する関数を定義する。
function update_profile($id, $ud_name, $ud_birthday, $ud_type, $ud_tell, $ud_comment,$ud_date){
    //db接続を確立
    $update_db = connect2MySQL();
    //指定したuseridのレコード情報を上書きするSQLを用意
    $update_sql = "UPDATE user_t SET name=:name, birthday=:birthday, type=:type,".
                  " tell=:tell, comment=:comment, newdate=:newdate WHERE userid=:id";

    //クエリとして用意
    $update_query = $update_db->prepare($update_sql);
    // 値の上書き
    $update_query->bindValue(':id',$id);
    $update_query->bindValue(':name',$ud_name);
    $update_query->bindValue(':birthday',$ud_birthday);
    $update_query->bindValue(':type',$ud_type);
    $update_query->bindValue(':tell',$ud_tell);
    $update_query->bindValue(':comment',$ud_comment);
    $update_query->bindValue(':newdate',$ud_date);
    //SQLを実行
    try{
        $update_query->execute();
    } catch (PDOException $update_e) { // 失敗の場合エラー文を返却する
        $update_query=null;
        return $update_e->getMessage();
    }
    return null;
}
