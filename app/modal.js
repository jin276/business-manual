'use strict';
{
  const openModal = document.getElementById('open-modal');
  const close = document.getElementById('modal-close');
  const modal = document.getElementById('modal-container');
  const mask = document.getElementById('mask');

  openModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
    mask.classList.remove('hidden');
  });

  close.addEventListener('click', () => {
    modal.classList.add('hidden');
    mask.classList.add('hidden');
  });

  mask.addEventListener('click', () => { 
    close.click();
  });
}