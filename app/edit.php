<?php
require(__DIR__ . '/config.php');

$edit_css = 'edit.css';
$title = 'Edit Page';
$h1 = "手順の編集";
include 'header.php';

if (empty($_SESSION['userId'])) {
  header("Location: " . SITE_LOGIN);
  exit;
}

$pdo = getPdo();

$token = createToken();
$_SESSION['token'] = $token;

$stepOrder = filter_input(INPUT_POST, 'stepOrder');

$sql = "SELECT * FROM steps WHERE step_order = :stepOrder";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':stepOrder', $stepOrder);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) { 
  exit("Data is not found.");
}

?>

          <form action="editConfirm.php" method="post">
            <table>
              <tr>
                <th>No.</th>
                <th>手順</th>
                <th>詳細</th>
                <th>備考</th>
              </tr>

              <td>
                <label for="stepOrder">
                  <input type="text" id="stepOrder" name="stepOrder" value="<?= htmlspecialchars($result['step_order'], ENT_QUOTES); ?>">
                </label>
              </td>
              <td>
                <label for="stepTitle">
                  <input type="text" id="stepTitle" name="stepTitle" value="<?= htmlspecialchars($result['step_title'], ENT_QUOTES); ?>">
                </label>
              </td>
              <td>
                <label for="stepDetail">
                  <textarea name="stepDetail" id="stepDetail"><?= htmlspecialchars($result['step_detail'] ?? '', ENT_QUOTES); ?></textarea>
                </label>
              </td>
              <td>
                <label for="stepRemark">
                  <textarea name="stepRemark" id="stepRemark"><?= htmlspecialchars($result['step_remark'] ?? '', ENT_QUOTES); ?></textarea>
                </label>
              </td>
            </table>

            <div class="transition-btn">
              <a href="index.php">戻る</a>
              <button type="submit">確認</button>
            </div>
          </form>
        </div>
      </main>
  </body>
</html>