<?php
session_start();

// $regi_date=$_POST["regi_date"];
// $modified_date=$_POST["modified_date"];
// $user_id=$_POST["user_id"];
// $content_id=$_POST["content_id"];
// $title=$_POST["title"];
// $content=$_POST["content"];
 $content_id = $_GET['content_id'];
 $title = $_GET['title'];
 $content = $_GET['content'];

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="select.php">過去の投稿一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<p><?= $_SESSION["yourname"]; ?>さんがログイン中</p>
<div class="jumbotron">
<form method="post" action="modify.php">

   <fieldset>
    <legend>投稿修正</legend>
     <label>タイトル：<input type="text" name="title" value="<?= $title; ?>" ></label><br>
     <label><textArea name="content" rows="4" cols="40" value="" placeholder=""><?= $content; ?></textArea></label><br>
      <input type="hidden" name="content_id" value="<?= $content_id; ?>">
     <input type="submit" value="修正">
    </fieldset>

</form>
<form method="post" action="delete.php">
     <input type="hidden" name="content_id" value="<?= $content_id; ?>">
     <input type="submit" value="投稿削除">
</form>
</div>
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
