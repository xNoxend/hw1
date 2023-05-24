// Funzione per mostrare la password o nasconderla

const eye = document.querySelector('.form_icon_pw');
const closedeye = document.querySelector('.hover_form');
const password = document.querySelector('.pw');
const pwForm = document.querySelector('.pw_form');

pwForm.addEventListener('click', () =>
{
  if (password.type === 'password') 
  {
    password.type = 'text';
    closedeye.style.display = 'block';
    eye.style.display = 'none';
  } else 
  {
    password.type = 'password';
    closedeye.style.display = 'none';
    eye.style.display = 'block';  
  }
});