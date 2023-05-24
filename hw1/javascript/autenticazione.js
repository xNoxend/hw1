// Funzione di autenticazione per il login

function autenticazione(event) 
{     
  const username = form.username.value;   
  const password = form.password.value;

  // Verifica se tutti i campi sono riempiti
  if (username.length == 0 || password.length == 0) 
    {
      alert("Compilare tutti i campi.");
      console.log("Compilare tutti i campi.");
      event.preventDefault();
      return;
    }
}

// Riferimento al form
const form = document.forms['nome_form'];
// Aggiungi listener
form.addEventListener("submit", autenticazione);