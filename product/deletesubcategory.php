<?php
//include("header.php");
include("session.php");
include("db-config.php");
// $proID = $_POST['test'];
$subcatID=$_POST['test'];
$_SESSION['id'] = $subcatID;
$sql="SELECT  * FROM subcat_pro where subcategory_id='$subcatID'";
$result1=mysqli_query($conn, $sql);
$subcategory=mysqli_num_rows($result1);

if($subcategory==0){ ?>
	   <script>
      $(function() {
      $("#exampleModal").modal();
      });
    </script>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header" id="cat">
          <h5 class="modal-title" id="exampleModalLongTitle">subcategory Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
        <div class="modal-body" id="back">
        <p>Are You sure..?</p>
        
    <div class="modal-footer">
        <a href="delete1subcat.php" role="button" class="btn btn-primary">OK</a>
        <a href="subcategory_list.php" role="button" class="btn btn-danger">cancel</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php }else{ ?>

 <script>
      $(function() {
      $("#exampleModal").modal();
      
      });
    </script> 
 
<div class="modal fade" id="exampleModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" id="cat">
  <h4 class="modal-title" >subcategory Delete</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="back">
 <p>This subcategory has product You are not able to delete it.</p>
<div class="modal-footer">
  <button type="submit"  class="btn btn-success" id="ok"><a href="subcategory_list.php">OK</a></button>
</div>
</div>
</div>
</div>
</div>
   <?php
}
?>