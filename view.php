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

	<?php
            $conn = mysqli_connect('127.0.0.1','root','', 'iwp');
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
               $sql = "SELECT * FROM ITEMS";
               $retval = mysqli_query($conn, $sql);            
               if(! $retval ) {
                  die('No items found: ' . mysqli_error($conn));
               }
               echo '<table><tr><th>ID</th><th>NAME</th><th>CATEGORY</th></tr>';            
               while ($row=mysqli_fetch_row($retval))
               {
                  echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
               }
               echo '</table><br><br>';
               mysqli_free_result($retval);            
               mysqli_close($conn);
	?>
</body>
</html>
