<?php
require_once(__DIR__ . '/config.php');

$pdo = getPdo();
$results = isNotNull($pdo);

if (empty($results)) {
  header("Location: http://localhost:8080/noRestoreData.php");
  exit;
}

// 共通部分
$edit_css = 'edit.css';
$modal_css = 'modal.css';
$title = 'Restore Page';
include 'header.php';

?>

<main>
    <div class="title">
      <h1>手順の復元</h1>
    </div>

    <?php foreach ($results as $result) { ?>
      <table>
        <tr>
          <th>No.</th>
          <th>手順</th>
          <th>詳細</th>
          <th>備考</th>
        </tr>
        <tr>
          <td>
            <?= hsc($result['step_order']); ?>
          </td>
          <td>
            <?= hsc($result['step_title']); ?>
          </td>
          <td>
            <?= textareaHsc($result['step_detail']); ?>
          </td>
          <td>
            <?= textareaHsc($result['step_remark']); ?>
          </td>
        </tr>
      </table>

      <div class="transition-btn">
        <a href="index.php">戻る</a>
        <button id="open-modal" class="hidden">手順を復元</button>
      </div>

      <!-- restore modal -->
      <div id="modal-container" class="hidden">
        <div class="confirm-text">
          <p>手順 「<?= htmlspecialchars($result['step_order'], ENT_QUOTES); ?>」を復元しますが、よろしいですか?</p>
        </div>

        <div class="confirm-button">
          <form action="restoreUpdate.php" method="post">
            <input type="hidden" name="stepOrder" value="<?= htmlspecialchars($result['step_order'], ENT_QUOTES); ?>">
            <button type="submit">はい</button>
          </form>
          <div id="modal-close">
            <button type="submit">戻る</button>
          </div>
        </div>
      </div>
    <?php } ?>

    <div id="mask" class="hidden"></div>
  </div>
</main>

<script src="modal.js"></script>
</body>
</html>
