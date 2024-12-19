
<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];

    $stmt = $conn->prepare("INSERT INTO pet_medical_records (pet_name, owner_name, diagnosis, treatment) VALUES (?, ?, ?, ?)");
    $stmt->execute([$pet_name, $owner_name, $diagnosis, $treatment]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="create.php" method="POST" class="form">
       <center><h2>Add New Pet Record</h2></center>
        <input type="text" name="pet_name" placeholder="Pet Name" required>
        <input type="text" name="owner_name" placeholder="Owner Name" required>
        <input type="text" name="diagnosis" placeholder="Diagnosis" required>
        <input type="text" name="treatment" placeholder="Treatment" required>
        <button type="submit" class="btn">Submit</button>
    </form>
</body>
</html>
```
