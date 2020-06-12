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
      <label for="id">Enter ID to modify: </label>
      <input type="number" name="id"><br>
      <label for="name">New name: </label>
      <input type="text" name="name"><br>
      <label for="category">New category: </label>
      <input type="text" name="category"><br><br>
      <button type="submit" form="myForm" value="Submit" name="add">Modify Item</button>
   </form>

   <?php
      if(isset($_POST['add'])) {
         $conn = mysqli_connect('127.0.0.1','root','', 'iwp');
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         $id = $_POST['id'];
         $name = $_POST['name'];
         $category = $_POST['category'];

         if($id!=''){

            if($name!=''){
               $sql = "UPDATE items SET name = '".$name."' WHERE items.id = ".$id;
               $retval = mysqli_query($conn, $sql);            
               if(! $retval ) {
                  die('Could not enter data: ' . mysqli_error($conn));
               }
               echo "Name modified successfully!!\n";
            } 
            if($category!=''){
               $sql = "UPDATE items SET category = '".$category."' WHERE items.id = ".$id;
               $retval = mysqli_query($conn, $sql);            
               if(! $retval ) {
                  die('Could not enter data: ' . mysqli_error($conn));
               }
               echo "Category modified successfully!!\n";
            }                       
            mysqli_close($conn);
         }
         else{
            echo '<span style="color: red;">Invalid data</span>';
         }
      }  
   ?>
</body>
</html>