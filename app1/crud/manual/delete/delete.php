<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();

$edit_css = 'edit.css';
$modal_css = 'modal.css';
$title = 'Delete Page';
include 'header.php';

$token = createToken();
$_SESSION['token'] = $token;

$stepOrder = filter_input(INPUT_POST, 'stepOrder');

$sql = "SELECT * FROM steps WHERE step_order = :stepOrder";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':stepOrder', $stepOrder);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($result)) { 
  exit("Data is not found.");
}

?>

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
                <input type="text" id="stepTitle" name="stepTitle" value="<?= htmlspecialchars($result['step_title']); ?>">
              </label>
            </td>
            <td>
              <label for="stepDetail">
                <textarea name="stepDetail" id="stepDetail"><?= htmlspecialchars($result['step_detail']); ?></textarea>
              </label>
            </td>
            <td>
              <label for="stepRemark">
                <textarea name="stepRemark" id="stepRemark"><?= htmlspecialchars($result['step_remark']); ?></textarea>
              </label>
            </td>
          </table>

          <div class="transition-btn">
            <a href="index.php">戻る</a>
            <button id="open-modal">手順を削除</button>
          </div>
        
          <!-- modal -->
          <div id="modal-container" class="hidden">
            <div class="confirm-text">
              <p>手順「<?= htmlspecialchars($result['step_order'], ENT_QUOTES); ?>」を削除しますが、本当によろしいですか？</p>
            </div>

            <div class="confirm-button">
              <form action="deleteUpdate.php" method="post">
                <input type="hidden" name="stepOrder" value="<?= htmlspecialchars($result['step_order'], ENT_QUOTES); ?>">
                <button type="submit">はい</button>
              </form>

              <!-- 画面遷移を無効 -->
              <div id="modal-close">
                <button type="button">戻る</button>
              </div>
            </div>
          </div>
          
          <div id="mask" class="hidden"></div>
        </div>
      </main>

    <script src="modal.js"></script>
  </body>
</html>