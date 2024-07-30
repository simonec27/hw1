<?php 
  require_once 'auth.php';
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
  if ($userid = checkAuth()) {
    $userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT * FROM users WHERE id = $userid";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);
  }

  $id_prod = $_GET['id'];

  $sql = "SELECT c.NomeAttrazione, c.Città, c.copertina
      FROM contenuto c
      WHERE c.id = $id_prod";

  $result = mysqli_query($conn, $sql);

  $contenuto = null;
  $immagine=null;
  
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (!$contenuto) {
          $contenuto = [
          'NomeAttrazione' => $row['NomeAttrazione'],
          'Città' => $row['Città'],
          'copertina' => $row['copertina']
        ];
      }
      $immagine = $contenuto['copertina'];
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="content.css">

    <script src="content.js" defer></script>
    
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

    <div class="contenutoannuncio">

      <div class="descr_annuncio">
        <h1 class="intbanner">
            <?php echo $contenuto['NomeAttrazione']; ?>
            </h1>
        <h2 class="subintbanner"><?php echo $contenuto['Città']; ?></h2>
      </div>

    <div class="immagineannuncio">
          <?php
              echo "<img src='$immagine'>";
         ?>
         <div class="prenotaora">Prenota la tua vacanza da sogno, basta un click. <br>
         <a href="" class="yellow">Prenota ora</a>
         </div>
         
      </div>

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

</html>