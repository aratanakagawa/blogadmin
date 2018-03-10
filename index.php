<?php

  session_start();
if(isset($_POST["user_id"])){
  if($_POST["user_id"]=="logout"){
    $_SESSION = array();
    session_destroy();
  }else{

  }
}else{
  
}


 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブログ管理システム</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><p class="navbar-brand">ブログ管理システムへようこそ</p></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<a href="user_regi.php">新規ユーザー登録</a><br>
<a href="user_login.php">ログイン</a><br>




</body>
</html>
