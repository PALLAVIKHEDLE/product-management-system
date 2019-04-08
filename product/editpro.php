<?php
 include("session.php");
// ob_start();
include("header.php");
include("db-config.php");	
if (isset($_POST['subcategory'])) {
$proIDs = $_POST['product'];
$subcategory=$_POST['subcategory'];
$category=$_POST['category'];
$name=$_POST['name'];
$price=$_POST['price'];
$brand=$_POST['brand'];
$details=$_POST['details'];
$proimage=$_POST['oldimage'];

	$filenames   = $_FILES["newimage"]["name"];
	$fileType    = $_FILES["newimage"]["type"];
	$fileTmpName = $_FILES["newimage"]["tmp_name"];
	move_uploaded_file($fileTmpName, "../php/myphoto/$filenames");





   $updateprocat="UPDATE subcat_pro SET  category_id='".$category."', subcategory_id='".$subcategory."' where product_id='".$proIDs."'";
	$res6 = mysqli_query($conn, $updateprocat);
 	if(!$filenames==""){
		
	$updatepro="UPDATE product SET  product_name='".$name."', product_price='".$price."', product_brand='".$brand."', product_details='".$details."',
	product_image='".$filenames."' where product_id='".$proIDs."'"; 
	$res1 = mysqli_query($conn, $updatepro) ;
	if($res1 == true) {
	header("Location:viewproduct.php?product_id=".$proIDs);
	} else {
	echo "Error: " . $updatepro . "<br>" . $conn->error;
	}
	}else{

	echo $updatepro1="UPDATE product SET  product_name='".$name."', product_price='".$price."', product_brand='".$brand."', product_details='".$details."',
	product_image='".$proimage."' where product_id='".$proIDs."'"; 
	$respro = mysqli_query($conn, $updatepro1) ;
	if($respro == true) {
	header("Location:product_list.php");
	} else {
	echo "Error: " . $updatepro . "<br>" . $conn->error;
	}
	}
}
?>


