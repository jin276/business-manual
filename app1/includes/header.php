<?php
require_once(__DIR__ . '/config.php');
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charaset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuC0mLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="index.css">
    
    <!-- 個別css -->
    <?php if (!empty($scrollTop_css)): ?>
      <link rel="stylesheet" href="<?= htmlspecialchars($scrollTop_css); ?>">
    <?php endif; ?>

    <?php if (!empty($edit_css)): ?>
      <link rel="stylesheet" href="<?= htmlspecialchars($edit_css); ?>">
    <?php endif; ?>

    <?php if (!empty($modal_css)): ?>
      <link rel="stylesheet" href="<?= htmlspecialchars($modal_css); ?>">
    <?php endif; ?>

    <title><?= htmlspecialchars($title ?? "PC Kitting Manual")?></title>

  </head>

  <body>
    <header>
      <div class="header-container">
        <div>
          <a href="top.php">
            <img src="img/05.jpg" alt="トップページに戻る" width="116" height="64">
          </a>
        </div>

        <div class="header-menu">

          <a href="index.php">キッティング</a>
          <a href="#">スマートフォン</a>
          <a href="#">DB</a>
          <a href="#">MS365</a>
          <a href="#">サイボウズ</a>
          <a href="#">Adobe Acrobat</a>
        </div>

        <div class="loginlogout">
          <p>こんにちは<span style="color:blue;"><?= htmlspecialchars($_SESSION['userId'], ENT_QUOTES); ?></span>さん</p>
          <span class="logout">＜<a href="logout.php"> ログアウト </a>＞</span>
        </div>
      </div>
    </header>
 
    <main>
      <div class="container">
