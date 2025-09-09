<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();

$stepOrder = filter_input(INPUT_POST, 'stepOrder');
$nodata = null;

try {

  $sql = "UPDATE steps SET deleted_at = :nodata WHERE step_order = :stepOrder";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':nodata', $nodata);
  $stmt->bindValue(':stepOrder', $stepOrder);
  $stmt->execute();

}catch (PDOException $e) {
  $e->getMessage();
}

header('Location: ' . SITE_VIEW);
exit;
?>