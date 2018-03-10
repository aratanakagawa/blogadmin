<?php
//index.phpのformから送られてきたデータを変数で受け取ります.
//1. POSTデータ取得
session_start();
if(isset($_POST["name"])){
  $name   = $_POST["name"];
  $password = $_POST["password"];
}else{
  $name   = $_SESSION["yourname"];
  $password = $_SESSION["password"];
}




//2. DB接続します
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=nakagawa_14;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 ここはDBに実際にsqlを実行して登録する箇所です
//xxx(テーブル名)はテーブル名を入力します\


// select文用
$stmt = $pdo->prepare("SELECT count(*) FROM nakagawa_14_user_master where name=:a1 and pword=:a2");

$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $password);

$status = $stmt->execute();

$view="";
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorQuery1:".$error[2]);
}else{
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  $view= $result['count(*)'];

  // var_dump($resultpre1);
  //array(1) { ["count(*)"]=> string(1) "3" }


  if($view == 1){
    $_SESSION["yourname"]=$name;
    $stmt2 = $pdo->prepare("SELECT user_id FROM nakagawa_14_user_master where name=:a1 and pword=:a2");
    $stmt2->bindValue(':a1', $name);
    $stmt2->bindValue(':a2', $password);
    $status2 = $stmt2->execute();

    if($status2==false){
      $error2 = $stmt2->errorInfo();
      exit("ErrorQuery1:".$error2[2]);
    }else{
      $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

      $_SESSION["user_id"]= $result2['user_id'];
      header("Location: content_post.php");
      exit();
    }
  }else{
    $_SESSION["loginerror"]="名前またはパスワードが間違っています!!!<br>最初からやり直してください";
    header( "Location: user_login.php" ) ;
    exit();
  }
}
?>
