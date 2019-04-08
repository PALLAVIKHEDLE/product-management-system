<?php
include("header.php");
include("session.php");
include("db-config.php");
include("sort.php");

 if(isset($_POST['name']))
{  
  $subcategory=$_POST['subcategory'];
  $category=$_POST['category'];
  $Name=$_POST['name'];
  $Price=$_POST['price'];
  $Brand=$_POST['brand'];
  $Detail=$_POST['detail'];

 	$fileName    = $_FILES["images"]["name"];
	$fileType    = $_FILES["images"]["type"];
	$fileTmpName = $_FILES["images"]["tmp_name"];
	move_uploaded_file($fileTmpName, "../php/myphoto/$fileName");	

  $insertproduct = "INSERT INTO product(product_name,product_price,product_brand,product_details,product_image)
  VALUES('".$Name."','".$Price."','".$Brand."','".$Detail."','".$fileName."')";
  $result=mysqli_query($conn,$insertproduct);  

   $productid="SELECT product_id from product ORDER BY product_id DESC LIMIT 0 , 1" ; 
   $resultproduct=mysqli_query($conn,$productid); 
   $rowproduct=mysqli_fetch_assoc($resultproduct); 
 
  foreach ($subcategory as  $value) {  
 $insertcatsubcatpro = "INSERT INTO subcat_pro(category_id,subcategory_id,product_id)
  VALUES('".$category."','".$value."','".$rowproduct['product_id']."')";
  $resultcatpro=mysqli_query($conn,$insertcatsubcatpro);  
}
   if($result==true && $resultcatpro==true){
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
          <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="back">
        <p>New Product is added succesfully!</p>
        
    <div class="modal-footer">
        <a href="product_list.php" role="button" class="btn btn-primary">OK</a>
        </div>
      </div>
    </div>
    </div>
    </div>
    <?php
  
   }else{
    echo "Error: " . $insertcatsubcatpro . "<br>" . $conn->error;
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

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search category names.." title="Type in a name" style="float:right; border:2px solid orange;">
<button id="sort" class="btn btn-primary"onclick="sortTable()"style="float:right;margin-right:10px;margin-top:10px;">Sort</button>

<button type="button" class="btn btn-warning glyphicon glyphicon-plus"  id="button" data-toggle="modal" data-target="#myModal">Add Product</button>
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header" id="cat">
  <h4 class="modal-title" >Add Product</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="back">
<form action="product_list.php" method="POST" id="insertform" enctype="multipart/form-data">
  <div class="form-group">
  <label>Category</label>
  <select class="form-control" id="category" name="category">
  <option  value="">Select Category</option>
        <?php
          include("db-config.php");
          $sql="SELECT * FROM category";
          $res=mysqli_query($conn,$sql);
         while($rowcat = $res->fetch_assoc()){
             
        ?>  
        <option value="<?php echo ($rowcat['category_id'])?>" >
        <?php echo($rowcat['category_name']);  ?>
        <?php
        }
        ?>
  </select>
  <span id="categoryErr"></span> 
  </div>

  <div class="form-group">
  <label>Subcategory</label>
    <select class="form-control" id="subcategory" name="subcategory[]">
      <option  value="">Select Category First</option>
  </select>
  <span id="subcatErr"></span> 
  </div>
  <div class="form-group">
  <label>Product_Name</label>
  <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name">
  <span id="nameErr"></span> 
  </div>
  <div class="form-group">
  <label>product_Price</label>
  <input type="text" id="price" name="price" class="form-control" placeholder="Enter product price">
  <span id="priceErr"></span>
  </div>
  <div class="form-group">
  <label>Product_Brand</label>
  <input type="text" id="brand" name="brand" class="form-control" placeholder="Enter product brand">
  <span id="brandErr"></span>
  </div>
  <div class="form-group">
  <label>Product_Details</label>
  <textarea id="detail" name="detail" class="form-control" placeholder="Enter product details"></textarea>
  <span id="detailErr"></span>
  </div>
  <div class="form-group">
  <label>Product_Image</label>
  <input type="file" id="image" name="images" class="form-control" placeholder="insert product image">
  <span id="imageErr"></span>
  </div>
  
  <div class="modal-footer">
  <button type="submit" class="btn btn-success" id="addproduct">Add product</button>
  <button type="reset" class="btn btn-danger" data-dismiss="modal">Clear</button>
  </div>
</form>
</div>
</div>
</div>
</div><!--model-->
<div id="Edit">
<div class="table table-responsive" id="protable">
  <h3 class="text-center" id="list">Product List</h3>
<table class="table table-bordered" id="myTable">                     
<thead>
  <tr id="table">
  <th>Category</th>
   <th>Subcategory</th>
   <th>Product_name</th>
   <th>Product_price</th>
   <th>Product_brand</th>
   <th>Product_Details</th>
   <th>Product_Image</th>
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
$totalsql = "SELECT * FROM subcat_pro";
$allproductResult = mysqli_query($conn, $totalsql);
$totalproduct = mysqli_num_rows($allproductResult);
$lastPage = ceil($totalproduct/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;

$productcat="SELECT * FROM subcat_pro  LIMIT $startFrom, $showRecordPerPage";
$sql=mysqli_query($conn, $productcat);
while($row = $sql->fetch_assoc()) {
echo "<tr class='info'>"; 
$catname="SELECT category_name  FROM category where category_id='".$row['category_id']."'";
$sql1=mysqli_query($conn, $catname);
$rowcatname=mysqli_fetch_assoc($sql1);
$subcatname="SELECT subcategory_name  FROM subcategory where subcategory_id=".$row['subcategory_id'];
$sql2=mysqli_query($conn, $subcatname);
$rowsubcatname=mysqli_fetch_assoc($sql2);
$pro_Details="SELECT *  FROM product where product_id='".$row['product_id']."' ";
$sql3=mysqli_query($conn, $pro_Details);
$rowprodetails=mysqli_fetch_assoc($sql3);
    
    echo"<td>".$rowcatname['category_name']."</td>";
    echo"<td>".$rowsubcatname['subcategory_name']."</td>";
    echo"<td>".$rowprodetails['product_name']."</td>";
    echo"<td>".$rowprodetails['product_price']."</td>";
    echo"<td>".$rowprodetails['product_brand']."</td>";
    echo"<td>".$rowprodetails['product_details']."</td>";
  	echo"<td>"."<img src='../php/myphoto/".$rowprodetails['product_image']."'' height='50px' width='50px' class='img-responsive'>" ."</td>";
    echo"<td><button id='".$row['product_id']."' class='editpro'><span class='glyphicon glyphicon-edit' id='edit'></span></button>";
    echo"<button id='".$row['product_id']."' class='deletepro'><span class='glyphicon glyphicon-trash' id='delete'></span></button></td>";
    echo"</tr>";
    
  } 
?>

 </tbody>
</table>
</div>
</div>
<nav aria-label="Page navigation" class="text-center" id="paginationpro">
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

<?php
	include("footer.php");
?>
<script src="js/validate.js"></script>
 <script>
$(document).ready(function(){
    $('#category').on('change',function(){
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

<script>
  $(document).ready(function () {

        $(".editpro").click(function () {
          var variable = $(this).attr('id');
      
            $.ajax({
                url: 'editproduct.php',
                type:'POST',
                dataType: 'text',
                data: {test: variable},
                success: function (rspns) {
                $("#protable").remove();
                $("#paginationpro").remove();
                $("#button").remove();
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

        $(".deletepro").click(function () {
          var variable = $(this).attr('id');
      
            $.ajax({
                url: 'deleteproduct.php',
                type:'POST',
                dataType: 'text',
                data: {test: variable},
                success: function (rspns) {
                $("#protable").remove();
                $("#paginationpro").remove();
                $("#button").remove();
                $("#sort").remove();
                $("#myInput").remove();
                $("#Edit").append(rspns);
              
                }
            });
        });
    });

</script>