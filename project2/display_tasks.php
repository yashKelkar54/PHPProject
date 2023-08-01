<?php
$pdo = new PDO('mysql:host=localhost;dbname=todolistdb', 'root', '');
$stmt = $pdo->prepare("SELECT * FROM tasks");
$stmt->execute();

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Tasks:</h2>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?php if ($task['completed']): ?>
                <del><?php echo $task['task']; ?></del>
            <?php else: ?>
                <?php echo $task['task']; ?>
            <?php endif; ?>
            <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
            <a href="mark_completed.php?id=<?php echo $task['id']; ?>">Mark Completed</a>
            <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>