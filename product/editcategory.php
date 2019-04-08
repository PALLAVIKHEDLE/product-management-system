<?php
include("session.php");
// ob_start();
//include("header.php");
include("db-config.php");	
if (isset($_POST['category'])) {
$catID = $_POST['id'];
$category=$_POST['category'];
$updatecat="UPDATE category SET  category_name='$category' where category_id='".$catID."'";
$res1 = mysqli_query($conn, $updatecat) ;
if($res1 == true) {
	header("Location:category_list.php");
} else {
	echo "Error: " . $updatecat . "<br>" . $conn->error;
}
}
?>	

<!-- <div class="container"> -->
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6" style="background: lightgrey;">
<form action="editcategory.php" method="POST" id="editform">
<?php
  $catID = $_POST['test'];
	$sql="SELECT * FROM category WHERE category_id='$catID'";
	$res=mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($res);
 
?>

<input type="hidden" name="id" class="form-control" value="<?php echo $catID; ?>">
<a href="category_list.php" role="button" class="btn btn-primary glyphicon glyphicon-arrow-left">&nbsp;Back</a>
<br>
<div class="form-group">
<label>Category Name</label>
<input type="text" name="category" id="categoryedit" class="form-control" value="<?php echo $row['category_name']; ?>" required>
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary" id="catupdate" >Update</button>
</div>
</form>
</div><!-- 6 close-->
<div class="col-sm-3"></div>
</div>
<!-- </div> -->

<?php
	include("footer.php");
?>	