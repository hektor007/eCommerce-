<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once '../config/dbconfig1.php';
	
	if(isset($_POST['btnsave']))
	{
		$product_name = $_POST['product_name'];// user name
		$product_price = $_POST['product_price'];// user email
		$product_code = $_POST['product_code'];// user email
		$product_desc = $_POST['product_desc'];// user email
		//$product_image = $_POST['product_image'];// user email
		$imgFile = $_FILES['product_image']['name'];
		$tmp_dir = $_FILES['product_image']['tmp_name'];
		$imgSize = $_FILES['product_image']['size'];
		
		
		if(empty($product_name)){
			$errMSG = "Please Enter name of product.";
		}
		else if(empty($product_price)){
			$errMSG = "price";
		}
		else if(empty($product_code)){
			$errMSG = "code of product";
		}
		else if(empty($product_desc)){
			$errMSG = "desc of product";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = '../assets/images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$product_image = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$product_image);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO products_list(product_name,product_desc,product_code,product_price,product_image) VALUES(:product_name,:product_desc,:product_code,:product_price, :product_image)');
			$stmt->bindParam(':product_name',$product_name);
			$stmt->bindParam(':product_price',$product_price);
		    $stmt->bindParam(':product_desc',$product_desc);
			$stmt->bindParam(':product_image',$product_image);
			$stmt->bindParam(':product_code',$product_code);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;adminpage.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>
<link rel="stylesheet" href="../assets/css/addnew.css">
<link rel="stylesheet" href="../bootstrap/css/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap/css/css/bootstrap-theme.min.css">

</head>
<body>
 <div id="wrapper">
                    <div class="header">
                          <?php include "header.php"; ?>  
                    </div>
    <div class="container">
	<div class="page-header">
    	<h1 class="h2">ADD NEW PRODUCT &nbsp;<a class="btn btn-default" href="adminpage.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; ALL PRODUCTS </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Product Name</label></td>
        <td><input class="form-control" type="text" name="product_name" placeholder="Enter Username" value="<?php echo $product_name; ?>" /></td>
    </tr>
    
      <tr>
    	<td><label class="control-label">product_desc.</label></td>
        <td><input class="form-control" type="text" name="product_desc" placeholder="Enter product Description" value="<?php echo $product_desc; ?>" /></td>
    </tr>
    
      <tr>
    	<td><label class="control-label">product_code.</label></td>
        <td><input class="form-control" type="text" name=" product_code" placeholder="Enter Product Code" value="<?php echo $product_code; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Product Price</label></td>
        <td><input class="form-control" type="number" name="product_price" placeholder="Your Profession" value="<?php echo $product_price; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Product Image</label></td>
        <td><input class="input-group" type="file" name="product_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap/js/js/bootstrap.min.js"></script>

<div id="footer">
                        <?php include "footer.html"; ?>  
                     </div>
             </div>

</body>
</html>