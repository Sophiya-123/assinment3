<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update SCP</title>
</head>
<body>
    <h1>Update SCP</h1>
    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM scp_subjects WHERE id = ?");
    $stmt->execute([$id]);
    $scp = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="update.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $scp['name']; ?>" required>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $scp['description']; ?></textarea>
        <label for="containment_procedures">Containment Procedures:</label>
        <textarea name="containment_procedures" required><?php echo $scp['containment_procedures']; ?></textarea>
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" value="<?php echo $scp['image_url']; ?>" required>
        <button type="submit">Update SCP</button>
    </form>
    <a href="index.php">Back to List</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $containment_procedures = $_POST['containment_procedures'];
        $image_url = $_POST['image_url'];

        $stmt = $pdo->prepare("UPDATE scp_subjects SET name = ?, description = ?, containment_procedures = ?, image_url = ? WHERE id = ?");
        $stmt->execute([$name, $description, $containment_procedures, $image_url, $id]);

        header("Location: index.php");
    }
    ?>
</body>
</html>
