<?php
  session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>aweu</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   </head>
   <body>

     <div class="container">
       <h1>Tutorial tes crud</h1>

       <a href="create.php" class="btn btn-success">Add Book</a>

       <?php
          if (isset($_SESSION['success'])) {
            echo "<div class = 'alert alert-success'>".$_SESSION['success']."</div>";
          }
        ?>

        <table class="table table-borderd">
          <tr>
            <th>NO</th>
            <th>_id</th>
            <th>Name</th>
            <th>Details</th>
            <th>Actions</th>
          </tr>
          <?php
            require 'config.php';
            $no = 0;
            $query = new MongoDB\Driver\Query([]);
            $books = $manager->executeQuery("hddatabase.books" , $query );

            foreach ($books as $books) {
              $no++;
              echo "<tr>";
              echo "<td>".$no."</td>";
              echo "<td>".$books->_id."</td>";
              echo "<td>".$books->name."</td>";
              echo "<td>".$books->detail."</td>";
              echo "<td>";
              echo "<a href='edit.php?id=".$books->_id."' class='btn btn-primary'>Edit</a>";
              echo "<a href='delete.php?id=".$books->_id."' class='btn btn-danger'>Delete</a>";
              echo "</td>";
              echo "</tr>";
            };
           ?>
        </table>

     </div>

   </body>
 </html>
