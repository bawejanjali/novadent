<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'signature';

// Connect to the database
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	
    $signature = $_POST['signature']; // Get the base64-encoded image data

    // Insert the signature into the database
    $stmt = $mysqli->prepare("INSERT INTO sign_list (signature) VALUES (?)");
    if ($stmt) {
        $stmt->bind_param("s", $signature);
        $stmt->execute();
        echo "Signature successfully saved!";
        $stmt->close();
    } else {
        echo "Failed to save the signature.";
    }
}

$mysqli->close();
?>
