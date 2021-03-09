<?php
// dove si trova server,user password si vedono da mamp open webstart page, nome del databse che ci serve
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_hotel";


// Connect php chiama server e database e da questo momento si possono fare query in php
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection controlla che la chiamata sia andata a buon fine
if ($conn && $conn->connect_error) {
echo "Connection failed: " . $conn->connect_error;
} else {
  echo "Connection done";
}

echo "<br>";

// esegue la query e la incapsula dentro result,result é un oggetto che si puó navigare e se il risultato esiste e non e false o null e se il numero di righe
// é maggiore di 0 (num_rows > 0 é un attributo dell'oggetto) con while dico fintanto che dentro result esiste un elemento della lista (fetch_assoc() funzione che restituisce lista)

$sql = "SELECT room_number, floor FROM stanze";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor'] . '<br/>';
}
} elseif ($result) {
echo "0 results";
} else {
echo "query error";
}
$conn->close();
 ?>
