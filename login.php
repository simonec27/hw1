<?php
    include 'auth.php';
    if (checkAuth()) {
        header('Location: home.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT * FROM users WHERE username = '".$username."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {

                // Imposto una sessione dell'utente
                $_SESSION["_agora_username"] = $entry['username'];
                $_SESSION["_agora_user_id"] = $entry['id'];
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }else{
                $error = "Password errata.";
            }
        }else{
        $error = "Utente non trovato.";}
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="login.css">

    <script src="login.js" defer></script>

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
    </nav>

    <header>
            <h1 class="welcome">Accedi
            </h1>
</header>
<main class="login">
    <section class="main">
            <?php
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                
            ?>
            <form name='login' method='post'>
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                </div>
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI">
                    </div>
                </div>
            </form>
            <div class="signup"><h4>Non hai un account?</h4></div>
            <div class="signup-btn-container"><a class="signup-btn" href="signup.php">ISCRIVITI A TRIPADVISOR</a></div>
        </section>
    </main>

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