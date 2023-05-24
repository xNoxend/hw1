function onResponse(response) 
{
  return response.json();
}
  
//CARICO I PREFERITI

function onJson(json) 
{
  let prodotti = document.querySelector('#preferiti');
  prodotti.innerHTML = '';
  for (let i = 0; i < json.length; i++) 
  {
    const prodotto = document.createElement('div');
    let titolo = document.createElement('h1');
    let img = document.createElement('img');
    img.classList.add('productImg');
    let favorite_icon = document.createElement('a');
    favorite_icon.classList.add('favorites-icon');
    favorite_icon.addEventListener('click', function() 
    {
      aggiungiORimuoviPref(this);
    });
    let cuore = document.createElement('img');
    cuore.src = '../images/cuorevuoto.png';
    cuore.alt = 'Favorites Icon';
    cuore.classList.add('empty');
    let cuore_pieno = document.createElement('img');
    cuore_pieno.src = '../images/cuorepieno.png';
    cuore_pieno.alt = 'Favorites Icon';
    cuore_pieno.classList.add('preferito');
    favorite_icon.appendChild(cuore);
    favorite_icon.appendChild(cuore_pieno);
    img.src = json[i].img;
    titolo.textContent = json[i].product;
    let prezzo = document.createElement('p');
    prezzo.textContent = json[i].price + '€'; 
    let link_esterno = document.createElement('a');
    link_esterno.classList.add('link_esterno');
    link_esterno.textContent = 'Acquista\n';
    link_esterno.addEventListener('click', function () 
    {
      window.open(json[i].link,"_blank");
    });     
    let categoria = json[i].category; //Variabile per i filtri
    let riquadro = document.createElement('div');
    riquadro.classList.add('riquadro');
    prodotto.appendChild(riquadro);
    prodotto.classList.add('prodotto');
    prodotto.id = json[i].id;
    prodotto.appendChild(img);
    prodotto.appendChild(favorite_icon);
    prodotto.appendChild(titolo);
    prodotto.appendChild(prezzo);
    prodotto.appendChild(link_esterno);
    prodotto.dataset.categoria = categoria; //Variabile per i filtri
    prodotti.appendChild(prodotto);
  }
}

fetch('./caricaPreferiti.php').then(onResponse).then(onJson);



// AGGIUNGI O RIMUOVI PREFERITI

function aggiungiORimuoviPref(icon) 
{
  const productId = icon.parentNode.id; // ID del prodotto associato all'icona
  const cuorepieno = icon.querySelector('.preferito');
  
  fetch('./aggiungiORimuoviPreferiti.php?id_prodotto=' + productId)
    .then(response => response.text())
    .then(data => 
    {
      if (data === 'Aggiunto') 
      {
        console.log('Prodotto aggiunto ai preferiti');
        cuorepieno.style.display = 'block';
      } 
      else if (data === 'Rimosso') 
      {
        console.log('Prodotto rimosso dai preferiti');
        cuorepieno.style.display = 'none';
      } 
      else 
      {
        cconsole.log('Errore: ' + data);
        Swal.fire({
          title: 'Errore',
          text: 'Si è verificato un errore durante l\'aggiunta o la rimozione del prodotto dai preferiti.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }

      mantieniPreferiti(); // Aggiorna i prodotti preferiti dopo l'aggiunta o la rimozione
    })
    .catch(error => {
      console.log('Errore nella richiesta:', error);
      Swal.fire({
        title: 'Errore',
        text: 'Si è verificato un errore durante la richiesta.',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    });
}

function mantieniPreferiti() 
{
  fetch('./mantieniPreferiti.php')
    .then(response => response.json())
    .then(data => 
    {
      const preferiti = data;
      console.log(preferiti);

      const prodotti = document.querySelectorAll('.prodotto');
      prodotti.forEach(prodotto => 
      {
        const idProdotto = prodotto.id;
        const iconaPreferito = prodotto.querySelector('.preferito');

        if (preferiti.includes(idProdotto)) 
        {
          iconaPreferito.style.display = 'block';
        } 
        else 
        {
          iconaPreferito.style.display = 'none';
        }
      });
    })
    .catch(error => 
    {
      console.log('Errore nella richiesta:', error);
    });
}

window.addEventListener('load', function() 
{
  mantieniPreferiti();
});


const azzeraFiltriButton = document.getElementById('azzera-filtri');
const filtriRadio = document.querySelectorAll('input[type="radio"]');

azzeraFiltriButton.addEventListener('click', () => 
{
  filtriRadio.forEach(filtro => 
  {
    filtro.checked = false;
  });

  // Rimuovi la classe "hidden" da tutti i prodotti
  const prodotti = document.querySelectorAll('.prodotto');
  prodotti.forEach(prodotto => 
  {
    prodotto.classList.remove('hidden');
  });
});



function filtraProdotti() 
{
  const radioInputs = document.querySelector('input[type="radio"]:checked');
  const selectedValues = radioInputs.value;
  const prodotti = document.querySelectorAll('.prodotto');

  prodotti.forEach(prodotto => 
  {
    const categoriaProdotto = prodotto.dataset.categoria;

    if (selectedValues.includes(categoriaProdotto)) 
    {
      prodotto.classList.remove('hidden');
    } 
    else
    {
      prodotto.classList.add('hidden');
    }
  });
 
}

filtriRadio.forEach(filtro => 
{
  filtro.addEventListener('change', function() 
  {
    filtraProdotti();
    mantieniPreferiti();
  });
});


