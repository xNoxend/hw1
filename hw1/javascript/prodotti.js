function onResponse(response) 
{
  return response.json();
}

const searchInput = document.querySelector('#search-input');
const searchButton = document.querySelector('#search-button');

searchButton.addEventListener('click', function(event) 
{
  event.preventDefault();
  const searchTerm = searchInput.value.trim();
  if (searchTerm !== '') 
  {
    const request = `./searchProduct.php?keywords=${searchTerm}`;
    fetch(request).then(onResponse).then(onJson).then(() => 
    {
      mantieniPreferiti(); // Controllo dei preferiti dopo aver eseguito la ricerca
    })
  }
});


function onJson(json) 
{
  let prodotti = document.querySelector('#product');
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
    prodotti.appendChild(prodotto);
  }
}




// PRODOTTI IN EVIDENZA //


// PRODOTTO CENTRALE

function prodCentrale(json) 
{
    const prodotto = document.querySelector('#prodCentrale');
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
    img.src = json.img;
    titolo.textContent = json.product;
    let prezzo = document.createElement('p');
    prezzo.textContent = json.price + '€'; 
    let link_esterno = document.createElement('a');
    link_esterno.classList.add('link_esterno');
    link_esterno.textContent = 'Acquista\n';
    link_esterno.addEventListener('click', function () 
    {
      window.open(json.link,"_blank");
    });     
    let riquadro = document.createElement('div');
    riquadro.classList.add('riquadro');
    prodotto.appendChild(riquadro);
    prodotto.id = json.id;
    prodotto.appendChild(img);
    prodotto.appendChild(favorite_icon);
    prodotto.appendChild(titolo);
    prodotto.appendChild(prezzo);
    prodotto.appendChild(link_esterno);
}

fetch('./prodSingolo.php?id=29').then(onResponse).then(prodCentrale);


// PRODOTTO A SINISTRA

function prodS(json) 
{
    const prodotto = document.querySelector('#prodS');
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
    img.src = json.img;
    titolo.textContent = json.product;
    let prezzo = document.createElement('p');
    prezzo.textContent = json.price + '€'; 
    let link_esterno = document.createElement('a');
    link_esterno.classList.add('link_esterno');
    link_esterno.textContent = 'Acquista\n';
    link_esterno.addEventListener('click', function () 
    {
      window.open(json.link,"_blank");
    });     
    let riquadro = document.createElement('div');
    riquadro.classList.add('riquadro');
    prodotto.appendChild(riquadro);
    prodotto.id = json.id;
    prodotto.appendChild(img);
    prodotto.appendChild(favorite_icon);
    prodotto.appendChild(titolo);
    prodotto.appendChild(prezzo);
    prodotto.appendChild(link_esterno);
}

fetch('./prodSingolo.php?id=34').then(onResponse).then(prodS);


// PRODOTTO A DESTRA

function prodD(json) 
{
    const prodotto = document.querySelector('#prodD');
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
    img.src = json.img;
    titolo.textContent = json.product;
    let prezzo = document.createElement('p');
    prezzo.textContent = json.price + '€'; 
    let link_esterno = document.createElement('a');
    link_esterno.classList.add('link_esterno');
    link_esterno.textContent = 'Acquista\n';
    link_esterno.addEventListener('click', function () 
    {
      window.open(json.link,"_blank");
    });     
    let riquadro = document.createElement('div');
    riquadro.classList.add('riquadro');
    prodotto.appendChild(riquadro);
    prodotto.id = json.id;
    prodotto.appendChild(img);
    prodotto.appendChild(favorite_icon);
    prodotto.appendChild(titolo);
    prodotto.appendChild(prezzo);
    prodotto.appendChild(link_esterno);
}

fetch('./prodSingolo.php?id=35').then(onResponse).then(prodD);




// Funzione per gestire l'aggiunta o la rimozione di un prodotto dai preferiti
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
        text: 'Effettua il login per poterlo mettere nei preferiti.',
        icon: 'error',
        confirmButtonText: 'OK',
        footer: '<a class = "reindirizzamento" href="login.php">Login</a>'
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



