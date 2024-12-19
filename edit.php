
<?php
require 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];

    $stmt = $conn->prepare("UPDATE pet_medical_records SET pet_name = ?, owner_name = ?, diagnosis = ?, treatment = ? WHERE id = ?");
    $stmt->execute([$pet_name, $owner_name, $diagnosis, $treatment, $id]);

    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM pet_medical_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="edit.php?id=<?= $id ?>" method="POST" class="form">
    <h2>Edit Pet Record</h2>
    <link rel="stylesheet" href="style.css">
    <input type="text" name="pet_name" value="<?= $record['pet_name'] ?>" required>
    <input type="text" name="owner_name" value="<?= $record['owner_name'] ?>" required>
    <input type="text" name="diagnosis" value="<?= $record['diagnosis'] ?>" required>
    <input type="text" name="treatment" value="<?= $record['treatment'] ?>" required>
    <button type="submit" class="btn">Update</button>
</form>