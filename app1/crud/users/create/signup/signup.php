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
    <!-- <link rel="stylesheet" href="scrollTop.css"> -->
    <!-- <link rel="stylesheet" href="top.css"> -->
    <!-- <link rel="stylesheet" href="index.css"> -->
    <link rel="stylesheet" href="signup.css">
    
    <title>Kitting Manual</title>
  </head>

  <body>
    <header>
      <div class="container">
        <div class="title">
          <h1>アカウントを作成する</h1>
        </div>

        <form action="signupUpdate.php" name="changePassword" method="post">
          <table>
            <tr>
              <th><label for="name">お名前</label></th>
              <td>
                <input type="text" id="name" name="name">
              </td>
            </tr>
            <tr>
              <th><label for="name_kana">お名前(フリガナ)</label></th>
              <td>
                <input type="text" id="name_kana" name="nameKana">
              </td>
            </tr>
            <tr>
              <th><label for="email">メールアドレス</label></th>
              <td>
                <input type="text" id="email" name="email">
              </td>
            </tr>
            <tr>
              <th><label for="userId">ID</label></th>
              <td>
                <input type="text" id="userId" name="userId">
              </td>
            </tr>
            <tr>
              <th><label for="password">パスワード</label></th>
              <td>
                <input type="text" id="password" name="password">
              </td>
            </tr>
            <tr>
              <th><label for="confirmPassword">パスワード(確認用)</label></th>
              <td>
                <input type="password" id="confirmPassword" name="confirmPassword">
              </td>
            </tr>
          </table>

          <div id="passwordBlank" class="hidden">
            <p>未入力の項目があります。</p>
          </div>

          <div id="passwordLen" class="hidden">
            <p>パスワードは、8文字以上です。</p>
          </div>
    
          <div id="passwordError" class="hidden">
            <p>パスワードが一致していません。</p>
          </div>

          <?php if (!empty($_SESSION['error'])): ?>
            <p style="color:red;"><?= $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
          <?php endif; ?>

          <div class="signup-btn">
            <a href="login.php">戻る</a>
            <button type="submit">内容を確認する</button>
          </div>
        </form>
        
      </div>
    </header>
  </body>
</html>