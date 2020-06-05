<?php 
    
      define('Home', 'https://localhost/Todos/index.php' );
      define('Edit', 'https://localhost/Todos/edit.php');

      $conn = mysqli_connect('localhost' , 'root' , '' , 'todoblog');
//ok
       
     

      $query = 'SELECT * FROM todo  ' ;

      $result = mysqli_query($conn , $query);

      $todos = mysqli_fetch_all($result , MYSQLI_ASSOC); 

      if (isset($_GET['Submit'])) {
        $work = mysqli_real_escape_string($conn , $_GET['work']);
        $query =" INSERT INTO todo(work) VALUES ('$work') ";

        if (mysqli_query($conn , $query)) {
          header('Location: ' .Home.'');
        }
         else
          echo mysqli_error();;
      } 

      


      if (isset($_GET['delete'])) {
        echo "delete detected";
        //$delete_id = mysqli_real_escape_string($conn ,$_GET['id']);
        $query = "DELETE FROM todo WHERE id = " .$_GET['delete'];

        if(mysqli_query($conn, $query)){
      header('Location: '.Home.'');
          echo "string";
           } else {
      echo 'ERROR: '. mysqli_error($conn);
         }
      } 

      // if (filter_has_var(INPUT_GET , 'edit')) {
      //   $id = $_GET['edit'];
      //    header('Location: '.Edit.'');
      //   //echo "string";
      // }

      
      

 ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      #form{
        width: 70%;
        border-style: solid;
      }
    </style>

    <title>Todo's</title>
  </head>
  <body>
    <nav class="navbar navbar-default bg-success text-white">
      <div class="container">
        <h1>Todo's</h1>
      </div>
    </nav>
    <br>
    <div class="container col-md-8">
  
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="input-group">
                    <input type="text" name="work" class="form-control">
                    <input  class="btn btn-success" type="submit" name="Submit">
                </div>
                </form>
                <br> 
                
                <div class="input-group ">
                  <?php foreach($todos as $todo): ?>
                 <table class="table table-bordered table-striped">

                   <th><?php echo $todo['work']; ?>
                     <form method="GET" action="<?= $_SERVER['PHP_SELF']; ?>" >
                       <input type="hidden" name="delete" value="<?= $todo['id'] ?>">
                       <button class="btn btn-danger float-right">Delete</button>
                     </form>
                     <form method="GET" action="edit.php" >
                       <input type="hidden" name="edit" value="<?= $todo['id'] ?>">
                       <button class="btn btn-success float-right">Edit</button>
                     </form>
                   </th>
                   <?php endforeach; ?>
                 </table>
                </div>
               
              
            
    </div>
       
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>