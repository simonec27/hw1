<?php
    require_once 'auth.php';

    if (checkAuth()) {
        header("Location: home.php");
        exit;
    }   

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && 
        !empty($_POST["surname"]) && !empty($_POST["confirm_password"]) && !empty($_POST["allow"]))
    {
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 

        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }



        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["_agora_username"] = $_POST["username"];
                $_SESSION["_agora_user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>


<html>
    <head>
        <link rel='stylesheet' href='signup.css'>
        <script src='signup.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="img/Tripadvisor_logoset_solid_green.svg">
        <meta charset="utf-8">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

        <title>Tripadvisor - Registrazione</title>
    </head>
    <body>
    <nav class="topnav">
        <a href="home.php" id="logotopnav">
            <img src="img/TripAdvisor_Logo.svg">
        </a>
    </nav>

    <header>
            <h1 class="welcome">Registrati
            </h1>
        </header>
        <main>
        <section class="main_right">
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                       
                        <input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                        <div><img src="./img/close.svg"/><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                        <div><img src="./img/close.svg"/><span>Devi inserire il tuo cognome</span></div>
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    <div><img src="./img/close.svg"/><span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <div><img src="./img/close.svg"/><span>Indirizzo email non valido</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <div><img src="./img/close.svg"/><span>Inserisci almeno 8 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>>
                    <div><img src="./img/close.svg"/><span>Le password non coincidono</span></div>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                    <label for='allow'>Accetto i termini e condizioni d'uso di Tripadvisor.</label>
                </div>
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><img src='./img/close.svg'/><span>".$err."</span></div>";
                    }
                } ?>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="login.php">Accedi</a>
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