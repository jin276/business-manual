'use strict';

// パスワード変更 新しいパス、確認用パスが同じか判定
{
  const button = document.querySelector('button');

  button.addEventListener('click', (e) => {
    const accountName = document.getElementById('accountName').value;
    const oldPassword = document.getElementById('oldPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const newPasswordLength = document.getElementById('newPassword').value.length;
    const confirmPasswordLength = document.getElementById('confirm Password').value.length;

    const passwordBlank = document.getElementById('passwordBlank');
    const passwordLength = document.getElementById('passwordLength');
    const passwordError = document.getElementById('passwordError');

    e.preventDefault();

    // 空欄チェック
    if (accountName == "" || oldPassword == "" || newPassword == confirmPassword == "") {

      passwordBlank.classList.remove('hidden');

      // 文字数チェック
      } else if (newPasswordLength < 3 || confirmPasswordLength < 3) { passwordLength.classList.remove('hidden');

      // 2つのパスワードが同じか判定
      } else if (newPassword !== confirmPassword) { 
        passwordError.classList.remove('hidden');
      } else {
        document.changePassword.submit();
      // return;
      }
  });
}