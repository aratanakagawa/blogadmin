<?php

session_start();
//index.phpのformから送られてきたデータを変数で受け取ります.
//1. POSTデータ取得

$content_id = $_POST["content_id"];


//2. DB接続します
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=nakagawa_14;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成 ここはDBに実際にsqlを実行して登録する箇所です
//xxx(テーブル名)はテーブル名を入力します\
$stmt = $pdo->prepare("DELETE from nakagawa_14_content where content_id=:a1");
//$xxxxには上で受け取った変数名を入れます
$stmt->bindValue(':a1', $content_id);
$status = $stmt->execute();



//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクトとは処理が終わったら指定しているページに画面遷移させること
  header("Location: select.php?flag=d");
  exit;
}
?>
