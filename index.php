
<?php
require 'db.php';

$stmt = $conn->prepare("SELECT * FROM pet_medical_records");
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Medical Records</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1 class="title">Pet Medical Records</h1>
    <a href="create.php" class="btn">Add New Record</a>
    <a href="index.html" class="btn">Back to HomePage</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pet Name</th>
                <th>Owner</th>
                <th>Diagnosis</th>
                <th>Treatment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= $record['id'] ?></td>
                    <td><?= $record['pet_name'] ?></td>
                    <td><?= $record['owner_name'] ?></td>
                    <td><?= $record['diagnosis'] ?></td>
                    <td><?= $record['treatment'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $record['id'] ?>" class="btn edit">Edit</a>
                        <button class="btn delete" onclick="confirmDelete(<?= $record['id'] ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `delete.php?id=${id}`;
                }
            })
        }
    </script>
</body>
</html>