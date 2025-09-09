<?php
require_once(__DIR__. '/config.php');

$h1 = "業務マニュアル";
include 'header.php';

if (empty($_SESSION['userId'])) {
  header("Location: " . SITE_LOGIN);
  exit;
}


?>

    <main>
      <table>
        <tr>
          <th><a href="index.php">PCキッティング</a></th>
        </tr>
        <tr>
          <th><a href="#">スマートフォン</a></th>
        </tr>
        <tr>
          <th><a href="#">DB</a></th>
        </tr>
        <tr>
          <th><a href="#">MS365</a></th>
        </tr>
        <tr>
          <th><a href="#">サイボウズ</a></th>
        </tr>
        <tr>
          <th><a href="#">Adobe Acrobat</a></th>
        </tr>
      </table>

    </main>
  </body>
</html>