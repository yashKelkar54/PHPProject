<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=todolistdb', 'root', '');
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $task = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
    exit();
}
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






<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="edit_task.php" method="post">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <input type="text" name="task" value="<?php echo $task['task']; ?>" required>
            <button type="submit">Update Task</button>
        </form>
        <a href="index.php">Cancel</a>
    </div>
</body>
</html>