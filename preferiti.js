function fResponse(response){
    console.log(response);
    return response;
  }
  
  function fError(error){
    console.log("Errore: ");
    return error;
  }

function rimuoviPreferiti(event){
    event.preventDefault();
    const tasto=event.target;
    idAnnuncio=tasto.dataset.id;
    console.log(idAnnuncio);

    const formData = new FormData();
    formData.append('id', idAnnuncio);
    
    fetch("gestionePreferiti.php", {method: 'post', body: formData}).then(fResponse, fError);
    tasto.parentElement.remove();

    const contPref=document.querySelector('.contPreferiti');

    if(contPref.textContent.trim() === ''){
        console.log("vuoto");
        const contNoPref=document.createElement('div');
        contNoPref.classList.add('contNoPref');
        contPref.appendChild(contNoPref);
        noPref=document.createElement('h2');
        noPref.classList.add('noPref');
        contNoPref.appendChild(noPref);
        noPref.textContent="Nessun preferito presente.";
        subNoPref=document.createElement('h3');
        subNoPref.classList.add('subNoPref');
        contNoPref.appendChild(subNoPref);
        subNoPref.textContent="Clicca sul cuore per salvare i tuoi annunci tra i preferiti.";
    }
    else{
        console.log("Non vuoto");
    }
  }
  
const tastiRimuovi=document.querySelectorAll('.removePref');
for(tasto of tastiRimuovi){
    tasto.addEventListener('click',rimuoviPreferiti);
}

  function checkSession() {
    return fetch('auth2.php')
        .then(response => response.text())
        .then(text => {
            
            if (text=== '0') {
              console.log("Nessuna Sessione");
                return false;
            } else {
              console.log("Sessione"+text);
                return true;
            }
        })
        .catch(() => {
            return false;
        });
  }
  
  
  function onLoginClick(event) {
    
    const altretendine=document.querySelectorAll('#tendinaAltro,#tendinaRecensioni,#tendinaScopri');
      for(let item of altretendine){
          item.classList.add('hidden');
      }
  
        checkSession().then(isLoggedIn => {
            if (isLoggedIn) {
                
                const opzioniutente = document.querySelector('#profiloutente');
                opzioniutente.classList.remove('hidden');
            } else {
                
                const modalsection = document.querySelector('#modalsection');
                modalsection.classList.remove('hidden');
                document.body.classList.add('noscroll');
            }
        }).catch(error => {
            console.error("Errore nella verifica della sessione:", error);
            
        });
        
    }
  
  const user = document.querySelector('#login.black');
  user.addEventListener('click', onLoginClick);
  
    function tendinaScopri(event) {
        const altretendine=document.querySelectorAll('#tendinaAltro,#tendinaRecensioni,#profiloutente');
        for(let item of altretendine){
            item.classList.add('hidden');
        }
        const tendina = document.querySelector('#tendinaScopri');
        if(!tendina.classList.contains('hidden')){
          tendina.classList.add('hidden');
        }else{
        tendina.classList.remove('hidden');
        }
        event.stopPropagation();
    }
    
    const clickscopri=document.querySelector('#scopri');
    clickscopri.addEventListener('click', tendinaScopri);
    
    function tendinaRecensioni(event) {
        const altretendine=document.querySelectorAll('#tendinaAltro,#tendinaScopri,#profiloutente');
        for(let item of altretendine){
            item.classList.add('hidden');
        }
        const tendina = document.querySelector('#tendinaRecensioni');
        if(!tendina.classList.contains('hidden')){
          tendina.classList.add('hidden');
        }else{
        tendina.classList.remove('hidden');
        }
        event.stopPropagation();
    }
    
    const clickrecensioni=document.querySelector('#recensioni');
    clickrecensioni.addEventListener('click', tendinaRecensioni);
    
    function tendinaAltro(event) {
        const altretendine=document.querySelectorAll('#tendinaRecensioni,#tendinaScopri,#profiloutente');
        for(let item of altretendine){
            item.classList.add('hidden');
        }
        const tendina = document.querySelector('#tendinaAltro');
        if(!tendina.classList.contains('hidden')){
          tendina.classList.add('hidden');
        }else{
        tendina.classList.remove('hidden');
        }
        event.stopPropagation();
    }
    
    const clickaltro=document.querySelector('#altro');
    clickaltro.addEventListener('click', tendinaAltro);
    
    function onbodyclick(event){
        const tendina=document.querySelectorAll('#tendinaAltro,#tendinaScopri,#tendinaRecensioni,#profiloutente');
        for(let item of tendina){
                item.classList.add('hidden');
        }
    }
    
    const main=document.querySelector('main');
    main.addEventListener('click',onbodyclick);
  
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