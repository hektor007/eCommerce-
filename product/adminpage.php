<?php
	require_once '../config/dbconfig1.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT product_image FROM products_list WHERE id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("../assets/images/".$imgRow['delete_id']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM products_list WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location:adminpage.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>ADMIN PAGE</title>
<link href="../assets/css/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../bootstrap/css/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/css/bootstrap-theme.min.css">
</head>

<body>
 <div id="wrapper">
                    <div class="header">
                          <?php include "header.php"; ?>  
                    </div>

<div class="container">

	<div class="page-header">
    	<h1 class="h2">ALL PRODUCTS  <a class="btn btn-default" href="addnew.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; add new </a></h1> 
    </div>
    
<br />

<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT id,product_name, product_price, product_image FROM products_list ORDER BY id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
				<p class="page-header"><?php echo $product_name."&nbsp;/&nbsp;".$product_price; ?></p>
				<img src="../assets/images/<?php echo $row['product_image']; ?>" class="img-rounded" width="250px" height="250px" />
				<p class="page-header">
				<span>
				<a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="DELETE PRODUCT"click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
</div>	



</div>


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/js/bootstrap.min.js"></script>

<div id="footer">
                        <?php include "footer.html"; ?>  
                     </div>
             </div>
</body>
</html>