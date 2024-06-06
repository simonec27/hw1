function onCuoreClick(event) {
    modalsection.classList.remove('hidden');
    document.body.classList.add('noscroll');
}

const cuori = document.querySelectorAll(".cuore");

cuori.forEach(cuore => {
    cuore.addEventListener('click', onCuoreClick);
})

const login = document.querySelector('#login.black');
login.addEventListener('click', onCuoreClick);

function onExternalClick(event) {  
    if (event.target == event.currentTarget) {
        document.body.classList.remove('noscroll');
        const modalsection = event.target;
        modalsection.classList.add('hidden');
    }
}

const sezioneesterna = document.querySelector('#modalsection');
sezioneesterna.addEventListener('click', onExternalClick);

function onXClick(event) {
    document.body.classList.remove('noscroll'); 
    const modalsection = document.querySelector('#modalsection');
    modalsection.classList.add('hidden');
}

const xinterna = document.querySelector('#closebutton');
xinterna.addEventListener('click', onXClick);

function tendinaScopri(event) {
    const altretendine=document.querySelectorAll('#tendinaAltro,#tendinaRecensioni');
    for(let item of altretendine){
        item.classList.add('hidden');
    }
    const tendina = document.querySelector('#tendinaScopri');
    tendina.classList.remove('hidden');
    event.stopPropagation();
}

const clickscopri=document.querySelector('#scopri');
clickscopri.addEventListener('click', tendinaScopri);

function tendinaRecensioni(event) {
    const altretendine=document.querySelectorAll('#tendinaAltro,#tendinaScopri');
    for(let item of altretendine){
        item.classList.add('hidden');
    }
    const tendina = document.querySelector('#tendinaRecensioni');
    tendina.classList.remove('hidden');
    event.stopPropagation();
}

const clickrecensioni=document.querySelector('#recensioni');
clickrecensioni.addEventListener('click', tendinaRecensioni);

function tendinaAltro(event) {
    const altretendine=document.querySelectorAll('#tendinaRecensioni,#tendinaScopri');
    for(let item of altretendine){
        item.classList.add('hidden');
    }
    const tendina = document.querySelector('#tendinaAltro');
    tendina.classList.remove('hidden');
    event.stopPropagation();
}

const clickaltro=document.querySelector('#altro');
clickaltro.addEventListener('click', tendinaAltro);

function onbodyclick(event){
    const tendina=document.querySelectorAll('#tendinaAltro,#tendinaScopri,#tendinaRecensioni');
    for(let item of tendina){
        if(item!=event.target){
            item.classList.add('hidden');
        }
    }
}

document.body.addEventListener('click',onbodyclick);

function inthotel(event){
    const int=document.createElement('h1');
    int.textContent='Prenota un soggiorno unico';
    int.classList.add('welcome2');
    const container = document.querySelector('.welcome');
    container.innerHTML = '';
    container.appendChild(int);
    const rc=document.querySelector('.rc');
    rc.placeholder='Nome hotel o destinazione  (Inserire codice IATA)';
}

const hotel=document.querySelector('#hotel');
hotel.addEventListener('click', inthotel);

function intattività(event){
    const int=document.createElement('h1');
    int.textContent='Dedicati a qualcosa di divertente';
    int.classList.add('welcome2');
    const container = document.querySelector('.welcome');
    container.innerHTML = '';
    container.appendChild(int);
    const rc=document.querySelector('.rc');
    rc.placeholder='Attrazione, attività o destinazione  (Inserire codice IATA)';
}

const attività=document.querySelector('#attività');
attività.addEventListener('click', intattività);

function intristoranti(event){
    const int=document.createElement('h1');
    int.textContent='Trova ristoranti';
    int.classList.add('welcome2');
    const container = document.querySelector('.welcome');
    container.innerHTML = '';
    container.appendChild(int);
    const rc=document.querySelector('.rc');
    rc.placeholder='Ristorante o destinazione  (Inserire codice IATA)';
}

const ristoranti=document.querySelector('#ristoranti');
ristoranti.addEventListener('click', intristoranti);

