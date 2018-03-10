<?php
//index.phpのformから送られてきたデータを変数で受け取ります.
//1. POSTデータ取得
$name   = $_POST["name"];
$password = $_POST["password"];
session_start();



//2. DB接続します
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=nakagawa_14;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 ここはDBに実際にsqlを実行して登録する箇所です
//xxx(テーブル名)はテーブル名を入力します\
$stmt = $pdo->prepare("INSERT INTO nakagawa_14_user_master(user_id, name, pword, regi_date)
VALUES(NULL, :a1, :a2, sysdate())");
//$xxxxには上で受け取った変数名を入れます

$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $password);


// select文用
$stmtpre1 = $pdo->prepare("SELECT count(*) FROM nakagawa_14_user_master where name=:a1");

$stmtpre2 = $pdo->prepare("SELECT count(*) FROM nakagawa_14_user_master where pword=:a2");

$stmtpre1->bindValue(':a1', $name);
$stmtpre2->bindValue(':a2', $password);

$statuspre1 = $stmtpre1->execute();
$statuspre2 = $stmtpre2->execute();

$view1="";
if($statuspre1==false or $statuspre2==false){
  $errorpre1 = $stmtpre1->errorInfo();
  $errorpre2 = $stmtpre2->errorInfo();
  exit("ErrorQuery1:".$errorpre1[2]);
  exit("ErrorQuery2:".$errorpre2[2]);
}else{
  $resultpre1 = $stmtpre1->fetch(PDO::FETCH_ASSOC);
  $resultpre2 = $stmtpre2->fetch(PDO::FETCH_ASSOC);

  $view1= $resultpre1['count(*)'];
  $view2= $resultpre2['count(*)'];

  var_dump($resultpre1);
  //array(1) { ["count(*)"]=> string(1) "3" }


  if($view1 == 0 and $view2 == 0){
      $status = $stmt->execute();
      if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
      }else{
        $_SESSION["yourname"]=$name;
        $_SESSION["password"]=$password;
        $_SESSION["pkerror"]="";
        header("Location: user_login_check.php");
        exit;
      }

  }else{
    $_SESSION["pkerror"]="すでに同じユーザーがいます!!!<br>最初から登録し直してください";
    header( "Location: user_regi.php" ) ;
    exit();
  }
}



?>
