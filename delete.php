<!DOCTYPE html>
<head>
   <title>Inventory management system</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <nav>
      <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="view.php">View</a></li>
         <li><a href="create.php">Create</a></li>
         <li><a href="modify.php">Modify</a></li>
         <li><a href="delete.php">Delete</a></li>
         <li><a href="search.php">Search</a></li>
      </ul>
   </nav>
	<h1>Inventory management system</h1>

   <form method="POST" action="<?php $_PHP_SELF ?>" id="myForm">
      <label for="id">Enter ID to delete: </label>
      <input type="number" name="id"><br><br>
      <button type="submit" form="myForm" value="Submit" name="add">Delete Item</button>
   </form>

   <?php
      if(isset($_POST['add'])) {
            $conn = mysqli_connect('127.0.0.1','root','', 'iwp');
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            $id = $_POST['id'];

            if($id!=''){
               $sql = "DELETE FROM items WHERE items.id = ".$id;
               $retval = mysqli_query($conn, $sql);            
               if(! $retval ) {
                  die('Could not enter data: ' . mysqli_error($conn));
               }
               echo "Item deleted successfully!!\n";                     
               mysqli_close($conn);
            }
            else{
               echo '<span style="color: red;">Invalid data</span>';
            }
         }  
   ?>
</body>
</html>