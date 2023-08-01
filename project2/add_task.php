<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];
    $pdo = new PDO('mysql:host=localhost;dbname=todolistdb', 'root', '');

    $stmt = $pdo->prepare("INSERT INTO tasks (task, completed) VALUES (:task, 0)");
    $stmt->bindParam(':task', $task);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>