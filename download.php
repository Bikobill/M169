<?php
// Datenbankverbindung herstellen
$servername = "localhost";
$username = "benutzername";
$password = "passwort";
$dbname = "datenbankname";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Bild aus der Datenbank abrufen und als Datei herunterladen
$sql = "SELECT bild FROM bilder WHERE id = " . $_GET['id']; // Annahme: 'id' wird über die URL übergeben
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    header("Content-type: image/png"); // Annahme: Das Bild ist im PNG-Format
    header("Content-Disposition: attachment; filename=bild.png"); // Dateiname für den Download
    echo $row['skin'];
} else {
    echo "Bild nicht gefunden";
}

$conn->close();
?>
