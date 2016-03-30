	   <?php
          require 'database.php';
           
        if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){
    


       $nameError = '';
        $modelError='';
        $purchaseError='';
        $sellError ='';
        $imageError ='';
        $dateError='';
        $discriptiontError='';
       
        
      
        $brend_name = htmlentities(trim($_POST['brend_name']));
        $model_no=htmlentities(trim($_POST['model_no']));
        $purchased_price = htmlentities(trim($_POST['purchased_price']));
        $selling_price=htmlentities(trim($_POST['selling_price']));
        $image = htmlentities(trim($_POST['image']));      
        $date_entry=htmlentities(trim($_POST['date_entry']));
        $Discription=htmlentities(trim($_POST['Discription']));
        
    
        $valid = true;
        if (empty($brend_name)) {
            $nameError = 'Please enter BrendName';
            $valid = false;
        }else if (!preg_match("/^[a-zA-Z ]*$/",$brend_name)) {
            $nameError = "Only letters and white space allowed"; 
          }
        if(empty($model_no)){
            $firstnameError ='Please enter modelno';
            $valid= false;
        }else if (!preg_match("/^[a-zA-Z0-9]*$/",$model_no)) {
            $nameError = "Only letters and number allowed"; 
          }
         
      
         
     
        
        if ($valid) {
            
             
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO entry (brend_name,model_no,purchased_price,selling_price,image,date_entry,Discription ) values(?, ?, ?, ? , ? , ? , ? )";
            $q = $pdo->prepare($sql);
            $q->execute(array($brend_name,$model_no, $purchased_price, $selling_price, $image,$date_entry,$Discription));
            Database::disconnect();
            header("Location: index.php");
}


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

<h3>Create Record</h3>

</div>

            <form  method="post" action="create.php">

		<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
		    <label class="control-label">MOBLIE BREND NAME</label>

			<div class="controls">
			 <input name="brend_name" type="text"  placeholder="MOBLIE BREND NAME" value="<?php echo !empty($brend_name)?$brend_name:'';?>">
					<?php if (!empty($nameError)): ?>
					<span class="help-inline"><?php echo $nameError;?></span>
					<?php endif; ?>
							</div>

							</div>

                

	<div class="control-group<?php echo !empty($modelError)?'error':'';?>">
	                    <label class="control-label">MODEL</label>

	<div class="controls">
	                            <input type="text" name="model_no" value="<?php echo !empty($model_no)?$model_no:''; ?>">
	                            <?php if(!empty($modelError)):?>
	                            <span class="help-inline"><?php echo $modelError ;?></span>
	                            <?php endif;?>
	</div>

	</div>


<div class="control-group<?php echo !empty($purchaseError)?'error':'';?>">
                    <label class="control-label">PURCHASING PRICE</label>

<div class="controls">
                            <input type="text" name="purchased_price" value="<?php echo !empty($purchased_price)?$purchased_price:''; ?>">
                            <?php if(!empty(  $purchaseError)):?>
                            <span class="help-inline"><?php echo $purchaseError ;?></span>
                            <?php endif;?>
</div>

</div>

                 

<div class="control-group <?php echo !empty($sellError)?'error':'';?>">
                        <label class="control-label">SELLING PRICE</label>

<div class="controls">
                            <input name="selling_price" type="text" placeholder="sellingprice" value="<?php echo !empty($selling_price)?$selling_price:'';?>">
                            <?php if (!empty($sellError)): ?>
                                <span class="help-inline"><?php echo $sellError;?></span>
                            <?php endif;?>
</div>

</div>
    								<div class="control-group <?php echo !empty($imageError)?'error':'';?>">
    											<label class="control-label">IMAGE</label>

    															<div class="controls">
    												<input type="file"  name="image" accept="image/*"  value="<?php echo !empty($image)?$image:'';?> ">
    											  <?php if (!empty($imageError)): ?>
    								<span class="help-inline"><?php echo $imageError;?></span>
    															                            <?php endif;?>
    															</div>
    		                         </div>
															
	           

                
<div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                             <label class="control-label">DATE</label>

<div class="controls">
                            <input name="date_entry" type="datetime-local" value="2015-04-12T23:20:50.52" />
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
</div>

</div>
         

                


                 



                

<div class="control-group <?php echo !empty($discriptiontError)?'error':'';?>">
                    <label class="control-label">Discripion </label>

<div class="controls">
                           <textarea rows="4" cols="30" name="Discription" ><?php if(isset($Discription)) echo $Discription;?></textarea>    
                            <?php 
                                if(!empty($commentError)):?>
                               <span class="help-inline"><?php echo $commentError ;?></span>
                            <?php endif;?>
</div>

</div>


<div class="form-actions">
                 <input type="submit" class="btn btn-success" name="submit" value="submit">
                 <a  class="btn btn-success" href="index.php">Back</a>
</div>

            </form>
            
            
            
</div>




















		</body>
		</html>