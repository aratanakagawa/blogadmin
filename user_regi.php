<?php
session_start();

if(isset($_SESSION["pkerror"])){

}else{
  $_SESSION["pkerror"]="";
}

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">過去の投稿一覧</a></div> -->
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="user_regi_insert.php">
  <div class="jumbotron">
    <p><?= $_SESSION["pkerror"]; ?></p>
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>名前：<input type="text" name="name" required></label><br>
     <label>パスワード：<input type="password" name="password" required></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

<!-- Main[End] -->

<!-- <form action="next.php" method="post">
  <p><input type="text" name="name">お名前は?</p>
  <p><input type="password" name="password">パスワードを入力してください</p>
  <p><input type="url" name="url" size="30" maxlength="40">URLを入力して下さい</p>
  <p><input type="datetime" name="datetime">日時</p>
  <p><input type="file" name="datafile"></p>
  <p><input type="range" name="range" style="width:150px"></p>
  <input type="submit" value="submit">
</form> -->
</body>
</html>

<?php
// セッション変数を全て解除する
$_SESSION = array();

// セッションを切断するにはセッションクッキーも削除する。
// Note: セッション情報だけでなくセッションを破壊する。
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// 最終的に、セッションを破壊する
session_destroy();
?>
