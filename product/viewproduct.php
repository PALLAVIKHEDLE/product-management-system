<?php
include("session.php");
include("header.php");
include("db-config.php");
?>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<h4 class="text-center" id="list">Product</h4>
<?php
	

	$productIDs = $_GET['product_id'];
	echo $sql7="SELECT * FROM subcat_pro WHERE product_id='".$productIDs."'";
	$res7=mysqli_query($conn, $sql7);
	$row_cat=mysqli_fetch_assoc($res7);

echo 	  $sql8="SELECT * FROM subcategory WHERE subcategory_id='".$row_cat['subcategory_id']."'"; 
	 $res8=mysqli_query($conn, $sql8);
	 $row_subcat=mysqli_fetch_assoc($res8);

 echo   $sql9="SELECT * FROM category WHERE category_id='".$row_cat['category_id']."'";die;
	 $res9=mysqli_query($conn, $sql9);
	 $row_catname=mysqli_fetch_assoc($res9);

	$sql6="SELECT * FROM product WHERE product_id='".$row_cat['product_id']."'";
	$res6=mysqli_query($conn, $sql6);
	$row_pro=mysqli_fetch_assoc($res6);
?>
<div class="table table-responsive">
<table class="table table-bordered">

<tr class="info">
<th>Category</th>
<td><?php echo $row_catname['category_name'];?></td>
</tr>

<tr class="warning">
<th>Subcategory</th>
<td><?php echo $row_subcat['subcategory_name'];?></td>
</tr>

<tr class="success">
<th>product_name</th>
<td><?php echo $row_pro['product_name'];?></td>
</tr>

<tr class="danger">
<th>product_Price</th>
<td><?php echo $row_pro['product_price'];?></td>
</tr>

<tr class="primary">
<th>product_Brand</th>
<td><?php echo $row_pro['product_brand'];?></td>
</tr>

<tr class="warning">
<th>product_details</th>
<td><?php echo $row_pro['product_details'];?></td>
</tr>

<tr class="info">
<th>product_image</th>
<td><img src="../php/myphoto/<?php echo $row_pro['product_image']?>" height="50px" width="50px" class="img-responsive">
<?php echo $row_pro['product_image'];?></td>
</tr>

</table>
</div>
 <div class="text-center">
<button type="button" class="btn btn-warning"><a href="product_list.php">Ok</a></button>
</div>
</div><!--6 END-->
<div class="col-sm-3"></div>
</div>
<?php
include("footer.php");
?>	
