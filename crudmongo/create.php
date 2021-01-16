<?php
    session_start();

    if (isset($_POST['submit'])) {
      require 'config.php';

      $bulkWrite = new MongoDB\Driver\BulkWrite;

      
      $bulkWrite -> insert(['name' => $_POST['name'], 'detail' => $_POST['detail']]);

      $manager->executeBulkWrite("hddatabase.books", $bulkWrite);

      $_SESSION['success'] = "Book created Successfully";
      header ("Location: index.php");
    }

 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>tutorial euy</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   </head>
   <body>
     <div class="container">
       <h1>Create Book</h1>
       <a href="index.php" class="btn btn-primary">Back</a>


       <form method="post">
         <div class="form-group">
           <strong>Name : </strong>
           <input type="text" name="name" required="" class="form-control" placeholder="Name">
         </div>

         <div class="form-group">
           <strong>Detail : </strong>
           <textarea name="detail" required="" class="form-control" placeholder="Detail">
           </textarea>
         </div>

         <div class="form-group">
           <button type="submit" name="submit" class="btn btn-success">Submit</button>

         </div>
       </form>
     </div>
   </body>
 </html>
