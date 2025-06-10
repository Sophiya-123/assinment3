<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View SCP</title>
</head>
<body>
    <h1>SCP Details</h1>
    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM scp_subjects WHERE id = ?");
    $stmt->execute([$id]);
    $scp = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($scp) {
        echo "<h2>{$scp['name']}</h2>";
        echo "<p><strong>Description:</strong> {$scp['description']}</p>";
        echo "<p><strong>Containment Procedures:</strong> {$scp['containment_procedures']}</p>";
        echo "<p><strong>Image:</strong> <img src='{$scp['image_url']}' alt='{$scp['name']}' width='300'></p>";
    } else {
        echo "<p>SCP not found.</p>";
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
