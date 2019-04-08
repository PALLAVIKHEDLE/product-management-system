<?php
include("session.php");
include("header.php");
include("db-config.php");
?>
<br><br>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<h4 class="text-center" id="list">SubCategory </h4>
<?php
	
	$subcatIDs = $_GET['subcategory_id'];

 $sql="SELECT * FROM subcat_cat WHERE subcategory_id='".$subcatIDs."'";  
   $res=mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($res);

  $sql8="SELECT * FROM subcategory WHERE subcategory_id='".$row['subcategory_id']."'";
	$res8=mysqli_query($conn, $sql8);
	$row_subcat=mysqli_fetch_assoc($res8);

	 $sql9="SELECT * FROM category WHERE category_id='".$row['category_id']."'";
	$res9=mysqli_query($conn, $sql9);
	$row_catname=mysqli_fetch_assoc($res9);

?>
<div class="table table-responsive">
<table class="table table-bordered">

<tr class="info">
<th>Category</th>
<td><?php echo $row_catname['category_name'];?></td>
</tr>
<tr class="danger">
<th>Subcategory</th>
<td><?php echo $row_subcat['subcategory_name'];?></td>
</tr>
</table>
</div>
 <div class="text-center">
<button type="button" class="btn btn-warning"><a href="subcategory_list.php">OK</a></button>
</div>
</div><!--6 END-->
<div class="col-sm-3"></div>
</div>
<?php
include("footer.php");
?>	

