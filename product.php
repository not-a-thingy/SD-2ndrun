<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Mask Kau Portal | Product Listing</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header -->

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Product Listing</h1>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php
//Query for Listing count
$sql = "SELECT id from tblproduct";
$query = $dbh -> prepare($sql);
$query->bindParam(':pid',$pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Listings</span></p>
</div>
</div>

<?php $sql = "SELECT * from tblproduct";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/productimage/<?php echo htmlentities($result->Pimage1);?>" class="img-responsive" alt="Image" /> </a>
          </div>
          <div class="product-listing-content">
            <h5><a href="product-details.php?pid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->ProductName);?></a></h5>
            <p class="list-price">RM <?php echo htmlentities($result->Price);?></p>
            <ul>
              <li><?php echo htmlentities($result->Stock);?> left</li>
            </ul>
            <a href="product-details.php?pid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} ?>
         </div>
         <!--Side-Bar-->
				 <aside class="col-md-3 col-md-pull-9">
				 	<div class="sidebar_widget">
				 		<div class="widget_heading">
				 			<h5><i class="fa fa-filter" aria-hidden="true"></i> Find Product </h5>
				 		</div>
				 		<div class="sidebar_filter">
				 		<form action="search-result.php?name=<?php echo htmlentities($name);?>" method="post">
				 			<div class="form-group">
				 				<p>By name</p>
				 				<input type="text" class="form-control" name="name" placeholder="Enter product name">
				 			</div>
              <p>By price range <br>from</p>
              <div class="form-group select">
                <select class="form-control" name="min">
                  <option value=0>RM 0</option>
                  <option value=5>RM 5</option>
                  <option value=10>RM 10</option>
                  <option value=15>RM 15</option>
                  <option value=20>RM 20</option>
                  <option value=25>RM 25</option>
                  <option value=30>RM 30</option>
                  <option value=35>RM 35</option>
                </select>
              </div>
                <p>to</p>
              <div class="form-group select">
                <select class="form-control" name="max">
                  <option value=35>RM 35</option>
                  <option value=30>RM 30</option>
                  <option value=25>RM 25</option>
                  <option value=20>RM 20</option>
                  <option value=15>RM 15</option>
                  <option value=10>RM 10</option>
                  <option value=5>RM 5</option>
                  <option value=0>RM 0</option>
                </select>
              </div>
				 				<div class="form-group">
				 					<button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Product</button>
				 				</div>
				 			</form>
				 		</div>
				 	</div>
				 </aside>
				 <!--/Side-Bar-->
    </div>
  </div>
</section>
<!-- /Listing-->

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer-->

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form -->

<!--Admin Login-Form -->
<?php include('includes/adminsignin.php');?>
<!--/Admin Login-Form -->

<!--Register-Form -->
<?php include('includes/registration.php');?>
<!--/Register-Form -->

<!--Search-Form -->
<?php include('includes/search.php');?>
<!--/Search-Form -->

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
