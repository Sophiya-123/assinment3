<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add SCP</title>
</head>
<body>
    <h1>Add New SCP</h1>
    <form action="create.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <label for="containment_procedures">Containment Procedures:</label>
        <textarea name="containment_procedures" required></textarea>
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" required>
        <button type="submit">Add SCP</button>
    </form>
    <a href="index.php">Back to List</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $containment_procedures = $_POST['containment_procedures'];
        $image_url = $_POST['image_url'];

        $stmt = $pdo->prepare("INSERT INTO scp_subjects (name, description, containment_procedures, image_url) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $containment_procedures, $image_url]);

        header("Location: index.php");
    }
    ?>
</body>
</html>
