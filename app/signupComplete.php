<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();

?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charaset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, inital-scal=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuC0mLASjC" crossorigin="anonymous">
  
    <link rel="stylesheet" href="complete.css">
    
    <title>Kitting Manual</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="title">
          <h1>アカウントの作成が完了しました。</h1>
        </div>

        <div class="transition">
          <a href="login.php">ログインページに戻る</a>
        </div>
      </div>
    </main>
  </body>
</html>