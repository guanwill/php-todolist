<html>
<head>
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <div class="wrap">

      <h1>hey</h1>
      <!-- TO DO LIST -->
      <div class="task-list">
        <ul>
          <?php require("app/connect.php");

          $query = mysql_query("SELECT * FROM tasks");

          if($query)
  $numrows = mysql_num_rows($query);
else
  die(mysql_error());
    // $numrows = mysql_num_rows($query);

    if($numrows>0){
  while( $row = mysql_fetch_assoc( $query ) ){

      $task_id = $row['id'];
      $task_name = $row['task'];

      echo '<li>
                    <span>'.$task_name.'</span>
        <img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg" />
     </li>';
  }
    }
?>




        </ul>
      </div>

      <!-- ADD NEW TO DO -->
      <form class="add-new-task" autocomplete="off">
        <input type="text" name="new-task" placeholder="Add a new item..." />
        <!-- <input type="submit" name="name" value="Submit"> -->
      </form>


    </div>

</body>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    add_task(); // Call the add_task function

    function add_task() {
        $('.add-new-task').submit(function(){
          var new_task = $('.add-new-task input[name=new-task]').val();

          if(new_task != ''){
            $.post('app/add-task.php', { task: new_task }, function( data ) {
              $('.add-new-task input[name=new-task]').val('');
              $(data).appendTo('.task-list ul').hide().fadeIn();
            });
          }
          return false; // Ensure that the form does not submit twice
        });
    }
</script>

</html>
