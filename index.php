<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>To Do</title>
    <link rel="stylesheet" href="css/main.css" media="screen" title="no title" charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  </head>
  <body>

    <div class = "list">
      <h1 class = "header"> To Do </h1>

      <ul class="items">
        <li>
          <span class="item">Shopping</span>
          <a class="done-button" href="#">Mark as Done</a>
        </li>
        <li>
          <span class="item done">Sleeping</span>
          <a href="#"></a>
        </li>
      </ul>

      <form class="item-add" action="add.php" method="post">
        <input type="text" name="name" value="" class="input" autocomplete="off" required>
        <input type="submit" name="name" value="ADD" class="submit">

      </form>

    </div>
  </body>
</html>
