<!DOCTYPE html>
<html>
<head>
<title>Clock Example</title>
<title>Date</title>
    <title>Todo List Manager</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
<div id="clock"></div>
<div id="date"></div>
<script>

    function updateDate() {
        $.ajax({
            url: 'http://worldtimeapi.org/api/ip',
            dataType: 'json',
            success: function(data) {
                const dateTime = new Date(data.datetime);
                const year = dateTime.getFullYear();
                const month = (dateTime.getMonth() + 1).toString().padStart(2, '0');
                const day = dateTime.getDate().toString().padStart(2, '0');

                const dateText = `${year}-${month}-${day}`;
                document.getElementById('date').innerText = dateText;
                setTimeout(updateDate, 1000);
            },
            error: function() {
                document.getElementById('date').innerText = 'Error fetching date';
            }
        });
    }
    updateDate();


    function updateClock() {
        $.ajax({
            url: 'http://worldtimeapi.org/api/ip',
            dataType: 'json',
            success: function(data) {
                const dateTime = new Date(data.datetime);
                const hours = dateTime.getHours().toString().padStart(2, '0');
                const minutes = dateTime.getMinutes().toString().padStart(2, '0');
                const seconds = dateTime.getSeconds().toString().padStart(2, '0');

                const clockText = `${hours}:${minutes}:${seconds}`;
                document.getElementById('clock').innerText = clockText;

                setTimeout(updateClock, 1000);
            },
            error: function() {
                document.getElementById('clock').innerText = 'Error fetching time';
            }
        });
    }
    updateClock();
</script>
<h1>Todo List Manager</h1>
             <form action="add_task.php" method="post">
   <input type="text" name="task" placeholder="Enter a new task" required>
<button type="submit">Add Task</button>
        </form>
        <?php include 'display_tasks.php'; ?>
    </div>
</body>
</html>