function intcasevacanza(event){
    const int=document.createElement('h1');
    int.textContent='Scopri alloggi in locazione';
    int.classList.add('welcome2');
    const container = document.querySelector('.welcome');
    container.innerHTML = '';
    container.appendChild(int);
    const rc=document.querySelector('.rc');
    rc.placeholder='Località  (Inserire codice IATA)';
}

const casevacanza=document.querySelector('#casevacanza');
casevacanza.addEventListener('click', intcasevacanza);

function intcercatutto(event){
    const int=document.createElement('h1');
    int.textContent='Dove vuoi andare?';
    int.classList.add('welcome2');
    const container = document.querySelector('.welcome');
    container.innerHTML = '';
    container.appendChild(int);
    const rc=document.querySelector('.rc');
    rc.placeholder='Luoghi da visitare, cose da fare, hotel...  (Inserire codice IATA)';
}

const cercatutto=document.querySelector('#cercatutto');
cercatutto.addEventListener('click', intcercatutto);

function transition(event){
    const newbannerimage=document.querySelectorAll('.imgbanner');
    for(let item of newbannerimage){
        item.src='img/borse-da-viaggio-orig.avif';
    }
}

const bannerimage=document.querySelectorAll('.imgbanner');
for(let item of bannerimage){
    item.addEventListener('click', transition);
}

function bordoOn(event){
    const celle= document.querySelectorAll('.cellericerca');
    for(let item of celle){
        item.classList.remove('bordocelle');
    }
    const selCella=event.currentTarget;
    selCella.classList.add('bordocelle');
    
}

const celle=document.querySelectorAll('.cellericerca');
for (let item of celle){
    item.addEventListener('click',bordoOn);
}

function onTkResponse(response) {
    console.log("Risposta tk ricevuta");
    return response.json();
  }
  
  function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
  
  function onJson(json){
    console.log('JSON ricevuto');
    const library = document.querySelector('#library-view');
    library.innerHTML='';
    library.classList.add('hidden');
    let num_results = json.meta.count;
    if(num_results > 5)
      num_results = 5;
  
    for(let i=0; i<num_results; i++)
    {
      const data = json.data[i];
      const nomeHotel=data.name;
      const hotel = document.createElement('div');
      const hotelimg=document.createElement('img');
      hotel.classList.add('hotel');
      hotelimg.src="img/hotel.svg";
      hotelimg.classList.add('iconarisultato');
      const nhcontainer=document.createElement('div');
      nhcontainer.classList.add('nhcontainer');
      nhcontainer.textContent=nomeHotel.toLowerCase();
      hotel.appendChild(hotelimg);
      hotel.appendChild(nhcontainer);
      library.appendChild(hotel);
      library.classList.remove('hidden');
    }
  }
  
  function onInput(event) {
  
    const city_input = document.querySelector('.rc');
    const city_value = encodeURIComponent(city_input.value);

    function onTkJson(json) {
      console.log("Token ricevuto: "+ json.access_token);
      console.log('Eseguo ricerca: ' + city_value);
      const access_token=json.access_token;
      rest_url="https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=" + city_value;
      console.log('URL: ' + rest_url);
  
      fetch(rest_url,
        {
          headers:
          {
            'Authorization': 'Bearer ' + access_token
          }
        }
      ).then(onResponse).then(onJson);
  
    }
  
    const client_id="BGK0FMrPMfksBjyC1WHcqaK6EyagghM4";
    const client_secret="0v6E8fEC654rvAJb";
  
    fetch("https://test.api.amadeus.com/v1/security/oauth2/token", 
      {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "grant_type=client_credentials&client_id=" + client_id + "&client_secret=" + client_secret,
      }
    ).then(onTkResponse).then(onTkJson);
}
  
  const form = document.querySelector('form');
  form.addEventListener('input', onInput);

  function onResponse2(response){
  console.log('Risposta ricevuta');
  return response.json();
}

function onJson2(json){
  const currency = json.currency.name;
  const tasto_valuta=document.querySelector('#valuta')
  tasto_valuta.textContent=currency;
}

const apiKey = '7a500ed22186ac7c4bae122da70f7c19f947b96898a90c3c74c9c65c';

fetch(`https://api.ipdata.co?api-key=${apiKey}`)
  .then(onResponse2).then(onJson2).catch(error => {
    console.error('Errore durante il recupero delle informazioni sull\'indirizzo IP:', error);
    }
  );