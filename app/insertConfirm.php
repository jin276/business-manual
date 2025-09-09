<?php
require_once(__DIR__ . '/config.php');

$edit_css = 'edit.css';
$title = 'Insert Page(confirm)';
$h1 = "内容の確認";
include 'header.php';

if (empty($_SESSION['userId'])) {
  header('Location: ' . SITE_LOGIN);
  exit;
}

$pdo = getPdo();

// NULLだったら空
$_SESSION['stepTitle'] = $_POST['stepTitle'];
$_SESSION['stepDetail'] = $_POST['stepDetail'] ?? '';
$_SESSION['stepRemark'] = $_POST['stepRemark'] ?? '';

// $stepTitle = $_SESSION['stepTitle'];
// $stepDetail = $_SESSION['stepDetail'];
// $stepRemark = $_SESSION['stepRemark'];

?>
    
        <form action="insertUpdate.php" method="post">
          <table>
            <tr>
              <th>手順</th>
              <th>詳細</th>
              <th>備考</th>
            </tr>
            <td>
              <input type="text" name="stepTitle" readonly value="<?= htmlspecialchars($_SESSION['stepTitle'], ENT_QUOTES); ?>">
            </td>
            <td>
              <textarea name="stepDetail" readonly><?= htmlspecialchars($_SESSION['stepDetail'], ENT_QUOTES); ?></textarea>
            </td>
            <td>
              <textarea name="stepRemark" readonly><?= htmlspecialchars($_SESSION['stepRemark'], ENT_QUOTES); ?></textarea>
            </td>
          </table>

          <div id="insertError" class="hidden">
            <p>「手順」は必須項目です。</p>
          </div>

          <div class="transition-btn">
            <a href="index.php">戻る</a>
            <button type="submit" id="insertButton">手順を追加する</button>
          </div>
        </form>
      </div>
    </main>

  </body>
</html>