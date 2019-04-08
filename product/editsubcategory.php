<?php
 include("session.php");
//include("header.php");
include("db-config.php"); 

?>  
<!-- <br><br>
<div class="container"> -->
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6" style="padding:15px;background: lightgrey;">
  <form action="editsub.php" method="POST" id="editsubcatform">

<?php

 $subcatID = $_POST['test'];

   $sql="SELECT * FROM subcat_cat WHERE subcategory_id='".$subcatID."'";  
   $res=mysqli_query($conn, $sql);
   $row=mysqli_fetch_assoc($res);

   $sql1="SELECT * FROM subcategory WHERE subcategory_id='".$subcatID."'"; 
   $res1=mysqli_query($conn, $sql1);
   $row1=mysqli_fetch_assoc($res1);

   $sql2="SELECT * FROM category WHERE category_id='".$row['category_id']."'"; 
   $res2=mysqli_query($conn, $sql2);
   $row2=mysqli_fetch_assoc($res2);
 
?>
<a href="subcategory_list.php" role="button" class="btn btn-primary glyphicon glyphicon-arrow-left">&nbsp;Back</a><br>
<div class="form-group">
        <label>category</label>
        <select name="category" class="form-control" id="category" required>
        <option value="">Select category</option>
          <?php
            $selected = "";
            $sqlcategory="SELECT * FROM category";
            $rescategory=mysqli_query($conn,$sqlcategory);
            while($catnames=mysqli_fetch_assoc($rescategory))
            {
             if($catnames['category_id'] == $row['category_id']){
              $selected = "selected";
            }

            ?>  
            <option value="<?php echo ($catnames['category_id'])?>" <?php echo $selected; ?>>
            <?php echo($catnames['category_name']);?>
            </option>
            <?php
               $selected = ""; 
           }
          ?>
        </select>
      
        </div>
<div class="form-group">
<label>Subcategory</label>
<?php
 
  ?>
  <input type="hidden" name="subid" class="form-control" value="<?php echo $subcatID; ?>">
<input type="text" name="subcategoryname" id="subcategory" class="form-control" value="<?php echo $row1['subcategory_name']; ?>" required>

</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary" id="subcatupdate" >Update</button>
</div>
</form>
</div><!-- 6 close-->
<div class="col-sm-3"></div>
</div>
<!-- </div> -->

<?php
  include("footer.php");
?>   