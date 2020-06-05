<?php
    
      define('Home', 'https://localhost/Todos/index.php' );

      require 'db.php';

      if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $query = 'SELECT * FROM todo WHERE id = '. $id ;

        $result = mysqli_query($conn , $query);

        $todo = mysqli_fetch_assoc($result);
      }
      
      if(isset($_GET['work'])) {
        $work = $_GET['work'];
        $query = 'UPDATE todo set work = "' . $work . '" WHERE id = ' . $_GET["id"]; 

        if (mysqli_query($conn , $query)) {
          header('Location: ' .Home.'');
          }
         else
          exit(mysqli_error($conn));
      }

      //im watching
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
    <nav class="navbar navbar-default bg-success text-white">
      <div class="container">
        <h1>Edit</h1>
        <a href="<?php echo Home; ?>" class="btn btn-info">Home</a>
      </div>
    </nav>
    <br>
      <div class="container col-md-8">
        <form class="input-group" method="GET" action="edit.php">
          <input type="hidden" name="id" value="<?= $_GET['edit'] ?>">
          <textarea class="input-group" name="work"><?= $todo['work']; ?></textarea>
           <input  class="btn btn-success" type="submit">
        </form>
      </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>