<?php

function getPdo()
{
  try {
    $pdo = new PDO(
      dns,
      dbuser,
      dbpass,

      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]
    );

    return $pdo;
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }
}

function hsc($str)
{
  return nl2br(htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8'));
}

function textareaHsc($str)
{
  return nl2br(htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8'));
}

function createToken()
{
  return bin2hex(random_bytes(32));
}

function getDb($pdo)
{
  $sql = "SELECT * FROM steps";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function isNull($pdo)
{
  $sql = "SELECT * FROM steps WHERE deleted_at IS NULL";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function isNotNull($pdo)
{
  $sql = "SELECT * FROM steps WHERE deleted_at IS NOT NULL";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

?>