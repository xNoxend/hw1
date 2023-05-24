


function registrazione(event) 
{
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$/;
  const password = form.password.value;
  const email = form.email.value;
  const username = form.username.value;   


  // Verifica se tutti i campi sono riempiti
  if (username.length == 0 ||
      email.length == 0 ||
      password.length == 0) 
    {
      Swal.fire
      ({
        title: 'Attenzione',
        text: 'Tutti i campi sono obbligatori.',
        icon: 'warning',
        confirmButtonText: 'OK'
      });
      event.preventDefault();
      return;
    }

  // Verifica se l'email soddisfa la struttura definita
  if (!emailRegex.test(email)) 
  {
    Swal.fire
    ({
      title: 'Attenzione',
      text: 'Inserire un indirizzo email valido.',
      icon: 'warning',
      confirmButtonText: 'OK'
    });  
      event.preventDefault();
      return;
  }

  // Verifica se la password soddisfa la struttura definita
  if (!passwordRegex.test(password)) 
  {
    Swal.fire
    ({
      title: 'Attenzione',
      text: 'La password deve avere almeno 8 caratteri, una lettera maiuscola, una lettera minuscola e un numero.',
      icon: 'warning',
      confirmButtonText: 'OK'
    });      
    event.preventDefault();
      return;
  }
}

// Riferimento al form
const form = document.forms['nome_form'];
// Aggiungi listener
form.addEventListener('submit', registrazione);
