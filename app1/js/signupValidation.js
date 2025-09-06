'use strict';

{
// パスワード判定

  const signupButton = document.getElementById('signupButton');

  signupButton.addEventListener('click', (e) => {
    const name = document.getElementById('name').value;
    const nameKana = document.getElementById('name_kana').value;
    const email = document.getElementById('email').value;
    const userId = document.getElementById('userId').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    const passwordLength = document.getElementById('password').value.length;
    const confirmPasswordLength = document.getElementById('confirmPassword').value.length;

    const passwordBlank = document.getElementById('passwordBlank').value;
    const passwordLen = document.getElementById('passwordLen').value;
    const passwordError = document.getElementById('passwordError');
  
    e.preventDefault();
  
    // 空欄チェック
    if (name === "" || nameKana === "" || email === "" || userId === "" || password === "" || confirmPassword === "") {
      passwordBlank.classList.remove('hidden');

    // 文字数チェック
    } else if (passwordLength < 3 || confirmPasswordLength < 3) {
      passwordLen.classList.remove('hidden');

    // 2つのパスワードが同じか判定
    } else if (password !== confirmPassword) {
      passwordError.classList.remove('hidden');
    } else {
      document.changePassword.submit();
    }
  });
}