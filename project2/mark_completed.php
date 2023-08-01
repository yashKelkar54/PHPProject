<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=todolistdb', 'root', '');

    $stmt = $pdo->prepare("UPDATE tasks SET completed = 1 WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>