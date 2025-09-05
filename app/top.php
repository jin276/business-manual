<?php
require_once(__DIR__. '/config.php');

include 'header.php';

if (empty($_SESSION['userId'])) {
  header("Location: " . SITE_LOGIN);
  exit;
}


?>

    <main>

    </main>
  </body>
</html>