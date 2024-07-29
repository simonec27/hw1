<?php 
  require_once 'auth.php';
  if ($userid = checkAuth()) {
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $userid = mysqli_real_escape_string($conn, $userid);
    $queryUtente = "SELECT * FROM users WHERE id = $userid";
    $res_utente = mysqli_query($conn, $queryUtente);
    $userinfo = mysqli_fetch_assoc($res_utente); 

    $queryPreferito = "SELECT c.NomeAttrazione, c.Città, c.copertina ,c.id
          FROM contenuto c
          JOIN preferiti p ON p.annuncio_id = c.id 
          WHERE p.utente_id = $userid";

    $resPreferito = mysqli_query($conn,$queryPreferito);
    
    $preferiti = [];
    
    while ($row = mysqli_fetch_assoc($resPreferito)) {
    $preferiti[] = $row;
    }

    mysqli_close($conn);

  }
  else {
    header('Location: home.php');
  exit;
  }
?>

<!DOCTYPE html>
<html>

<?php 
  
  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="preferiti.css">

    <script src="preferiti.js" defer></script>
    
    <link rel="icon" type="image/png" href="img/Tripadvisor_logoset_solid_green.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <title>Tripadvisor</title>
</head>

<body>
    <nav class="topnav">
        <a href="home.php" id="logotopnav">
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
            <a id="login" class="black">
                
                <?php 
                
                if ($userid = checkAuth()) {
                
                    echo $userinfo['username'];
                }else {

                    echo "Accedi";

                }
                ?>
                
                </a>
                
            <div id="profiloutente" class="hidden">
                
                <div class="inttendina">
                    <a href="preferiti.php">
                    Preferiti
                    </a>
                </div>
                
                <div class="inttendina">
                    <a href="logout.php" id="tendinautente" >
                        Logout
                    </a>
                </div>

            </div>
        </div>

    </nav>

    <main>

    <h1 class="intbanner">I tuoi preferiti</h1>

    <div class="contPreferiti">

    <?php if (count($preferiti) > 0){?>

    <?php for($i=0;$i<count($preferiti);$i++){ ?>
    
        <a href="content.php?id=<?php echo $preferiti[$i]['id']?>" class="preferito">
                
        <div>
            
        <div class="hidden">
        
            <?php echo $preferiti[$i]['id']?>
        
        </div>

            <img src="<?php echo $preferiti[$i]['copertina']?>">

            <h1 class="titoloPreferito">
                <?php echo $preferiti[$i]['NomeAttrazione']?>
        </h1>

        <h2 class="cittàPreferito">
        <?php echo $preferiti[$i]['Città']?>
        </h2>

        </div>

        <button class="removePref" data-id="<?php echo $preferiti[$i]['id']?>">
            Rimuovi dai preferiti
        </button>

        </a>
       
    <?php }?>


    <?php }
    else{?>

    <div class="contNoPref">
        <h2 class="noPref">Nessun preferito presente.</h2>
        <h3 class="subNoPref">Clicca sul cuore per salvare i tuoi annunci tra i preferiti.</h3>
    </div>

    <?php }?>

    </div>

    


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

</main>

</body>
