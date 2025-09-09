<?php
require_once(__DIR__ . '/config.php');

$scrollTop_css ="scrollTop.css";
$h1 = "PCキッティングマニュアル";
include 'header.php';

if (empty($_SESSION['userId'])) {
  header("Location: " . SITE_LOGIN);
  exit;
}

// createToken();

$pdo = getPdo();
$results = isNull($pdo);

$number = 1;
?>

        <div class="create-record">
          <form action="insertForm.php" method="post">
            <button type="submit">手順を追加</button>
          </form>
          <form action="restore.php" method="post">
            <button type="submit">削除した手順</button>
          </form>
        </div>

        <table>
          <tr>
            <th>No.</th>
            <th>手順</th>
            <th>詳細</th>
            <th>備考</th>
            <th></th>
            <th></th>
          </tr>

          <?php foreach ($results as $result) { ?>
            <tr>
              <td>
                <?= htmlspecialchars($number, ENT_QUOTES); ?>
                <?php $number++; ?>
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

              <td>
                <form action="edit.php" method="post">
                  <!-- どのレコードを編集するかを伝える必要があるのでidも送信 -->
                  <input type="hidden" name="stepOrder" value="<?= $result
                  ['step_order']; ?>">
                  
                  <button type="submit">編集</button>
                </form>
              </td>

              <td>
                <form action="delete.php" method="post">
                  <input type="hidden" name="stepOrder" value="<?= $result
                  ['step_order']; ?>">
                  
                  <button type="submit">削除</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </main>

    <footer>
      <div>
        <a href="#" class="pgTop">
          <div class="pgTop-arrow"></div>
        </a>
      </div>
    </footer>

    <script src="js/index.js"></script>
  </body>
</html>