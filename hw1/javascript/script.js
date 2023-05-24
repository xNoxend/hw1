const accountIcon = document.querySelector('.account-icon');
const accountMenu = document.querySelector('.account-menu');

// Aggiungo l'event listener per aprire il menu quando si fa clic sull'icona
accountIcon.addEventListener('click', () => 
{
  if (accountMenu.style.display === 'block') 
  {
    accountMenu.style.display = 'none';
  } else {
    accountMenu.style.display = 'block';
  }
});

// Aggiungo un event listener all'intera pagina per chiudere il menu quando si fa clic ovunque sulla pagina, tranne sull'icona 
//dell'account
document.addEventListener('click', (event) => 
{
  if (!event.target.closest('.account-icon') && accountMenu.style.display === 'block') 
  {
    accountMenu.style.display = 'none';
  }
});
