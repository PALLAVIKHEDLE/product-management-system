<?php
 include("session.php");
//include("header.php");
include("db-config.php");	
?>	
<div class="container">
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6" style="padding:15px;background: lightgrey;">
<form action="editpro.php" method="POST" id="editproform" enctype="multipart/form-data">
<?php
$proID = $_POST['test'];

 $sql="SELECT * FROM subcat_pro WHERE product_id='".$proID."'";
 $res=mysqli_query($conn, $sql);
 $row=mysqli_fetch_assoc($res);


 $sql1="SELECT * FROM product WHERE product_id='".$proID."'";
 $res1=mysqli_query($conn, $sql1);
 $row1=mysqli_fetch_assoc($res1);
 
 $sql2="SELECT * FROM subcategory WHERE subcategory_id='".$row['subcategory_id']."'"; 
 $res2=mysqli_query($conn, $sql2);
 $row2=mysqli_fetch_assoc($res2);

 $sql3="SELECT * FROM category WHERE category_id='".$row['category_id']."'"; 
 $res3=mysqli_query($conn, $sql3);
 $row3=mysqli_fetch_assoc($res3);
   

?>
<a href="product_list.php" role="button" class="btn btn-primary glyphicon glyphicon-arrow-left">&nbsp;Back</a>
<div class="form-group">
        <label>category</label>
        <select name="category" class="form-control" id="category"  required>
        <option value="">Select category</option>
          <?php
            $selected = "";
            $sql7="SELECT * FROM category";
            $res7=mysqli_query($conn,$sql7);
            while($catnames=mysqli_fetch_assoc($res7))
            {
              if($catnames['category_id'] == $row['category_id']){
              $selected = "selected";
            }
            ?>  
            <option value="<?php echo ($catnames['category_id']);?>" <?php echo $selected; ?>>
            <?php echo($catnames['category_name']); ?>

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
        <select name="subcategory" class="form-control" id="subcategory" required>
        <option value="">Select subcategory</option>
          <?php
             $selected = "";
             $sqlsub="SELECT * FROM subcategory";
             $subcatresult=mysqli_query($conn,$sqlsub);
             while($subcatnames=mysqli_fetch_assoc($subcatresult))
             {
              if($subcatnames['subcategory_id'] == $row['subcategory_id']){
               $selected = "selected";
             }
            ?>  
             <option value="<?php echo ($subcatnames['subcategory_id'])?>" <?php echo $selected; ?>> 
            <?php echo($subcatnames['subcategory_name']); ?> 
            </option>
            <?php
             $selected = "";
             }
          ?>
        </select>
  
  </div>
<div class="form-group">
<label>Product name</label>
 <input type="hidden" name="product" class="form-control" value="<?php echo $proID; ?>"> 
<input type="text" name="name" id="name" class="form-control" value="<?php echo $row1['product_name']; ?>" required>
</div>
<div class="form-group">
<label>Product Price</label>
<input type="text" name="price" id="price" class="form-control" value="<?php echo $row1['product_price']; ?>" required>
</div>
<div class="form-group">
<label>Product brand</label>
<input type="text" name="brand" id="brand" class="form-control" value="<?php echo $row1['product_brand']; ?>" required>
</div>
<div class="form-group">
<label>Product details</label>
<input type="text" name="details" id="details" class="form-control" value="<?php echo $row1['product_details']; ?>" required>
</div>
<div class="form-group">
<label>Product Image</label>
 <img src="../php/myphoto/<?php echo $row1['product_image']?>" height="50px" width="50px" class="img-responsive"> 
<input type="file" name="newimage" id="image" class="form-control" value="<?php echo $row1['product_image'];?>">
<input type="hidden" name="oldimage" id="image3" class="form-control" value="<?php echo $row1['product_image'];?>">
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary" id="subcatupdate" >Update</button>
</div>
</form>
</div><!-- 6 close-->
<div class="col-sm-3"></div>
</div>
</div>
<?php
	include("footer.php");
?>	
 <script>
$(document).ready(function(){
    $('#category').on('change', function(){
        var catids = $(this).val();
        if(catids){
            $.ajax({
                type:'POST',
                url:'subcat.php',
                data:'category_id='+catids,
                success:function(html){
                   $('#subcategory').html(html);
                   
                }
            }); 
         }else{
             $('#subcategory').html('<option value="">Select category first</option>');
          
         }
    });
    
});
</script>