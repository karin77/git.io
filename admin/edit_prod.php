<?php
     
    require "config.php";
	require "header.php";
   $error = "";
session_start(); 
   $prod_id = $_GET['prod_id'] ;
   $_SESSION['prod_id'] = $prod_id;
    
	if(isset($_POST['Edit_Product'])){
          $arm = $_POST['name_arm'];
          $eng = $_POST['name_eng'];
        
        
          $numb = $_POST['number'];
          $val = $_POST['value'];
          $sal = $_POST['sale'];
          $desc = $_POST['description'];
        
      
      if(!empty($arm)&& !empty($eng) && !empty($numb) && !empty($val) && !empty($sal) && !empty($desc)){
			$query = mysqli_query($db, "update products set name_arm = '$arm' , name_eng ='$eng',number='$numb',value = '$val', sale = '$sal',description = '$desc' WHERE id= '$prod_id'") or die(mysqli_error($db));
		}    
        else{
            $error ="
                <div class='alert alert-danger'>
                <strong>Error!</strong> complete all files.
               </div>
               "; 
        }
    }
	
	$query = mysqli_query($db,"select * from products where id = '$prod_id'");
	$array = mysqli_fetch_array($query);
    
   if(isset($_POST['btn_upload'])){
       
       if(!file_exists("../"."uploads/category/".$array['id']."-" .$array['category_id'])){
           mkdir("../"."uploads/category/".$array['id']."-".$array['category_id']);
        } 
        for($i=0; $i<count($_FILES["image"]["name"]); $i++){
            $image = $_FILES["image"]["tmp_name"]["$i"];
            $image_name = $_FILES["image"]["name"]["$i"];
            
            $allowed_formats = array('jpeg','jpg','gif','png');
            $img_arr = explode(".","$image_name");
			$format = end($img_arr);
            
            if(in_array($format,$allowed_formats)){
                move_uploaded_file($image,"../"."uploads/category/".$array['id']."-".$array['category_id']."/".$image_name);
                mysqli_query($db,"insert into pictures (img_name,product_id) values ('$image_name','$prod_id')");
            }
            else{
                 $error ="
						<div class='alert alert-danger'>
							<strong> Error!</strong> Invalid file format.
					   </div>
					   "; 
            }
        }
   }
?>
<link rel="stylesheet" href="CSS/style.css">
    <form action="" method="post" class="form-horizontal">
<fieldset>

<div class="container text-center">
<legend>PRODUCTS</legend>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Arm name</label>  
  <div class="col-md-4">
  <input  name="name_arm" class="form-control input-md" required="" type="text" value="<?php echo $array['name_arm']?>">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Eng NAME</label>  
  <div class="col-md-4">
  <input  name="name_eng"  class="form-control input-md" required="" type="text" value="<?php echo $array['name_eng']?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Number</label>  
  <div class="col-md-4">
  <input  name="number" class="form-control input-md" required="" type="number" value="<?php echo $array['number']?>">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Value</label>
  <div class="col-md-4">
  <input  name="value" class="form-control input-md" required="" type="number" value="<?php echo $array['value']?>">
    </div>
  </div>



<div class="form-group">
  <label class="col-md-4 control-label" for="available_quantity">Sale</label>  
  <div class="col-md-4">
  <input  name="sale" class="form-control input-md" required="" type="number" value="<?php echo $array['sale']?>">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">Description</label>
  <div class="col-md-4">                     
    <input class="form-control" name="description"  value="<?php echo $array['description']?>">
    <button type="submit" name="Edit_Product" class="btn btn-default" data-toggle="modal">Edit Product</button>
  </div>
</div>
 </fieldset>
</form>
			<?php 
				$query = mysqli_query($db, "select * from pictures where product_id = '$prod_id'"); 
				while($img = mysqli_fetch_array($query)){
						if($img['avatar'] == 1){
							echo "<div class='image_div checked_img'>
									<img class='image' src = '../uploads/category/".$array['id']."-".$array['category_id']."/".$img['img_name']."'>
									<input type='checkbox' name='av_image' class='av_image' ><span class='glyphicon glyphicon-ok main_img checked' data-id='".$img['id']."' data-prod-id='".$img['product_id']."' '></span>
								</div>";
							}else{
								echo "<div class='image_div'>
								    	<img class='image' src = '../uploads/category/".$array['id']."-".$array['category_id']."/".$img['img_name']."'>
										<input type='checkbox' name='av_image' class='av_image' ><span class='glyphicon glyphicon-ok main_img' data-id='".$img['id']."' data-prod-id='".$img['product_id']."'></span>
									</div>";
							}
				}; 
			?>
    
    
 
<form action="" method="POST" enctype="multipart/form-data">
    
    <input type="file" name="image[]" multiple />
    <input type="submit" value="upload" name="btn_upload">
</form>
    
 <?php echo $error; ?>
