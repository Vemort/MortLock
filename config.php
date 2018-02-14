<?php
$servername = 'localhost';
$username = 'btclicki_gpuser';
$password = '1tq+,1CCIX$6';
$dbname = 'btclicki_gplocker';
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
