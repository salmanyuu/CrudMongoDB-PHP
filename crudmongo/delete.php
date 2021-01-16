<?php

 session_start();
 require 'config.php';

 $delete = new MongoDB\Driver\BulkWrite();

 $delete->delete(['_id' => new MongoDB\BSON\ObjectId($_GET['id'])], ['limit'=>true]);
 $manager->executeBulkWrite("hddatabase.books", $delete);

 $_SESSION['success'] = "Book deleted successfully";
 header("Location: index.php");
 ?>
