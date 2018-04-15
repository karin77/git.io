<?php
  require "config.php";
  require "header.php";
    $src = "";
   if(isset($_GET['blog_id'])){
			$id = $_GET['blog_id'];
			settype($id, 'integer');
		
				function test($data){
					$data = htmlspecialchars($data);
					$data = trim($data);
					$data = stripcslashes($data);
					return $data;
				}  
			if( ! filter_var($id, FILTER_VALIDATE_INT)){
						header("Location: blog.php");
					} 
					else{
				  $query = mysqli_query($db,"select * from slider");
				   $array = mysqli_fetch_array($query);

				 if(isset($_POST['submit_image'])){
                        
		
		
                    $eng = test($_POST['eng_text']);
                    $arm = test($_POST['arm_text']);


                    $image = $_FILES["image"]["tmp_name"];
                    $images = $_FILES["image"]["name"];
                    if(empty($images)){
			         mysqli_query($db, "insert into slider (images,arm_text,eng_text) values ('','$arm','$eng')"); 
		          }
			 else{
                    $allowed_formats = array('jpeg','jpg','gif','png');
                    $img_arr = explode(".",$images);
                    $format = end($img_arr);
                    if(in_array($format,$allowed_formats)){
                        $date = date(DATE_ATOM);
                        $new_name = $date.$images;
                        $new_image = md5($new_name);

                        move_uploaded_file($image,"../uploads/".$new_image.".".$format);
                        mysqli_query($db, "insert into slider (images,arm_text,eng_text) values ('$new_image"."."."$format','','$arm','$eng')"); 
				 }
			}
	}

       				

				$sql = mysqli_query($db, "select * from slider where id = '$id'");
				$array = mysqli_fetch_array($sql);
				$src = "../uploads/slide/".$array['images'];  				
			
					}
		}
	else{
		header("Location: blog.php");
	}  

?>
					

<html>
    
<body>
   
  <div class="container" style="text-align: center;margin-top: 50px;">
			<form method="POST" action="" enctype="multipart/form-data">
				<h2></h2>
					<input type="text" name="arm_text" value="<?php echo $array['arm_text']?>" placeholder="Arm Name" class="input"style="width: 400px;
					height: 30px;"><br>
					
					<input type="text" name="eng_text" value="<?php echo $array['eng_text']?>" placeholder="Eng Name" class="input"style="width: 400px;height:30px;margin: 3px;"><br>
					
					  <div class="form-group">
			        <label> Image </label><br>
			          <img class="image img-responsive" style="display: inline-block; width: 200px;" src="<?php echo $src;?>">
		     </div>
                     <input type="file" name="image" style="display: inline-block;">
                      <input type="submit" name="submit_image" value="Upload">
			</form>
		</div>


</body>
</html>