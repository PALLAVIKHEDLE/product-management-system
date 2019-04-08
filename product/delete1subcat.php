<?php
include("header.php");
include("db-config.php");
	
session_start();
 $subcatID=$_SESSION['id'] ;

$deletesubcat="DELETE FROM subcategory WHERE subcategory_id='$subcatID'";
$result=mysqli_query($conn, $deletesubcat);
	
	if($result == true)
	{ ?>
		
		<script>
			$(function() {
			$("#exampleModal").modal();
			});
		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header" id="cat">
      		<h5 class="modal-title" id="exampleModalLongTitle">Subcategory delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body" id="back">
        <p>Subcategory  deleted successfully.....</p>
      	
		<div class="modal-footer">
        <a href="subcategory_list.php" role="button" class="btn btn-primary">OK</a>
      	</div>
    	</div>
 	 	</div>
		</div>
		</div>
<?php	}
	else
	{ ?>
		
		<script>
			$(function() {
			$("#exampleModal").modal();
			});
		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header" id="cat">
      		<h5 class="modal-title" id="exampleModalLongTitle">Subcategory delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body" id="back">
        <p>Please try again.....</p>
      	
		<div class="modal-footer">
        <a href="subcategory_list.php" role="button" class="btn btn-primary">OK</a>
      	</div>
    	</div>
 	 	</div>
		</div>
		</div>
<?php	
  }
 ?>