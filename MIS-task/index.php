<?php
session_start();
	include_once('config.php');
if (!isset($_SESSION["is_auth"])) {

    header("location: adminlogin.php");

    exit;

}



    

?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>CRUD</title>
		        
		       <link href="css/bootstrap.min.css" rel="stylesheet">
		        
		        <script src="js/bootstrap.js"></script>
			
			
		</head>

		<body>
			
			<div class="container">
			<div class="row">
			<h1>CRUD</h1>
			</div>
			<div class="row">
			<a href="create.php" class="btn btn-success">Create</a>
			 <a href="logout.php" class="btn btn-success " align="center">LOGOUT</a>
			<div class="table-responsive">
			<table class="table table-hover table-bordered">
			<thead>
			<tr>
			<th>MOBLIE BREND NAME</th>
			<th> MODEL </th>
			<th>PURCHASING PRICE</th>
			<th>SELLING PRICE</th>
			<th>IMAGE</th>
			<th>DATE OF ENTRY</th>
			<th>DISCRIPTION</th>
			<th colspan="3">SELECT 


			</th>

			</thead>

		
		  <?php
	                        include 'database.php'; 
	                        $pdo = Database::connect(); 
	                        $sql = 'SELECT * FROM entry ORDER BY e_id DESC '; 
	                        foreach ($pdo->query($sql) as $row) {
	                            echo '
	<tr>';
	                            echo'
	<td>' . $row['brend_name'] . '</td>
	';
	                            echo'
	<td>' . $row['model_no'] . '</td>
	';
	                            echo'
	<td>' . $row['purchased_price'] . '</td>
	';
	                            echo'
	<td>' . $row['selling_price'] . '</td>
	';
	                            
	                            echo'
	<td>' . $row['image'] . '</td>
	';
	                            echo'
	<td>' . $row['date_entry'] . '</td>
	';
	                            echo'
	<td>' . $row['Discription'] . '</td>
	';


	                            echo '

	<td>';
	                            echo '<a class="btn btn-success" href="read.php?e_id=' . $row['e_id'] . '">Read</a>';
	                            echo '</td>
	';
	                            echo '
	<td>';
	                            echo '<a class="btn btn-success" href="update.php?e_id=' . $row['e_id'] . '">Update</a>';
	                            echo '</td>
	';
	                            echo'
	<td>';
	                            echo '<a class="btn btn-danger" href="delete.php?e_id=' . $row['e_id'] . ' ">Delete</a>';
	                            echo '</td>
	';
	                            echo '</tr>
	';
	                        }
	                                                Database::disconnect(); 
	                        ;
	                        ?>    
	</tbody>
		</table>
		</div>
		</div>
		</div>

		



			
		</body>
		</html>
