<?php

 session_start();
 require 'config.php';

 $filter = ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])];
 $option = [];
 $query = new MongoDB\Driver\Query($filter, $option);
 $books = $manager->executeQuery("hddatabase.books", $query);
 foreach ($books as $books) {};

 if(isset($_POST['submit'])){

 // Menangkap data yang dikirim dari form dan proses Update
 $bulkWrite = new MongoDB\Driver\BulkWrite();
 $bulkWrite->update(
 ['_id'=>new MongoDB\BSON\ObjectID($_GET['id'])],
 ['$set'=>['name'=>$_POST['name'],'detail'=>$_POST['detail'],]]
 );

 // Proses update dan pengecekan hasil
 $result=$manager->executeBulkWrite("hddatabase.books",
$bulkWrite);

 if($result) {

 $_SESSION['success'] = "Book updated successfully";

 header("Location: index.php");
 }
 }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Tutor Euy</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   </head>
   <body>
     <div class="container">
       <h1>Create Book</h1>
       <a href="index.php" class="btn btn-primary">Back</a>

       <form method="post">
         <div class="form-group">
           <strong>Name : </strong>
           <input type="text" name="name" value="<?php echo $books->name; ?>" required="" class="form-control">
         </div>

         <div class="form">
           <strong>Detail : </strong>
           <textarea class="form-control" name="detail" placeholder="Detail"><?php echo $books->detail; ?></textarea>
         </div>

         <div class="form-group">
           <button type="submit" name="submit" class="btn btn-success">Submit</button>
         </div>
       </form>
     </div>
   </body>
 </html>
