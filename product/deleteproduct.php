<?php
//include("header.php");
include("session.php");
include("db-config.php");

$proID=$_POST['test'];
$_SESSION['id'] = $proID;
$sql="SELECT  * FROM product where product_id='$proID'";
$result1=mysqli_query($conn, $sql);
$product=mysqli_num_rows($result1);
if($product>0){
  ?>
    <script>
      $(function() {
      $("#exampleModal").modal();
      });
    </script>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
      <div class="modal-content">
    <div class="modal-header" id="cat">
          <h5 class="modal-title" id="exampleModalLongTitle">category Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="back">
        <p>Are You sure..?</p>
        
    <div class="modal-footer">
          <a href="delete1product.php" role="button" class="btn btn-primary">OK</a>
        <a href="product_list.php" role="button" class="btn btn-danger">cancel</a>
        </div>
      </div>
    </div>
    </div>
    </div>
     <?php }?>

