<?php

/*defineUtil.php

システム内で使われる具体的な定数(topページなどのURLや、MySQLユーザー名、パスワード)などをまとめて定義しておく場所。
ここで定義しておき全.phpでrequireすれば、いちいち変数を宣言する必要がなくなる
const $~~=・・・; という表記のみが記述されている。*/



//課題１　1.トップページへの戻るリンクが存在しないページがある。定義済みの関数を利用して実装しなさい

//ROOT_URLを'index.php'に変更
const ROOT_URL = 'index.php';     //indexディレクトリへのURL
const TOP_URI = '/';                                //トップページ
const INSERT = 'insert.php';                   //登録ページ
const INSERT_CONFIRM = 'insert_confirm.php';   //登録確認ページ
const INSERT_RESULT = 'insert_result.php';     //登録完了ページ
const SEARCH = 'search.php';                   //検索ページ

?>
