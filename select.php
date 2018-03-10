<?php



function h($value){
  return htmlspecialchars($value, ENT_QUOTES);
}

session_start();

if(isset($_GET['flag'])){
  $flag=$_GET['flag'];
  if($flag=="m"){
    $message="修正できました！";
  }elseif($flag=="d"){
    $message="削除できました!";
  }elseif($flag=="d"){
    $message="投稿できました!";
  }else{
    $message="";
  }
}else{
  $message="";
}

if(isset($_SESSION["user_id"])){

}else{
  header( "Location: index.php" ) ;
  exit();
}


//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=nakagawa_14;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所
$stmt = $pdo->prepare("SELECT * FROM nakagawa_14_content where user_id=:a1 order by regi_date desc");

$stmt->bindValue(':a1', $_SESSION["user_id"]);

$status = $stmt->execute();

//３．データ表示
$view=""; //受け取るための変数を事前に作ります。
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{


}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="content_post.php">投稿画面に戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container jumbotron">
  <p><?= $message; ?></p>
<table width="" border="1">
  <tr>
    <th scope="col">Regi_date</th>
    <th scope="col">Modified_date</th>
    <!-- <th scope="col">User_id</th> -->
    <!-- <th scope="col">Content_id</th> -->
    <th scope="col">Title</th>
    <th scope="col">Content</th>
  </tr>
  <?php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
   ?>
   <tr>
     <td><?php print(h($result['regi_date'])); ?></td>
     <td><?php print(h($result['modified_date'])); ?></td>
     <!-- <td><?php print(h($result['user_id'])); ?></td> -->
     <!-- <td><?php print(h($result['content_id'])); ?></td> -->
     <td><?php print(h($result['title'])); ?></td>
    <form action="modify_post.php" method="post">
      <!-- <input type="hidden" name="regi_date" value=<?php print(h($result['regi_date'])); ?>>
      <input type="hidden" name="modified_date" value="<?php print(h($result['modified_date'])); ?>">
      <input type="hidden" name="user_id" value="<?php print(h($result['user_id'])); ?>">
      <input type="hidden" name="content_id" value="<?php print(h($result['content_id'])); ?>">
      <input type="hidden" name="title" value="<?php print(h($result['title'])); ?>">
      <input type="hidden" name="content" value="<?php print(h($result['content'])); ?>"> -->
     <td><a href="modify_post.php?content_id=<?php print(h($result['content_id'])); ?>&title=<?php print(h($result['title'])); ?>&content=<?php print(h($result['content'])); ?>" onclick="document.download.submit();return false;"><?php print(h($result['content'])); ?></a></td>
    </form>
   </tr>
   <?php
    }
    ?>
</table>
<p></p>
<form method="post" action="index.php">
     <input type="hidden" name="user_id" value="logout">
     <input type="submit" value="ログアウト">
</form>
</div>

<!-- Main[End] -->

</body>
</html>
