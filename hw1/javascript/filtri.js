const azzeraFiltriButton = document.getElementById('azzera-filtri');
const filtriRadio = document.querySelectorAll('input[type="radio"]');

azzeraFiltriButton.addEventListener('click', () => 
{
  filtriRadio.forEach(filtro => 
    {
        filtro.checked = false;
    });
});
