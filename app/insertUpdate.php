<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();

// post確認
// var_dump($_POST);
// exit;

$_SESSION['stepTitle'] = $_POST['stepTitle'];
$_SESSION['stepDetail'] = $_POST['stepDetail'];
$_SESSION['stepRemark'] = $_POST['stepRemark'];

$stepTitle = $_SESSION['stepTitle'];
$stepDetail = $_SESSION['stepDetail'];
$stepRemark = $_SESSION['stepRemark'];

$manualId = 1;

try {
  $pdo->beginTransaction();

  // step_orderカラムの最大値を取得
  $maxStepOrder = "SELECT MAX(step_order) FROM steps WHERE manual_id = :manualId";
  $stepStmt = $pdo->prepare($maxStepOrder);
  $stepStmt->bindValue(':manualId', $manualId);
  $stepStmt->execute();

  $maxOrder = $stepStmt->fetchColumn();
  $stepOrder = $maxOrder !== null ? $maxOrder + 1 : 1;

  // データ追加
  $insert = "INSERT INTO steps (manual_id, step_order, step_title, step_detail, step_remark) VALUES (:manualId, :stepOrder, :stepTitle, :stepDetail, :stepRemark)";

  $stmt = $pdo->prepare($insert);
  $stmt->bindValue(':manualId', $manualId);
  $stmt->bindValue(':stepOrder', $stepOrder);
  $stmt->bindValue(':stepTitle', $stepTitle);
  $stmt->bindValue(':stepDetail', $stepDetail);
  $stmt->bindValue(':stepRemark', $stepRemark);
  $stmt->execute();

  $pdo->commit();

  } catch (PDOException $e) {
    $pdo->rollback();
    echo $e->getMessage();
    // 自動でdbの次のidを取得、表示、変更不可
    // lastInsertId()
  }

  header('Location: '. SITE_VIEW);
  exit;
?>
