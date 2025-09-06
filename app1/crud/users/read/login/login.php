<?php
require_once(__DIR__ . '/config.php');

?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charaset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, inital-scal=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuC0mLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    
    <title>Login Page</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="title">
          <h1>LOGIN PAGE</h1>
        </div>

        <form action="loginConfirm.php" method="post" class="login">
          <label for="userId">
            ID
            <input type="text" name="userId" id="userId">
          </label>
          <label for="password">
            Password
            <input type="password" name="password" id="password">
          </label>

          <input type="submit" value="ログイン">
        </form>

        <?php if (!empty($_SESSION['loginError'])): ?>
          <p style="color:red;"><?= $_SESSION['loginError']; ?></p>
          <?php unset($_SESSION['loginError']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
          <p style="color:red;"><?= $_SESSION['error']; ?></p>
          <?php unset($_SESSION['eError']); ?>
        <?php endif; ?>
        
        <div class="signup">
          <a href="signup.php">アカウントをお持ちでない場合はこちら</a>
        </div>
        
        <div class="changePassword">
          <a href="">パスワードを変更する場合はこちら</a>
        </div>
      </div>
    </main>
    

    <script src="js/index.js"></script>
  </body>
</html>