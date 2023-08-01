<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['task'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $pdo = new PDO('mysql:host=localhost;dbname=todolist_db', 'your_username', 'your_password');

    $stmt = $pdo->prepare("UPDATE tasks SET task = :task WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':task', $task);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>