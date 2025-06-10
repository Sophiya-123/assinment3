<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM scp_subjects WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
?>
