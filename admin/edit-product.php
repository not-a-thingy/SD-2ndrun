<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

	if(isset($_REQUEST['del']))
		{
	$delid=intval($_GET['id']);
	$sql = "DELETE from tblproduct WHERE  id=:delid";
	$query = $dbh->prepare($sql);
	$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
	$query -> execute();
	echo "<script>alert('Product Deleted');</script>";
	echo "<script type='text/javascript'> document.location = 'manage-product.php'; </script>";
	}

if(isset($_POST['submit']))
  {
$productname=$_POST['productname'];
$overview=$_POST['overview'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$id=intval($_GET['id']);

$sql="UPDATE tblproduct set ProdutName=:productname,ProductsOverview=:overview,Price=:price,Stock=:stock where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':productname',$productname,PDO::PARAM_STR);
$query->bindParam(':overview',$overview,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':stock',$stock,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";
}
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Mask Kau Portal | Admin Edit Product Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
		<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Edit Product Details</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php
$id=intval($_GET['id']);
$sql ="SELECT * from tblproduct WHERE tblproduct.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Product Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="productname" class="form-control" value="<?php echo htmlentities($result->ProductName)?>" required>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Product Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="overview" rows="3"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Unit<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control">
</div>
<label class="col-sm-2 control-label">Stock<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="stock" class="form-control">
</div>
</div>
<div class="hr-dashed"></div>
<div class="form-group">
<div class="col-sm-12">
<h4><b>Product Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <img src="img/productimage/<?php echo htmlentities($result->Pimage1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 1</a>
</div>
<div class="col-sm-4">
Image 2<img src="img/productimage/<?php echo htmlentities($result->Pimage2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 2</a>
</div>
<div class="col-sm-4">
Image 3<img src="img/productimage/<?php echo htmlentities($result->Pimage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 3</a>
</div>
</div>


</div>
<div class="hr-dashed"></div>
</div>
</div>
</div>
</div>



<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
	<?php }} ?>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >

													<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
													<button class="btn btn-primary" name="del" type="del" style="margin-top:4%">Delete Product</button>
												</div>
											</div>

										</form>
									</div>
								</div>
									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
