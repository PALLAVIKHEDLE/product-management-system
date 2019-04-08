<?php
include("header.php");
include("session.php");
?>
<style>
#pic1{background-image: url("backgrnd.jpg"); background-repeat:no-repeat,
background-size:auto; padding:25px; color:white;}
.fontsize{font-size: 18px;font-weight: bold;font-family: cursive;}
.style_div{
    position: relative;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1); 
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1); 
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1);
    transition: all 200ms ease-in;
    transform: scale(1);   

}
.style_div:hover
{
    box-shadow: 0px 0px 150px #000000;
    z-index: 2;
    -webkit-transition: all 500ms ease-in;
    -webkit-transform: scale(1.5);
    -ms-transition: all 500ms ease-in;
    -ms-transform: scale(1.5);   
    -moz-transition: all 500ms ease-in;
    -moz-transform: scale(1.5);
    transition: all 500ms ease-in;
    transform: scale(1.5);
}
.dashboard .style_div:hover {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    -moz-transform: scale(1);
    transform: scale(1);
    box-shadow: 0px 0px 22px #b5b5b5;
  }
  #pic1:hover {
    background-position: center left;
}
#pic1 h4.text-center {
    font-size: 21px;
    font-weight: 700;
}
</style>
<?php
      $result  = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `category`");
      $row     = mysqli_fetch_array($result);
      $countcat   = $row['count'];
      $result1 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `subcategory`");
      $row1    = mysqli_fetch_array($result1);
      $countsubcat  = $row1['count'];
      $result2 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `product`");
      $row2    = mysqli_fetch_array($result2);
      $countproduct  = $row2['count'];

?>
<br><br>
<div class="container dashboard">
 <div class="row">
     <div class="col-md-4 col-sm-12">
      <a href="category_list.php">
         <div class=" img-rounded fontsize style_div" id="pic1">
               
               <center><i class="fa fa-list-alt fa-3x"></i></center>
               <h4 class="text-center">Total Category</h4>
               <center><i><?php echo $countcat;?> </i></center>
         </div>
      </a>
      </div>
      <div class="col-md-4 col-sm-12">
      <a href="subcategory_list.php">
         <div class=" img-rounded fontsize style_div" id="pic1">
               
               <center><i class="fa fa-list-alt fa-3x"></i></center>
               <h4 class="text-center">Total Subcategory</h4>
               <center><i><?php echo $countsubcat;?> </i></center>
         </div>
      </a>
      </div>
      <div class="col-md-4 col-sm-12">
       <a href="product_list.php">
         <div class=" img-rounded fontsize style_div" id="pic1">
                 
               <center><i class="fa fa-list-alt fa-3x"></i></center>
               <h4 class="text-center">Total Product</h4>
               <center><i><?php echo $countproduct;?> </i></center>
         </div>
      </a>
    </div>
   </div>
 </div>


<br><br><br><br>
<form action="showproduct.php" method="POST" id="showpro">
  <div class="container">
   <div class="row">
    <div class="col-sm-2"></div>
    <div  class="col-sm-3">
        <select class="form-control" name="category" id="category">
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
		<div class="col-sm-3">
			 <select class="form-control" name="subcategory" id="subcategory">
		   	<option  value="">Select Subcategory</option>
				
      	</select>
           <span id="subcatErr"></span>
		</div>
 <div class="col-sm-2">
		<div class="form-group">
			<button type="submit" class="btn btn-warning btn-sm" id="listproduct">Show Product</button>
      <a href="main.php" class="btn btn-success">Reset</a> 
   </div>
</div>
<div class="col-sm-2"></div>
</div>
</div>
</form>
 <script src="js/dashvalidate.js"></script>
<?php
	include("footer.php");
?>
<script  type="text/javascript">
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

<br><br>
<form action="showsubcat.php" method="POST" id="showsubcat">
  <div class="container">
   <div class="row">
    <div class="col-sm-2"></div>
    <div  class="col-sm-5 form-group">
        <select class="form-control" name="category1" id="category" required>
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
    </div>
    <div class="col-sm-5 form-group">
      <button class="btn btn-primary btn-sm" type="submit">Show Subcategory</button>
       <a href="main.php" class="btn btn-success">Reset</a> 
    </div>
  </div>
</div>
</form>