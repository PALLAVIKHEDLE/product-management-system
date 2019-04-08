<?php
include("session.php");
include("header.php");
include("db-config.php");
?>
<br><br>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<h4 class="text-center" ID="list"> Category </h4>
<?php
	$catIDs = $_GET['category_id'];
	$sql7="SELECT * FROM category WHERE category_id='".$catIDs."'";
	$res7=mysqli_query($conn, $sql7);
	$row_cat=mysqli_fetch_assoc($res7);
?>
<div class="table table-responsive">
<table class="table table-bordered">

<tr class="info">
<th>Category</th>
<td><?php echo $row_cat['category_name'];?></td>
</tr>
</table>
</div>
 <div class="text-center">
<button type="button" class="btn btn-warning"><a href="category_list.php">OK</a></button>
</div>
</div><!--6 END-->
<div class="col-sm-3"></div>
</div>
<?php
include("footer.php");
?>	

