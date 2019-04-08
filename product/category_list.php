
<?php
 include("session.php");
 include("header.php");
 include("db-config.php");
 include("sort.php");
 if(isset($_POST['category']))
{  
  $category=$_POST['category'];
  $insert = "INSERT INTO category(category_name)VALUES('$category')";
  $result=mysqli_query($conn,$insert);  
   if($result==true ){
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
          <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="back">
        <p>New Category is added succesfully!</p>
        
    <div class="modal-footer">
        <a href="category_list.php" role="button" class="btn btn-primary">OK</a>
        </div>
      </div>
    </div>
    </div>
    </div>
    <?php
   }else{
    echo "Error: " . $insert . "<br>" . $conn->error;
      }
 }
?>
<style>
 .modal-backdrop {
    background-image: url('modal.jpg');
   background-repeat: no-repeat;
    background-size: cover;
   
}
</style>
 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search categories names.." title="Type in a name" style="float:right; border:2px solid orange;overflow: hidden;">&nbsp;&nbsp;
 <button id="sort" class="btn btn-primary"onclick="sortTable()"style="float:right;margin-right:10px;margin-top:10px;">Sort</button>
 
<button type="button" class="btn btn-warning glyphicon glyphicon-plus"  id="button1" data-toggle="modal" data-target="#myCat">Add Category</button>
<div class="modal fade" id="myCat" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" id="cat">
  <h4 class="modal-title" >Add Category</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="back">
<form action="" method="POST" id="form2">
<div class="form-group">
  <input type="text" placeholder="Enter Category Name" name="category" id="category" class="form-control">
  <span id="categoryErr"></span>
</div>
<div class="modal-footer">
  <button type="submit"  class="btn btn-success" id="add_cat">Add Category</button>
  <button type="reset" class="btn btn-danger" data-dismiss="modal">Clear</button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="container-fluid">
 <div class="row">  
  <div class="col-sm-2"></div>
  <div class="col-sm-7" id="Edit">

<div class="table table-responsive" id="cattable">
  <h3 class="text-center" id="list">Category List</h3>
<table class="table table-bordered" id="myTable">                     
<thead>
  <tr id="table">

  <th>Category</th>
  <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
$showRecordPerPage = 5;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalsql = "SELECT * FROM category";
$allproductResult = mysqli_query($conn, $totalsql);
$totalproduct = mysqli_num_rows($allproductResult);
$lastPage = ceil($totalproduct/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;

$cat="SELECT * FROM category ORDER BY category_id LIMIT $startFrom, $showRecordPerPage";
$sql=mysqli_query($conn, $cat);
  if ($sql->num_rows > 0) {
  while($row = $sql->fetch_assoc()) {
    echo "<tr class='info'>";

    echo"<td>".$row['category_name']."</td>";
   
    echo"<td><button id='".$row['category_id']."' class='editcat'><span class='glyphicon glyphicon-edit' id='edit'></span></button> &nbsp;&nbsp&nbsp;&nbsp";
      echo "<button id='".$row['category_id']."' class='deletetcat'><span class='glyphicon glyphicon-trash' id='delete'></span></button></td>";
    echo"</tr>";
    }
  } 
?>

 </tbody>
</table>
</div>
</div>
<div class="col-sm-2"></div>
</div>
</div>

<nav aria-label="Page navigation" class="text-center" id="paginationcat">
<ul class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item text-center">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>

<script>
$(document).ready(function(){
  $("#add_cat").click(function(e){
    e.preventDefault();
    var category = $("#category").val();
    if(category == "") {
      $("#category").css('border', 'red');
      $("#categoryErr").text("Please Enter Category").css('color','red');
    }else {
      $("#form2").submit();
    }
    });
});
</script> 

<script>
  $(document).ready(function () {

        $(".editcat").click(function () {
          var variable = $(this).attr('id');
      
            $.ajax({
                url: 'editcategory.php',
                type:'POST',
                dataType: 'text',
                data: {test: variable},
                success: function (rspns) {
                $("#cattable").remove();
                $("#paginationcat").remove();
                $("#button1").remove();
                $("#sort").remove();
                $("#myInput").remove();
                $("#Edit").append(rspns);
              
                }
            });
        });
    });

</script>

<script>
  $(document).ready(function () {

        $(".deletetcat").click(function () {
          var variable = $(this).attr('id');
      
            $.ajax({
                url: 'deletecategory.php',
                type:'POST',
                dataType: 'text',
                data: {test: variable},
                success: function (rspns) {
                $("#cattable").remove();
                $("#paginationcat").remove();
                $("#button1").remove();
                $("#sort").remove();
                $("#myInput").remove();
                $("#Edit").append(rspns);
                }
            });
        });
    });

</script>
<?php
  include("footer.php");
?>


 
