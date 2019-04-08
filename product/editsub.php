<?php
 include("session.php");
 //ob_start();
include("header.php");
include("db-config.php"); 
if (isset($_POST['category'])) {

$subID = $_POST['subid'];
$subcategory=$_POST['subcategoryname'];
$category=$_POST['category'];

 $updatesubcat="UPDATE subcat_cat SET  category_id='".$category."' where subcategory_id='".$subID."'"; 
$res6 = mysqli_query($conn, $updatesubcat);

 $updatesub="UPDATE subcategory SET  subcategory_name='".$subcategory."' where subcategory_id='".$subID."'"; 
$res5 = mysqli_query($conn, $updatesub) ;

if($res5 == true &&  $res6==true){
  header("Location:subcategory_list.php");
} else {
  echo "Error: " . $updatecat . "<br>" . $conn->error;
}
}

?>  
