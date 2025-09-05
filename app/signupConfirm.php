<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();


// if ($_SERVER['REQUEST_METHOD'] === 'post') {
  $name = filter_input(INPUT_POST, 'name');
  $nameKana = filter_input(INPUT_POST, 'nameKana');
  $email = filter_input(INPUT_POST, 'email');
  $userId = filter_input(INPUT_POST, 'userId');
  $password = filter_input(INPUT_POST, 'password');
  $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
// }

if ($password !== $confirmPassword) {
  $_SESSION['error'] = "パスワードが一致しません。";

  header('Location: ' . SITE_LOGIN);
  exit;

} else if(empty($name) || empty($nameKana) || empty($email) || empty($userId) || empty($password) || empty($confirmPassword)) {
  $_SESSION['error'] = "未入力の項目があります。";

  header('Location: ' . SITE_LOGIN);
  exit;
} else if ((strlen($password) < 3) || (strlen($confirmPassword) < 3)) {
  $_SESSION['error'] = "パスワードは〜文字以上です。";

  header('Location: ' . SITE_LOGIN);
  exit;
}

?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charaset="utf-8">
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
          <h1>内容を確認する</h1>
        </div>

        <form action="signupUpdate.php" method="post">
          <table>
              <tr>
                <th>お名前</th>
                <td>
                  <input type="text" id="name" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES); ?>">
                </td>
              </tr>
              <tr>
                <th>お名前(フリガナ)</th>
                <td>
                  <input type="text" id="name_kana" name="nameKana" value="<?= htmlspecialchars($nameKana, ENT_QUOTES); ?>">
                </td>
              </tr>
              <tr>
                <th>メールアドレス</th>
                <td>
                  <input type="text" id="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES); ?>">
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <td>
                  <input type="text" id="userId" name="userId" value="<?= htmlspecialchars($userId, ENT_QUOTES); ?>">
                </td>
              </tr>
              <tr>
                <th>パスワード</th>
                <td>
                  <input type="password" id="password" name="password" value="<?= htmlspecialchars($password, ENT_QUOTES); ?>">
                </td>
              </tr>
              <tr>
                <th>パスワード(確認用)</th>
                <td>
                  <input type="password" id="confirmPassword" name="confirmPassword" value="<?= htmlspecialchars($confirmPassword, ENT_QUOTES); ?>">
                </td>
              </tr>
            </table>

            <?php if (!empty($_SESSION['error'])): ?>
              <p style="color:red;"><?= $_SESSION['error']; ?></p>
              <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="signup-btn">
              <a href="login.php">戻る</a>
              <button type="submit">アカウントを登録する</button>
            </div>
        </form>
        
      </div>
    </header>
  </body>
</html>