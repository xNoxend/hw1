
const api_key = 'e97e5c5088cc2e8bed27e7c389f38972';
let request = 'http://api.mediastack.com/v1/news?languages=it&keywords=gaming-nvidia-amd-ryzen-rtx-gaming-gtx-ssd-&limit=12&access_key=' + api_key;

// Funzione per la ricerca
const searchInput = document.querySelector('#search-input');
const searchButton = document.querySelector('#search-button');

searchButton.addEventListener('click', function() 
{
  const searchTerm = searchInput.value.trim();
  if (searchTerm !== '') 
  {
    request = `http://api.mediastack.com/v1/news?languages=it&keywords=${searchTerm}&limit=12&access_key=${api_key}`;
    fetch(request).then(onResponse).then(onJson);
  }
});

function onResponse(response) 
{
  
  return response.json();
}


// Funzione per la visualizzazione dei risultati senza ricerca (default)
function onJson(json) 
{
  let articoli = document.querySelector('#news');
  articoli.innerHTML = '';
  for (let i = 0; i < 8; i++) 
  {
    const articolo = document.createElement('div');
    let titolo = document.createElement('h1');
    let link_esterno = document.createElement('a');
    let img = document.createElement('img');
    img.src = 'http://wallpaperaccess.com/full/2254977.jpg';
    titolo.textContent = json.data[i].title;
    link_esterno.textContent = 'Visita il sito e leggi la notizia\n';
    link_esterno.addEventListener('click', function () 
    {
      window.open(json.data[i].url);
    });
    articolo.classList.add('articolo');
    articolo.id = i;
    articolo.appendChild(img);
    articolo.appendChild(link_esterno);
    articolo.appendChild(titolo);
    articoli.appendChild(articolo);
  }
}

fetch(request).then(onResponse).then(onJson);


