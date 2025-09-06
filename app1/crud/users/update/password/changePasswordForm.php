<?php
require_once(_DIR_ . '/config.php');

unset($_SESSION['loginError']);

$pdo = getPdo();

$token = createToken();
$_SESSION['token'] = $token;

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, iinitial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASJC" crossorigin="anonymous">

    <link rel="stylesheet" href="changepassword.css">
    
    <title>Changing Password</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="title">
          <h1>Change Password</h1>
        </div>
    
        <form action="changepassUpdate.php" name="changePassword" method="post" class="changePass-container">
    
          <table>
            <tr>
              <th>
                <label for="accountName">ID</label>
              </th>
              <td>
                <input type="text" name="accountName" id="accountName">
              </td>
            </tr>
            <tr>
              <th>
                <label for="oldPassword">Current Password</label>
              </th>
              <td>
                <input type="text" name="oldPassword" id="oldPassword">
              </td>
            </tr>
            <tr>
              <th>
                <label for="newPassword">New Password</label>
              </th>
              <td>
                <input type="text" name="newPassword" id="newPassword">
              </td>
            </tr>
            <tr>
              <th>
                <label for="confirmPassword">Password (confirm)</label>
              </th>
              <td>
                <input type="password" name="confirmPassword" id="confirmPassword">
              </td>
            </tr>
          </table>

          <input type="hidden" name="token" value="<?= $token; ?>">
    
          <div id="passwordBlank" class="hidden">
            <p>未入力の項目があります。</p>
          </div>

          <div id="passwordLength" class="hidden">
            <p>パスワードの文字数は~以上です。</p>
          </div>
    
          <div id="passwordError" class="hidden">
            <p>パスワードが一致していません。</p>
          </div>

          <?php if (!empty($_SESSION['error'])): ?>
            <p style="color: red;"><?= $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
          <?php endif; ?>

          <a href="login.php">戻る</a>
          <button type="submit" id="button">確認する</button>
        </form>
      </div>
    </main>
    
    <script src="js/passwordValidation.js"></script>
  </body>
</html>