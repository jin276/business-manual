<?php
require_once(__DIR__ . '/config.php');

$edit_css = 'edit.css';
$title = 'Insert Page';
include 'header.php';

if (empty($_SESSION['userId'])) {
  header('Location: ' . SITE_LOGIN);
  exit;
}

$pdo = getPdo();

$stepTitle = $_SESSION['stepTitle'] ?? '';
$stepDetail = $_SESSION['stepDetail'] ?? '';
$stepRemark = $_SESSION['stepRemark'] ?? '';

?>

        <form action="insertConfirm.php" method="post">
          <table>
            <tr>
              <th>手順</th>
              <th>詳細</th>
              <th>備考</th>
            </tr>

            <td>
              <input type="text" name="stepTitle" value="<?= htmlspecialchars($stepTitle, ENT_QUOTES); ?>">
            </td>
            <td>
              <textarea name="stepDetail"><?= htmlspecialchars($stepDetail, ENT_QUOTES); ?></textarea>
            </td>
            <td>
              <textarea name="stepRemark"><?= htmlspecialchars($stepRemark, ENT_QUOTES); ?></textarea>
            </td>

          </table>

          <a href="index.php">戻る</a>
          <button type="submit">内容を確認する</button>
        </form>
      </div>
    </main>

  <script src="validation.js"></script>
  </body>

</html>