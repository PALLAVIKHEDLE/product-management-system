<?php
 include("header.php");
 include("session.php");
include("db-config.php");
?>
<h3 class="text-center" id="list">Product</h3>
<br><br>

<?php

 if(isset($_POST['category'])){  
  $subcategory=$_POST['subcategory'];
  $category=$_POST['category'];

 $productid="SELECT product_id from subcat_pro where category_id='".$category."' AND subcategory_id='".$subcategory."'" ;
  $resultid=mysqli_query($conn,$productid); 

    $count=mysqli_num_rows($resultid);

     if($count>0){
   while($rowproductid = $resultid->fetch_assoc()){

   $product="SELECT * from product where product_id='".$rowproductid['product_id']."'" ; 
   $resultproduct=mysqli_query($conn,$product); 
   $rowproduct=mysqli_fetch_assoc($resultproduct); 
 
 
   echo "<div class='col-sm-4'>";
   echo "<div class='font panel panel-primary'>";
   echo "<div class='panel panel-heading'>";
   // echo "<label class='font'> Name</label>" ."&nbsp; &nbsp; &nbsp;";
   echo $rowproduct['product_name']."<br>";
   echo "</div>";
   echo "<div class='panel panel-body'>";
   echo"<label class='font'>Image</label>" ."&nbsp; &nbsp; &nbsp;";
 	 echo"<img src='../php/myphoto/".$rowproduct['product_image']."'' height='150px' width='215px' class='img-rounded'>" ."<br><br>" ;
   echo"<label class='font'>Price</label>" ."&nbsp; &nbsp; &nbsp;";
 	 echo $rowproduct['product_price']."<br>";
   echo"<label class='font'>Brand</label>" ."&nbsp; &nbsp; &nbsp;";
   echo $rowproduct['product_brand']."<br>";
   echo"<label class='font'>Details</label>" ."&nbsp; &nbsp; &nbsp;";
   echo $rowproduct['product_details']."<br>";
   echo"</div>";
   echo"</div>";
   echo"</div>";
 }
 }else{ ?>

 <script>
      $(function() {
      $("#exampleModal").modal();
      
      });
    </script>  
<div class="modal fade" id="exampleModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" id="cat">
  <h4 class="modal-title" >Product Detail</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="back">
 <p>Selected combination is not found..<br>Sorry! Please try with different combination.</p>
<div class="modal-footer">
  <button type="submit"  class="btn btn-success" id="ok"><a href="main.php">OK</a></button>
</div>
</div>
</div>
</div>
</div>
   <?php
}
}
?>