<?php
require(__DIR__ . '/config.php');

$edit_css = 'edit.css';
$title = 'Edit Page(confirm)';
include 'header.php';

$pdo = getPdo();

// // tokenチェック
// if (!isset($_POST{'token'}) || $_SESSION['token'] !== $_POST['token']) { } echo "不正なアクセスです。"; exit;

$token = createToken();
$_SESSION['token'] = $token;

$_SESSION['stepOrder'] = $_POST['stepOrder'];
$_SESSION['stepTitle'] = $_POST['stepTitle'];
$_SESSION['stepDetail'] = $_POST['stepDetail'];
$_SESSION['stepRemark'] = $_POST['stepRemark'];

?>

          <form action="editUpdate.php" method="post">
            <table>
              <tr>
                <th>No.</th>
                <th>手順</th>
                <th>詳細</th>
                <th>備考</th>
              </tr>
            
              <td>
                <input type="text" name="stepOrder" readonly value="<?= htmlspecialchars($_SESSION['stepOrder'], ENT_QUOTES); ?>">
              </td>
              <td>
                <input type="text" name="stepTitle" readonly value="<?= htmlspecialchars($_SESSION['stepTitle'], ENT_QUOTES); ?>">
              </td>
              <td>
                <textarea name="stepDetail" readonly><?= htmlspecialchars($_SESSION['stepDetail'] ?? '', ENT_QUOTES); ?></textarea>
              </td>
              <td>
                <textarea name="stepRemark" readonly><?= htmlspecialchars($_SESSION['stepRemark'] ?? '', ENT_QUOTES); ?></textarea>
              </td>
            </table>

            <div class="button">
              <a href="edit.php">戻る</a>
              <button type="submit">登録</button>
            </div>
          </form>
        </div>
      </main>
  </body>
</html>