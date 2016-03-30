<?php
include_once('config.php');
?>
<?php  
if(isset($_POST['submit'])) 
{ 
$sql="select * from admin where username='".$_POST['username']."' and password='".$_POST['password']."'";
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		session_start();
		$_SESSION['is_auth'] = true;

       header("location:index.php");
    }
} 

	
}
?>
<!DOCTYPE html>
<html>
	
<head>
	<title>CRUD WEBSITE</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> 

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
	
				
				<div class="login-form">
					<div class="head">
						<img src="images/mem2.jpg" alt=""/>
						
					</div>
				<form     method="post" class="form-light mt-20" role="form" >
					<li>
						<input type="text" class="text" name="username" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" ><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
					<div class="p-container">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>Remember Me</label>
								<input type="submit"  name="submit" value="SIGN IN" >
							<div class="clear"> </div>
					</div>
				</form>
			</div>
		
   					<div class="copy-right">
						<p>Mobilar.com.pk</p> 
					</div>
			
		 		
</body>
</html>