<?php

/*index.php

トップページ
このシステムの簡単な説明が記載されている。テキストは自由
insert.phpとsearch.phpへの直リンクが貼られている。テキストは自由
*/

 require_once '../common2/defineUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>ユーザー情報管理トップ</title>
</head>
<body>
    <h1>ユーザー情報管理トップ画面</h1><br>
    <h3>ここでは、ユーザー情報管理システムとしてユーザー情報の登録や検索、
        付随して修正や削除を行うことができます</h3><br>
    <a href="<?php echo INSERT; ?>">新規登録</a><br>
    <a href="<?php echo SEARCH; ?>" >検索(修正・削除)</a><br>
</body>
</html>
