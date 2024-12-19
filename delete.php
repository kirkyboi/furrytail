
<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM pet_medical_records WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>