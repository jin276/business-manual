<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();

// post確認
// var_dump($_POST);
// exit();

$id = filter_input(INPUT_POST, 'id');

try {
  $pdo->beginTransaction();

  $today = date("Y-m-d");

  $sql ="UPDATE steps SET deleted_at = :today WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->bindValue(':today', $today);
  $stmt->execute();

  $pdo->commit();
} catch (PDOException $e) {
  $pdo->rollback();
  $e->getMessage();
}

header("Location: " . SITE_VIEW);
exit;
?>