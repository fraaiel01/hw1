const form = document.querySelector("#form");
form.querySelector("#ricerca").addEventListener("click", ricerca);
form.addEventListener("submit", checkSubmit);

let contenuto;

function onJson(json) {
  
    document.querySelector("#invio1").classList.remove('hidden');
    document.querySelector("#invio2").classList.remove('hidden');

    console.log(json);
    const immagine = document.querySelector("#risposta");
    immagine.innerHTML = "";
    const img = document.createElement("img");
    img.classList.add('risultato');
    img.src = json.url;
    immagine.appendChild(img);
    contenuto = img.src;
    console.log(contenuto);
}

function onResponse(response) {
    console.log("Risposta ricevuta");
    return response.json();
}

function ricerca(event) {
  event.preventDefault();
  fetch("fetch_api.php").then(onResponse).then(onJson);
}

function checkSubmit(event) {  
  let descr = form.querySelector('#commento').value;

  if (contenuto !== undefined){
    fetch("caricamento_duck.php?duck="+encodeURIComponent(contenuto)+"&descrizione="+encodeURIComponent(descr));
    event.preventDefault();
    window.location.reload();
    
    }else{
      event.preventDefault();
      const error = "Nessuna immagine scelta, scegline una!";
      const element = document.createElement("div");
      element.innerText = error;
      element.classList.add("errore");
      if (event.currentTarget.querySelector(".errore") === null)
        event.currentTarget.appendChild(element);
  }
}

//STAMPO POST
fetch("stampa_duck.php").then(onResponse).then(jsonCheckPost);

function jsonCheckPost(json){
    console.log(json);
    const res = document.querySelector('#risposta2');
    for(let i of json){

        const riquadro = document.createElement('div');
        riquadro.classList.add('riquadro1');

        const utente = document.createElement('div');
        utente.classList.add('user');
        utente.textContent = i.user;

        const descrizione1 = document.createElement('div');
        descrizione1.classList.add('testo');
        descrizione1.textContent = i.content.descrizione;

        const img = document.createElement("img");
        img.classList.add('img_caricata');
        img.src = i.content.url;

        riquadro.appendChild(utente);
        riquadro.appendChild(descrizione1);
        riquadro.appendChild(img);
        res.appendChild(riquadro);
    }
}