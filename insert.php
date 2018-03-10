<?php

session_start();
//index.phpのformから送られてきたデータを変数で受け取ります.
//1. POSTデータ取得
$title   = $_POST["title"];
$content = $_POST["content"];


//2. DB接続します
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=nakagawa_14;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成 ここはDBに実際にsqlを実行して登録する箇所です
//xxx(テーブル名)はテーブル名を入力します\
$stmt = $pdo->prepare("INSERT INTO nakagawa_14_content(content_id,user_id, title, content, regi_date,
modified_date )VALUES(NULL, :a1, :a2, :a3, sysdate(), null)");
//$xxxxには上で受け取った変数名を入れます
$stmt->bindValue(':a1', $_SESSION["user_id"]);
$stmt->bindValue(':a2', $title);
$stmt->bindValue(':a3', $content);
$status = $stmt->execute();



//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクトとは処理が終わったら指定しているページに画面遷移させること
  header("Location: select.php?flag=i");
  exit;
}
?>
