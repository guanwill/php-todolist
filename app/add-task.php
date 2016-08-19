<?php
    $task = strip_tags( $_POST['task'] ); //strip tags helps to remove code that may be added by a user attempting to hack your database.
    $date = date('Y-m-d'); // Today%u2019s date
    $time = date('H:i:s'); // Current time

    require("connect.php"); //we link to connect.php, so we can access the database and add the new values to the tasks table.

    mysql_query("INSERT INTO tasks VALUES ('', '$task', '$date')");

    $query = mysql_query("SELECT * FROM tasks WHERE task='$task' and date='$date'");

    while( $row = mysql_fetch_assoc($query) ){
      $task_id = $row['id'];
      $task_name = $row['task'];
    }

    mysql_close();

    echo '<li><span>'.$task_name.'</span><img id=""'.$task_id.'"" class="delete-button" width="10px" src="images/close.svg" /></li>';
?>
