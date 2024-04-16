<?php
// Datenbankverbindung herstellen
$servername = "localhost:3306";
$username = "sruff";
$password = "srufft";
$dbname = "Minecraft";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Bild aus der Datenbank abrufen (Annahme: Tabelle 'bilder' mit Spalte 'bild')
$sql = "SELECT skin FROM Skins WHERE id = 1"; // Annahme: Das Bild mit ID 1 wird abgerufen
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Bild im Browser anzeigen
    $row = $result->fetch_assoc();
    header("Content-Type: image/png"); // Annahme: Das Bild ist im PNG-Format
    echo $row['skin'];

    // Download-Option hinzufügen
    echo "<br><a href='download.php?id=1'>Bild herunterladen</a>"; // download.php wird verwendet, um das Bild herunterzuladen
} else {
    echo "0 Ergebnisse";
}

$conn->close();
?>
