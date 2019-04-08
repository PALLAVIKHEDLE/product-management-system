<?php
include("db-config.php");
 $selected = "";
  $subcat="SELECT * from subcat_cat WHERE category_id={$_POST['category_id']}";
            $resultquery=mysqli_query($conn,$subcat);
             while($subcatrow = $resultquery->fetch_assoc()){
           
    $sql1="SELECT * FROM subcategory where subcategory_id='". $subcatrow['subcategory_id']."'";  
           $res1=mysqli_query($conn,$sql1);
         while($rowsubcat = $res1->fetch_assoc()){
         	if($rowsubcat['subcategeory_id'] == $subcatrow['subcategeory_id']){
              $selected = "selected";
         	// echo "<option value='{$rowsubcat["subcategory_id"]}'> {$rowsubcat["subcategory_name"]}</option>";
			}
            ?>  
             <option value="<?php echo ($rowsubcat['subcategory_id'])?>" <?php echo $selected ?>> 
            <?php echo($rowsubcat['subcategory_name']) ?>
             </option> 
            <?php
                $selected = "";
            
        
         }
     }
?>