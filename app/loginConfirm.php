<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();

$userId = filter_input(INPUT_POST, 'userId');
$password = filter_input(INPUT_POST, 'password');

try {

  if (empty($userId) || empty($password)) {
    $_SESSION['loginError'] = "IDまたはパスワードが未入力です。";

    header("Location: " . SITE_LOGIN);
    exit;
  }

  $sql = "SELECT * FROM users WHERE user_id = :userId";

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':userId', $userId);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$result) {
    exit('error');
  }

  $hashedPassword = $result['user_password'];

  if (password_verify($password, $hashedPassword)) {
    $_SESSION['userId'] = $result['user_id'];

    header("Location: " . SITE_TOP);
    exit;
  } else {
    $_SESSION['loginError'] = "IDまたはパスワードが間違っています。";
    header('Location: ' . SITE_LOGIN);
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}



?>