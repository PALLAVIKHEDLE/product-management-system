<?php
	include("header.php");
include("db-config.php");
	
session_start();
 $catID=$_SESSION['id'] ;

$deletecat="DELETE FROM category WHERE category_id='$catID'";
$result=mysqli_query($conn, $deletecat);
	
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
      		<h5 class="modal-title" id="exampleModalLongTitle">Category delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body" id="back">
        <p>Category  deleted successfully.....</p>
      	
		<div class="modal-footer">
        <a href="category_list.php" role="button" class="btn btn-primary">OK</a>
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
      		<h5 class="modal-title" id="exampleModalLongTitle">category delete</h5>
 
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