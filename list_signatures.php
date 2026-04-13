<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "signature");

// Fetch all saved signatures
$result = $mysqli->query("SELECT * FROM sign_list");

echo "<h1>Saved Signatures Testt</h1>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Signature</th><th>Created At</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td><img src='{$row['signature']}' alt='Signature' width='200'></td>";
    echo "<td>{$row['created_at']}</td>";
    echo "</tr>";
}

echo "</table>";

$mysqli->close();

?>
