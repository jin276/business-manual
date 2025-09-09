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

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
  $pdo->beginTransaction();

  // 項目に空欄があるかの判定
  if (empty($name) || empty($nameKana) || empty($email) || empty($userId) || empty($password) || empty($confirmPassword)) { 
    $_SESSION['error'] = '未入力の項目があります。';
    
    header('Locatoin: ' . SITE_LOGIN);
    exit;

  // パスワード文字数判定
  } else if ((strlen($password) <3) || (strlen($confirmPassword) < 3)) {
    $_SESSION['error'] = "パスワードは〜文字以上です。";
    header('Locatoin:'. SITE_LOGIN); exit;

  // 入力した2つのパスワードがあっているかの判定
  } else if ($password !== $confirmPassword) {
    $_SESSION['error'] = "パスワードが間違っています。";
    header('Locatoin: ' . SITE_LOGIN);
    exit;
  }

  $search = "SELECT * FROM users WHERE user_name = userName";
  $stmt = $pdo->prepare($search);
  $stmt->bindValue(':userName', $userId);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $registeredAccount = $result['userName'];

  if ($registeredAccount === $userId) {
    $_SESSION['error'] = "すでに登録済みのアカウントです。";

    sleep(1);
    header('Location: ' . SITE_LOGIN);
    exit;
  }

  $sql = "INSERT INTO users (user_name, user_name_kana, email, user_id, user_password) VALUES (:userName, :userNameKana, :email, :userId, :userPassword)";

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':userName', $name);
  $stmt->bindValue(':userNameKana', $nameKana);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':userId', $userId);
  $stmt->bindValue(':userPassword', $hashedPassword);
  $stmt->execute();

  $pdo->commit();
} catch (PDOException $e) {
  $pdo->rollback();
  $e->getMessage();
}

header('Location: http://localhost:8080/signupComplete.php');
exit;
?>