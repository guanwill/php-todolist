<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<body>

    <div class="wrap">

      <h1>My To Do List</h1>
      <!-- TO DO LIST -->
      <div class="task-list">
        <ul>
          <?php require("app/connect.php");

          $query = mysql_query("SELECT * FROM tasks ORDER BY date ASC");

          if($query) {
            $numrows = mysql_num_rows($query);
          }
          else {
            die(mysql_error());
          }

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

    delete_task(); // Call the delete_task function

    function delete_task() {
      $('.delete-button').click(function(){
        var current_element = $(this);
        var id = $(this).attr('id');

        $.post('app/delete-task.php', { task_id: id }, function() {
          current_element.parent().fadeOut("fast", function() { $(this).remove(); });
        });
      });
    }

</script>

</html>
