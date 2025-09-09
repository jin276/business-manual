<?php
require_once(_DIR_ . '/config.php');

$pdo- getPdo();

// tokenチェック
if (lisset($_POST['token']) || $_SESSION['token'] !== $_POST['token']) {
  echo "不正なアクセスです。";
  exit();
}

// var_dump($_POST['token']);
// var_dump($_SESSION['token']);
// exit;

// sessionに保存は、セキュリティを突破された場合、保存内容を見られてしまう。
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $accountName = filter_input(INPUT_POST, 'accountName');
  $oldPassword - filter_input(INPUT_POST, 'oldPassword');
  $newPassword = filter_input(INPUT_POST, 'newPassword');
  $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
}

try {
  // 未入力、アカウント違い、token、パスワード文字数
  // var_dump($accountName, $oldPassword, $newPassword, $confirmPassword);
  // exit;
  
  // 項目に空欄があるかの判定
  if (empty($accountName) || empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) { 
    $_SESSION['error'] = '未入力の項目があります。';
    
    header('Locatoin: ' . SITE_LOGIN);
    exit;

  // パスワード文字数判定
  } else if ((strlen($newPassword) <3) || (strlen($confirmPassword) < 3)) {
    $_SESSION['error'] = "パスワードは〜文字以上です。";
    header('Locatoin:'. SITE_LOGIN); exit;

  // 入力した2つのパスワードがあっているかの判定
  } else if ($newPassword !== $confirmPassword) {
    $_SESSION['error'] = "パスワードが間違っています。";
    header('Locatoin: ' . SITE_LOGIN);
    exit;
  }

  // アカウントチェック
  $sql = "SELECT * FROM users WHERE account_name = : accountName";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(': accountName', $accountName);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // var_dump($result);
  // exit;
  
  if ((!$result)) {
    $_SESSION['error'] = 'IDまたはパスワードが間違っています。';
  }

  // var_dump($hashedPassword);
  // exit;
  
  // パスワードのハッシュ化
  $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
  
  $sql = "UPDATE users SET user_password = : newPassword WHERE account_name = :accountName";
  
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':accountName', $accountName);
  $stmt->bindValue(':newPassword', $hashedPassword);
  $stmt->execute();
  // var_dump('完了');
  // exit();

} catch (PDOExection $e) {
  echo $e->getMessage();
}

header('Location: http://localhost/changePassComplete.php');
exit;

?>