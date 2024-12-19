
<?php
$servername = "localhost";
$username = "kirkpagaspas";
$password = "kirkpagaspas";
$dbname = "empowering_vet_clinic"; // Change this if your database name is different

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
