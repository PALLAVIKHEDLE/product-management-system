<?php
 include("header.php");
 include("session.php");
include("db-config.php");
?>
<h3 class="text-center" id="list">Subcategory</h3>
<br><br>

<?php

 if(isset($_POST['category1'])){  

  $category=$_POST['category1'];



 $subcatid="SELECT subcategory_id from subcat_cat where category_id='".$category."'" ;
 $resultid=mysqli_query($conn,$subcatid); 

 $count=mysqli_num_rows($resultid);

   
   

     if($count>0){

   echo "<div class='container'>";
   echo "<div class='row'>";
   echo "<div class='col-sm-3'></div>";
   echo "<div class='col-sm-6'>";
   echo "<div class='table table-responsive'>";
   echo "<table class='table table-bordered' id='myTable' style='width: 100%;'> ";
   echo "<thead>";
   echo "<tr id='table'>";
   echo "<th>Category</th>";
   echo "<th>Subcategory</th>";
   echo" </tr>";
   echo"</thead>" ;
   echo"<tbody>";
   while($rowsubcatid = $resultid->fetch_assoc()){
     echo "<tr class='info'>";
   $subcat="SELECT * from subcategory where subcategory_id='".$rowsubcatid['subcategory_id']."'" ; 
   $resultsubcat=mysqli_query($conn,$subcat); 
   $rowsubcat=mysqli_fetch_assoc($resultsubcat); 
   $cat="SELECT * from category where category_id='".$category."'" ; 
   $resultcat=mysqli_query($conn,$cat); 
   $rowcat=mysqli_fetch_assoc($resultcat); 
 
 
 	 echo "<td>".$rowcat['category_name']."</td>";
   echo "<td>".$rowsubcat['subcategory_name']."</td>";
   echo "</tr>";

  
 }
    echo "</tbody>";
   echo "</table>";
   echo "</div>";
   echo "</div>";
   echo "<div class='col-sm-3'></div>";
   echo "</div>";
    echo "</div>";
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
  <h4 class="modal-title" >Subcategory</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="back">
 <p>Subcategory is not found for selected category..</p>
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