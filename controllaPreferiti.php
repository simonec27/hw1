<?php
require_once "auth.php";

if(checkAuth()!=0){

    $user=checkAuth();

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    
    $query="SELECT * FROM preferiti where utente_id=$user";
    $res=mysqli_query($conn,$query);

    if (!$res) {
        die('Errore nella query: ' . mysqli_error($conn));
    }

    $preferiti = [];
    
    while ($row = mysqli_fetch_assoc($res)) {
    $preferiti[] = $row['annuncio_id'];
}

mysqli_close($conn);

echo json_encode($preferiti);
}

else{
    echo json_encode([]);
    exit;
}

?>