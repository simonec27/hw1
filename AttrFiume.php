
    <?php
require_once('auth.php');

header('Content-Type: application/json');

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

$query = "SELECT * FROM contenuto WHERE Tipologia = 'fiume'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($res) > 0) {

            $annunci = [];
            
           while($row = mysqli_fetch_assoc($res)){
            $annunci[] = [
                'id' => $row['id'],
                'NomeAttrazione' => $row['NomeAttrazione'],
                'user_id' => $row['user_id'],
                'Città' => $row['Città'],
                'Tipologia' => $row['Tipologia'],
                'copertina' => $row['copertina']
            ];
            }
            
        }

        mysqli_close($conn);

      
        echo json_encode($annunci);
?>

<?php ?>
