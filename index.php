<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="home.css">

    <script src="index.js" defer></script>

    <link rel="icon" type="image/png" href="img/Tripadvisor_logoset_solid_green.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <title>Tripadvisor</title>
</head>

<body>
    <nav class="topnav">
        <a href="index.php" id="logotopnav">
            <img src="img/TripAdvisor_Logo.svg">
        </a>

        <div class="centerfc">

            <a id="scopri" class="celleintestazione">Scopri</a>

            <div id="tendinaScopri"class="hidden">
                
                <div class="inttendina">
                    <a href="">
                        Travellers' choice
                    </a>
                </div>
                
                <div class="inttendina">
                    <a href="">
                        Storie di Viaggio
                    </a>
                </div>

            </div>

            <a id="viaggi" class="celleintestazione">Viaggi</a>

            <a id="recensioni" class="celleintestazione">Recensioni</a>

            <div id="tendinaRecensioni"class="hidden">
                
                <div class="inttendina">
                    <a href="">
                        Scrivi una recensione
                    </a>                   
                </div>
                
                <div class="inttendina">
                    <a href="">
                        Pubblica foto
                    </a>
                </div>

                <div class="inttendina">
                    <a href="">
                        Aggiungi un luogo
                    </a>
                </div>

            </div>

            <a id="altro" class="celleintestazione">Altro</a>

            <div id="tendinaAltro" class="hidden">
                
                <div class="inttendina">
                    <a href="">
                        Voli
                    </a>
                </div>
                
                <div class="inttendina">
                    <a href="">
                        Crociere
                    </a>
                </div>

                <div class="inttendina">
                    <a href="">
                        Autonoleggio
                    </a>                    
                </div>

                <div class="inttendina">
                    <a href="">
                        Forum
                    </a>
                </div>
            </div>
        </div>

        <div class="rightfc">
            <a id= "valuta" class="celleintestazione"> </a>
            <a id="login" class="black">Accedi</a>
        </div>

    </nav>

    <header>
            <h1 class="welcome">Dove vuoi andare?
            </h1>

        <nav class="tiporicerca">
            <a id="cercatutto" class="cellericerca bordocelle">
                <img src="img/casa.svg" class="iconeheader">
                Cerca tutto
            </a>

            <a id="hotel" class="cellericerca">
                <img src="img/hotel.svg" class="iconeheader">
                Hotel
            </a>

            <a id="attività" class="cellericerca">
                <img src="img/biglietto.svg" class="iconeheader">
                Attività
            </a>

            <a id="ristoranti" class="cellericerca">
                <img src="img/ristorante.svg" class="iconeheader">
                Ristoranti
            </a>

            <a id="casevacanza" class="cellericerca">
                <img src="img/casev.svg" class="iconeheader">
                Case vacanza
            </a>
        </nav>

        <form id="barraricerca">
            <a href="" id="lente">
                <img src="img/lente.svg">
            </a>

            <input type="text" placeholder="Luoghi da visitare, cose da fare, hotel...  (Inserire codice IATA)" class="rc">

            <input type="submit" value="Ricerca" id="ricerca">

        </form>

        <section id="library-view" class="hidden">
        </section>

    </header>

    <section class="fsection">
        <img src="img/fsection (1).jpg">
        <img src="img/fsection (2).jpg">
        <img src="img/fsection (3).jpg">
        <img src="img/fsection (4).jpg">

        <h1 class="sectiondesc">
            Idee last minute per le vacanze di Pasqua in famiglia
        </h1>

        <h2 class="subsectiondesc">
            C'è ancora tempo per scoprire questi luoghi, alloggi e tour eccezionali
        </h2>

        <a href="" class="sectionbutton">
            Dai un'occhiata
        </a>

    </section>

    <div class="bannerapp">
        <img src="img/caption.jpg" class="imgbanner">

        <div class="fullbanner">
            <div class="bannercontent">
                <h1 class="intbanner">
                    È ora di farvi un viaggetto.
                </h1>

                <h2 class="subintbanner">
                    Pianifica la tua meritata vacanza con la nostra app.
                </h2>
            </div>

            <div class="buttoncontainer">
                <a href="" class="bannerbutton">Scarica l'app</a>
            </div>
        </div>
    </div>

    <div class="titoloannunci">
        <h1 class="intbanner">
            Mete preferite per le vacanze di Pasqua
        </h1>

        <a href="" class="link">
            Vedi altro
        </a>
    </div>

    <div class="subtitoloannunci">
        <h2 class="subintbanner">
            Fiori, crociere fluviali, musei interattivi... arriva il divertimento formato famiglia
        </h2>
    </div>

    <div class="bannerannunci">

        <div class="annuncio">
            <div class="cornice">
                <img src="img/caption (1).jpg">
            </div>

            <h1 class="meta">
                Amsterdam, Paesi Bassi
            </h1>
        </div>

        <div class="annuncio">

            <div class="cornice">
                <img src="img/caption (2).jpg">
            </div>

            <h1 class="meta">
                Parigi, Francia
            </h1>

        </div>

        <div class="annuncio">

            <div class="cornice">
                <img src="img/caption (3).jpg">
            </div>

            <h1 class="meta">
                Londra, UK
            </h1>

        </div>

        <div class="annuncio">

            <div class="cornice">
                <img src="img/caption (4).jpg">
            </div>

            <h1 class="meta">
                Madeira, Portogallo
            </h1>

        </div>


        <div class="annuncio">

            <div class="cornice">
                <img src="img/caption (5).jpg">
            </div>

            <h1 class="meta">
                Barcellona, Spagna
            </h1>

        </div>

    </div>

    <div class="titoloannunci">
        <h1 class="intbanner">
            Potrebbero interessarti
        </h1>
    </div>

    <div class="subtitoloannunci">
        <h2 class="subintbanner">
            Altre attività a Santorini
        </h2>
    </div>

    <section id="modalsection" class="hidden">
        <div id="close">
            <a id="closebutton">
                x
            </a>
        </div>

        <section class="loginmod">
            <div id="modallogo">
                <img src="img/Tripadvisor_logoset_solid_green.svg">
            </div>

            <h1 id="hmodal">
                Accedi per scoprire il meglio di Tripadvisor.
            </h1>

            <a href="login.php" class="linklog">
                <img src="img/google.svg">
                Continua con Google
            </a>

            <a href="login.php" class="linklog">
                <img src="img/mail.svg">
                Continua con email
            </a>

            <footer id="modalfooter">
                <div class="final">
                    Continuando, accetti i Termini di utilizzo
                    e confermi di aver letto la Normativa sulla privacy e sull'uso dei cookie.
                </div>
                <div class="final">
                    Questo sito è protetto da reCAPTCHA e si applicano le Norme sulla
                    privacy e i Termini di servizio di Google.
                </div>
            </footer>
        </section>
    </section>

    <div class="bannerannunci">

        <div class="annuncio2">
            <div class="cornice">
                <img src="img/caption (6).jpg">
            </div>

            <a>
                <img src="img/heart_icon-icons.com_72328.png" class="cuore">
            </a>

            <h1 class="meta">
                Tour di mezza giornata a Caldera (vulcano, sorgenti termali, Therasia)
            </h1>
        </div>


        <div class="annuncio2">

            <div class="cornice">

                <img src="img/caption (7).jpg">

            </div>


            <a>
                <img src="img/heart_icon-icons.com_72328.png" class="cuore">
            </a>


            <h1 class="meta">

                Crociera delle Isole vulcaniche di Santorini con visita al Vulcano, alle sorgenti termali e all'isola
                di...

            </h1>

        </div>


        <div class="annuncio2">

            <div class="cornice">

                <img src="img/caption (8).jpg">

            </div>


            <a>

                <img src="img/heart_icon-icons.com_72328.png" class="cuore">

            </a>


            <h1 class="meta">

                Tour di un giorno a Santorini con tramonto su Oia

            </h1>

        </div>


        <div class="annuncio2">

            <div class="cornice">

                <img src="img/caption (9).jpg">

            </div>


            <a>

                <img src="img/heart_icon-icons.com_72328.png" class="cuore">

            </a>


            <h1 class="meta">

                Semi-privato standard | Crociera in catamarano a Santorini con buffet greco e bevande

            </h1>

        </div>


    </div>



    <div class="titoloannunci">

        <h1 class="intbanner">
            Rilassati durante una crociera turistica da favola
        </h1>

    </div>


    <div class="subtitoloannunci">

        <h2 class="subintbanner">

            Attraversa fiumi e canali iconici al tramonto oppure partecipa a una crociera per l'osservazione delle
            balene

        </h2>

    </div>


    <div class="bannerannunci">


        <div class="annuncio2">

            <div class="cornice">
                <img src="img/caption (10).jpg">

            </div>

            <a>
                <img src="img/heart_icon-icons.com_72328.png" class="cuore">

            </a>

            <h1 class="meta">

                Crociera in barca di lusso sul canale di Amsterdam con guida dal vivo e bar a bordo

            </h1>

            <h2 class="submeta">

                a partire da 20 € per adulto

            </h2>

        </div>


        <div class="annuncio2">

            <div class="cornice">

                <img src="img/caption (11).jpg">

            </div>

            <a>

                <img src="img/heart_icon-icons.com_72328.png" class="cuore">

            </a>

            <h1 class="meta">

                Venezia: Canal Grande in Gondola con commento

            </h1>

            <h2 class="submeta">

                a partire da 31 € per adulto

            </h2>

        </div>


        <div class="annuncio2">

            <div class="cornice">
                <img src="img/caption (12).jpg">
            </div>

            <a>

                <img src="img/heart_icon-icons.com_72328.png" class="cuore">

            </a>

            <h1 class="meta">
                Crociera sul fiume Senna Vedettes de Paris: biglietto elettronico con accesso diretto
            </h1>

            <h2 class="submeta">
                a partire da 20 € per adulto
            </h2>

        </div>


        <div class="annuncio2">

            <div class="cornice">
                <img src="img/caption (13).jpg">
            </div>

            <a>

                <img src="img/heart_icon-icons.com_72328.png" class="cuore">

            </a>

            <h1 class="meta">
                Crociera serale sul Danubio a Budapest organizzata da Legenda City Cruises
            </h1>

            <h2 class="submeta">
                a partire da 21 € per adulto
            </h2>

        </div>


    </div>


    <div class="bannerpref">

        <img src="img/caption.jpg" class="imgbanner">

        <div class="fullbanner">
            <div class="bannercontent">
                <h1 class="intbanner">
                    Vedi qualcosa che ti piace? Fai clic sul cuore per salvarlo
                </h1>

                <h2 class="subintbanner">
                    E vedi tutte le idee di viaggio salvate su una mappa
                </h2>
            </div>

            <div class="buttoncontainer">
                <a href="" class="bannerbutton">
                    Inizia subito
                </a>
            </div>
        </div>
    </div>

    <section class="fullhtml">
        <div class="titoloannunci">
            <h1 class="intbanner">
                Altro da esplorare</h1>
        </div>
        </h1>

        <div class="bannerannunci">
            <div class="annuncio3">
                <div class="cornice"><img src="img/caption (14).jpg">
                </div>
                <h1 class="meta">Barcellona: i posti perfetti per gustare le tapas</h1>
            </div>

            <div class="annuncio3">
                <div class="cornice"><img src="img/caption (15).jpg">
                </div>
                <h1 class="meta">Gli 11 posti migliori del mondo per osservare le stelle</h1>
            </div>

            <div class="annuncio3">
                <div class="cornice"><img src="img/caption (16).jpg">
                </div>
                <h1 class="meta">Hotel a Parigi con la vista migliore della Tour Eiffel</h1>
            </div>

        </div>
    </section>

    <section class="fullhtml2">
        <div class="fullhtml2content">
            <div class="fullhtml2p">
                <img src="img/TC_badge_yellow.svg">
                <h1 class="promo">Premi Travellers' Choice Best of the Best</h1>
                <h2 class="subpromo">Tra i luoghi, gli alloggi, i ristoranti e le esperienze migliori, pari all'1%,
                    scelti dai viaggiatori.</h2>
                <a href="" class="black">Vedi i vincitori</a>
            </div>

            <div class="bgend"><img src="img/3200x1800_idee_di_viaggio_primavera_hub-1.webp"></div>
        </div>
    </section>

    <footer id="primary">

        <div class="footcontainer">
            <div class="collegamentiend">
                <a class="first">Tripadvisor</a>
                <a href="" class="others">Chi siamo</a>
                <a href="" class="others">Stampa</a>
                <a href="" class="others">Risorse e normative</a>
                <a href="" class="others">Opportunità d'impiego</a>
                <a href="" class="others">Fiducia e sicurezza</a>
            </div>

            <div class="collegamentiend">
                <a class="first">Esplora</a>
                <a href="" class="others">Scrivi una recensione</a>
                <a href="" class="others">Aggiungilo</a>
                <a href="" class="others">Iscriviti </a>
                <a href="" class="others">Travellers' Choice</a>
                <a href="" class="others">Eco Leader</a>
            </div>

            <div class="collegamentiend">
                <a class="first">Esplora</a>
                <a href="" class="others">Proprietari</a>
                <a href="" class="others">Business Advantage</a>
                <a href="" class="others">Inserzioni sponsorizzate</a>
                <a href="" class="others">Pubblicità</a>
                <a href="" class="others">Accedi ai contenuti API</a>
            </div>

            <div class="collegamentiend">
                <a class="first">Siti di Tripadvisor</a>
                <a class="others">Prenota i ristoranti migliori con TheFork</a>
                <a class="others">Prenota biglietti per tour e attrazioni su Viator</a>
            </div>
        </div>

        <div class="fc2">
            <img src="img/Tripadvisor_logoset_solid_green.svg">

            <div class="linkfccontainer">
                <h2 class="hflex">© 2024 Tripadvisor LLC Tutti i diritti riservati.
                </h2>

                <div class="linkfc">
                    <a href="" class="others2">Termini di utilizzo</a>
                    <a href="" class="others2">Normativa sulla privacy e sui cookie</a>
                    <a href="" class="others2">Consenti i cookie</a>
                    <a href="" class="others2">Mappa del sito</a>
                    <a href="" class="others2">Uso del sito</a>
                    <a href="" class="others2">Contattaci</a>
                </div>
            </div>
        </div>

        <div class="finalfc">
            <div class="final">Questa è una versione del sito destinata in generale a
                chi parla Italiano in Italia. Se risiedi in un altro paese o in un'altra
                area geografica, seleziona la versione appropriata di Tripadvisor dal menu a discesa. Ulteriori
                informazion
            </div>

            <div class="logocontainer">

                <a href="https://www.instagram.com/tripadvisor/">
                    <img src="img/pngwing.com.png">
                </a>

                <a href="https://twitter.com/tripadvisorit">

                    <img src="img/pngwing.com (1).png">

                </a>

                <a href="https://www.facebook.com/Tripadvisor/">

                    <img src="img/Facebook_icon_(black).svg.png">

                </a>

            </div>

        </div>

    </footer>

</body>

</html>