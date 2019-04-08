<?php
 include("session.php");
// ob_start();
include("header.php");
include("db-config.php");	
if (isset($_POST['subcategory'])) {
$catID = $_POST['id'];
$subcategoryid=$_POST['subcategory'];
$subcategory=$_POST['subcategoryname'];
$category=$_POST['category'];
print_r($_POST); die;
 $updatesubcat="UPDATE subcategory SET  subcategory_name='".$subcategory."' where subcategory_id='".$subcategoryid."'"; 
$res1 = mysqli_query($conn, $updatesubcat) ;
 $updatecat="UPDATE category SET  category_name='".$category."' where category_id='".$catID."'"; 
$res2 = mysqli_query($conn, $updatecat) ;
if($res1 == true && $res2==true){
	header("Location:viewsubcategory.php?category_id=".$catID);
} else {
	echo "Error: " . $updatecat . "<br>" . $conn->error;
}
}
$catID = $_GET['category_id'];
?>	
<br><br>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6" style="padding:15px;background: lightgrey;">
<form action="editsubcategory.php" method="POST" id="editsubcatform">
<?php

//   $sql="SELECT * FROM subcat_cat WHERE category_id='$catID'";
// 	$res=mysqli_query($conn, $sql);
//   $SUBCATID = array();
// 	 while($row=mysqli_fetch_assoc($res)){
//   $SUBCATID[] = $row['subcategory_id'];
// //print_r($SUBCATID);
//   //  echo $row['subcategory_id'];
// }
// $SUBCAT=implode(',',$SUBCATID);
//  if($SUBCAT != ""){

//   $sql1="SELECT * FROM subcategory WHERE subcategory_id IN (".$SUBCAT.")";
//   $res1=mysqli_query($conn, $sql1);

 
//      $Name = array();

//  while($row1 = $res1->fetch_assoc()){
//               $Name[] = $row1['subcategory_name'];
//           }
// }
 
?>
<input type="hidden" name="id" class="form-control" value="<?php echo $catID; ?>">
<div class="form-group">
        <label>category</label>
        <select name="category" class="form-control" id="category">
        <option value="">Select category</option>
          <?php
            $selected = "";
            $sqlcategory="SELECT * FROM category";
            $rescategory=mysqli_query($conn,$sqlcategory);
            while($catnames=mysqli_fetch_assoc($rescategory))
            {
             if($catnames['category_id'] == $catID){
              $selected = "selected";
            }

            ?>  
            <option value="<?php echo ($catnames['category_id'])?>" <?php echo $selected; ?>>
            <?php echo($catnames['category_name']);?>
            </option>
            <?php
               $selected = "";
             
           }
          ?>
        </select>
        <span id="categoryErr"></span>
        </div>
<div class="form-group">
<label>Subcategory</label>
<?php
 foreach($Name as $SUBCATNAME){
  echo $SUBCATNAME; 
 }
  ?>
<input type="hidden" name="subcategory" id="subcategoryid" class="form-control" value="<?php echo $SUBCAT; ?>">
<input type="text" name="subcategoryname" id="subcategory" class="form-control" value="<?php echo $SUBCATNAME; ?>">


<span id="subcategoryErr"></span>
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary" id="subcatupdate" >Update</button>
</div>
</form>
</div><!-- 6 close-->
<div class="col-sm-3"></div>
</div>

<script>
$(document).ready(function(){
$("#subcatupdate").click(function(e){
   	e.preventDefault();
    var subcategory = $("#subcategory").val();
    var category = $("#category option:selected").val();
     var status=true;
    if(subcategory == "") {
      $("#subcategoryid").css('border', 'red');
      $("#subcategoryErr").text("Please Enter Subcategory").css('color','red');
      status=false;
    }else {
      $("#subcategoryid").css('border-color', '');
      $("#subcategoryErr").text("").css('color', '');
    }

    if(category == "") {
      $("#category").css('border', 'red');
      $("#categoryErr").text("Please Select One").css('color','red');
      status=false;
    }else {
      $("#category").css('border-color', '');
      $("#categoryErr").text("").css('color', '');
    }

    if(status==true) {
        $("#editsubcatform").submit();
        }
    });
});
</script> 
<?php
	include("footer.php");
?>	