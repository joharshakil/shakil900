<?php
require('database.php'); 
$id = null;
if (!empty($_GET['e_id'])) {
    $id = $_REQUEST['e_id'];
}
if (null == $id) {
    header("location:index.php");
} else {
    
    $pdo = Database ::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
    $sql = "SELECT * FROM entry where e_id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}



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

<h3>Read</h3>

</div>



<div class="form-horizontal" >

<div class="control-group">
                        <label class="control-label">Brand Name</label>

<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['brend_name']; ?>
                            </label>
</div>

</div>


<div class="control-group">
                        <label class="control-label">Model No</label>

<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['model_no']; ?>
                            </label>
</div>

</div>


<div class="control-group">
                        <label class="control-label">Purchase Price</label>

<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['purchased_price']; ?>
                            </label>
</div>

</div>


<div class="control-group">
                        <label class="control-label">Selling Price</label>

<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['selling_price']; ?>
                            </label>
</div>

</div>


<div class="control-group">
                        <label class="control-label">Image</label>

<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['image']; ?>
                            </label>
</div>

</div>


<div class="control-group">
                        <label class="control-label">Date</label>

<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['date_entry']; ?>
                            </label>
</div>

</div>





<div class="control-group">
                        <label class="control-label">Discription</label>

<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Discription']; ?>
                            </label>
</div>

</div>


<div class="form-actions">
                        <a class="btn btn-success" href="index.php">Back</a>
</div>



</div>

</div>


</div>
<!-- /container -->
    </body>
</html>