<?php
require_once 'dbconfig.php';
require_once 'auth.php';

if (checkAuth()===0) {
    echo json_encode(['success' => false, 'message' => 'Utente non loggato']);
    exit;
}

$userId = checkAuth();

if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Nessun ID contenuto fornito']);
    exit;
}

$contentId = $_POST['id'];

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

$checkQuery = "SELECT id FROM preferiti WHERE utente_id = $userId AND annuncio_id = $contentId";
$res = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($res) > 0) {

    $deleteQuery = "DELETE FROM preferiti WHERE utente_id = $userId AND annuncio_id = $contentId";
    $newres = mysqli_query($conn, $deleteQuery);
    echo json_encode(['success' => true, 'message' => 'Preferito rimosso']);
} else {
    $insertQuery = "INSERT INTO preferiti (utente_id, annuncio_id) VALUES ($userId, $contentId)";
    $newres = mysqli_query($conn, $insertQuery);
    echo json_encode(['success' => true, 'message' => 'Preferito aggiunto']);
}
?>