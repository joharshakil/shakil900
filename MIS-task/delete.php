<?php
session_start();
  include_once('config.php');
if (!isset($_SESSION["is_auth"])) {

    header("location: index.php");

    exit;

}

$query="delete from entry where e_id='".$_REQUEST['e_id']."'";
$res = $conn->query($query);



header("location:index.php");


?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    	<link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>

<div class="container">
     

<div class="span10 offset1">

<div class="row">

<h3>Delete a user</h3>

</div>

                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $e_id;?>"/>
                      
Are you sure to delete ?

<div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn btn-danger" href="index.php">No</a>
</div>

                    </form>
</div>

                 
</div>
<!-- /container -->
  </body>
</html>
