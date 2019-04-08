<?php
include("header.php");
include("session.php");
 include("db-config.php");
 include("sort.php");
 if(isset($_POST['subcategory']))
{  
  $subcategory=$_POST['subcategory'];
   $category=$_POST['category'];
  $insertsubcat = "INSERT INTO subcategory(subcategory_name)VALUES('$subcategory')";
  $result=mysqli_query($conn,$insertsubcat);  
 
   $selectedsubcatid="SELECT subcategory_id from subcategory ORDER BY subcategory_id DESC LIMIT 0 , 1" ; 
   $resultsubcat=mysqli_query($conn,$selectedsubcatid); 
   $rowsubcat=mysqli_fetch_assoc($resultsubcat); 
  foreach($category as $catid){
  $insertcatsubcat = "INSERT INTO subcat_cat(category_id,subcategory_id)VALUES('".$catid."','".$rowsubcat['subcategory_id']."')";
  $resultcat=mysqli_query($conn,$insertcatsubcat);  
}
   if($result==true && $resultcat==true){
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
          <h5 class="modal-title" id="exampleModalLongTitle">Add Subcategory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="back">
        <p>New Subcategory is added succesfully!</p>
        
    <div class="modal-footer">
        <a href="subcategory_list.php" role="button" class="btn btn-primary">OK</a>
        </div>
      </div>
    </div>
    </div>
    </div>
    <?php
   }else{
    echo "Error: " . $insertsubcat . "<br>" . $conn->error;
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
  <!-- modal -->
   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search category names.." title="Type in a name" style="float:right;  border:2px solid orange;">&nbsp;&nbsp;
  <button id="sort" class="btn btn-primary"onclick="sortTable()"style="float:right;margin-right:10px;margin-top:10px;">Sort</button>

<button type="button" class="btn btn-warning glyphicon glyphicon-plus"  id="button1" data-toggle="modal" data-target="#subcat">Add Subcategory</button>
<div class="modal fade" id="subcat"  role="dialog">
<div class="modal-dialog">
<div class="modal-content" id="cat">
<div class="modal-header">
  <h4 class="modal-title">Add Subcategory</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="back">
<form action="" method="POST" id="form3">
<div class="form-group">
  
  <select class="form-control" id="category" name=category[]>
      <option  value="">Select Category</option>
        <?php
          include("db-config.php");
          $sql="SELECT * FROM category";
          $res=mysqli_query($conn,$sql);
          while($rowcat=mysqli_fetch_assoc($res)){
        ?>  
        <option value="<?php echo ($rowcat['category_id'])?>" >
        <?php echo($rowcat['category_name']) ?>
        </option>
        <?php
        }
            
        ?>
  </select>
  <span id="categoryErr"></span>
</div>
<div class="form-group">
  <input type="text" placeholder="Enter Subcategory Name" name="subcategory" id="subcategory" class="form-control">
  <span id="subcategoryErr"></span>
</div>
<div class="modal-footer">
  <button type="submit"  class="btn btn-success" id="add_subcat">Add subcategory</button>
  <button type="reset" class="btn btn-danger" data-dismiss="modal">Clear</button>
</div>
</form>
</div>
</div>
</div>
</div><!--model-->

<div class="container">
 <div class="row">  
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
<br>
<div id="Edit">
<div class="table table-responsive" id="subtable">
  <h3 class="text-center" id="list">SubCategory List</h3>

<table class="table table-bordered" id="myTable" style="width: 100%;">                     
<thead>
  <tr id="table">
  <th>Category</th>
   <th>Subcategory</th>
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
$totalsql = "SELECT * FROM subcat_cat";
$allproductResult = mysqli_query($conn, $totalsql);
$totalproduct = mysqli_num_rows($allproductResult);
$lastPage = ceil($totalproduct/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;

$catsubcat="SELECT * FROM subcat_cat LIMIT $startFrom, $showRecordPerPage";
$sql=mysqli_query($conn, $catsubcat);
  while($row = $sql->fetch_assoc()) {
    echo "<tr class='info'>";
     $catname="SELECT category_name  FROM category where category_id=".$row['category_id'];
     $sql1=mysqli_query($conn, $catname);
     $rowcatname=mysqli_fetch_assoc($sql1);
      $subcatname="SELECT subcategory_name  FROM subcategory where subcategory_id=".$row['subcategory_id'];
      $sql2=mysqli_query($conn, $subcatname);
      $rowsubcatname=mysqli_fetch_assoc($sql2);
       echo"<td>".$rowcatname['category_name']."</td>";
      
     echo"<td>".$rowsubcatname['subcategory_name']."</td>";
    echo"<td><button id='".$row['subcategory_id']."' class='editsub'><span class='glyphicon glyphicon-edit' id='edit'></span></button> &nbsp;&nbsp&nbsp;&nbsp";
    echo"<button id='".$row['subcategory_id']."' class='deletesub'><span class='glyphicon glyphicon-trash' id='delete'></span></button></td>";
    echo"</tr>";
    
  } 
?>

 </tbody>
</table>
</div>
</div>
</div>
<div class="col-sm-2"></div>
</div>
</div>

<nav aria-label="Page navigation" class="text-center" id="paginationsub">
<ul class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
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
  $("#add_subcat").click(function(e){
    e.preventDefault();
    var subcategory = $("#subcategory").val();
    var category = $("#category option:selected").val();
     var status=true;
    if(subcategory == "") {
      $("#subcategory").css('border', 'red');
      $("#subcategoryErr").text("Please Enter Subcategory").css('color','red');
      status=false;
    }else {
      $("#subcategory").css('border-color', '');
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
        $("#form3").submit();
        }
    });
});
</script> 
<script>
  $(document).ready(function () {

        $(".editsub").click(function () {
          var variable = $(this).attr('id');
      
            $.ajax({
                url: 'editsubcategory.php',
                type:'POST',
                dataType: 'text',
                data: {test: variable},
                success: function (rspns) {
                $("#subtable").remove();
                $("#paginationsub").remove();
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

        $(".deletesub").click(function () {
          var variable = $(this).attr('id');
      
            $.ajax({
                url: 'deletesubcategory.php',
                type:'POST',
                dataType: 'text',
                data: {test: variable},
                success: function (rspns) {
                $("#subtable").remove();
                $("#paginationsub").remove();
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

