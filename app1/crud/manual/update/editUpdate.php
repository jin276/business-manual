<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();

$_SESSION['stepOrder'] = $_POST['stepOrder'];
$_SESSION['stepTitle'] = $_POST['stepTitle'];
$_SESSION['stepDetail'] = $_POST['stepDetail'];
$_SESSION['stepRemark'] = $_POST['stepRemark'];

$stepOrder = $_SESSION['stepOrder'];
$stepTitle = $_SESSION['stepTitle'];
$stepDetail = $_SESSION['stepDetail'];
$stepRemark = $_SESSION['stepRemark'];

try {
  $pdo->beginTransaction();

  $sql ="UPDATE steps SET step_title = :stepTitle, step_detail = :stepDetail, step_remark = :stepRemark WHERE step_order = :stepOrder";

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':stepTitle', $stepTitle);
  $stmt->bindValue(':stepDetail', $stepDetail);
  $stmt->bindValue(':stepRemark', $stepRemark);
  $stmt->bindValue(':stepOrder', $stepOrder);
  $stmt->execute();

$pdo->commit();
} catch (PDOException $e) {
  $pdo->rollback();
  $e->getMessage();
}

sleep(1);
header("Location: " . SITE_VIEW);
exit;
?>