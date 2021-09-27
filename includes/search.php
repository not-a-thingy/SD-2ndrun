<?php
if(isset($_POST['search']))
{
$name=$_POST['productname'];
$min=$_POST['min'];
$max=$_POST['max'];
$sql ="SELECT * FROM tblproduct WHERE Price > :min and Price < :max";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':min', $min, PDO::PARAM_STR);
$query-> bindParam(':max', $max, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
  //echo "<script type='text/javascript'> document.location = 'search-result.php?query=name:$name,range:$min to $max'; </script>";
}} ?>

<div class="modal fade" id="searchform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Search a product</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" action="search-result.php">
                <div class="form-group">
                  <p>Enter product name</p>
                  <input type="text" class="form-control" name="productname" placeholder="Enter product name">
                </div>
                <p>Price range <br>from</p>
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
                  <input type="submit" name="search" value="Search" class="btn btn-block">
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
