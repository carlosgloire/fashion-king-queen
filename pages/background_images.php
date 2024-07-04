<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion-style";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT photo FROM background_images"; // Assuming the column storing filenames is 'photo'
$result = $conn->query($sql);

$images = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = 'admin/background_images/' . $row['photo'];
    }
}

$conn->close();

echo json_encode($images);
?>
