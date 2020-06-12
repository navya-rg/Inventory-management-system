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
      <label for="query">Name/category: </label>
      <input type="text" name="query"><br><br>
      <button type="submit" form="myForm" value="Submit" name="add">Search</button>
   </form><br>

   <?php
      if(isset($_POST['add'])) {
         $conn = mysqli_connect('127.0.0.1','root','', 'iwp');
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         $query = $_POST['query'];

         if($query!=''){
            $found = true;
            $sql = "SELECT * FROM items WHERE items.category = '".$query."'";
            $retval = mysqli_query($conn, $sql);       
            if(mysqli_num_rows($retval)==0) {
               $sql = "SELECT * FROM items WHERE items.name = '$query'";
               $retval = mysqli_query($conn, $sql);
               if(! $retval ) {
                  $found = false;
                  echo 'No items found :(';
               }
            }
            if($found!=false){
               echo '<table><tr><th>ID</th><th>NAME</th><th>CATEGORY</th></tr>';            
               while ($row=mysqli_fetch_row($retval))
               {
                  echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
               }
               echo '</table>';
               mysqli_free_result($retval);  
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