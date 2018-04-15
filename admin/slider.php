<?php
  require "config.php";
 require "header.php";
   
	$query = mysqli_query($db,"select * from slider");
	$array = mysqli_fetch_array($query);

  
	function test($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripslashes($data);
		return $data;
	}  

    
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
					
					move_uploaded_file($image,"../uploads/slide/".$new_image.".".$format);
					mysqli_query($db, "insert into slider (images,arm_text,eng_text) values ('$new_image"."."."$format','$arm','$eng')"); 
				 }
			}
	}

       				
      

?>
					
<html>
    
<body>
					
<div class="fixed_slider"></div>

		<div class="container" style="text-align: center;margin-top: 50px;">
			<form method="POST" action="" enctype="multipart/form-data">
				<h2></h2>
					<input type="text" name="arm_text" value="" placeholder="Arm Name" class="input"style="width: 400px;
					height: 30px;"><br>
					
					<input type="text" name="eng_text" value="" placeholder="Eng Name" class="input"style="width: 400px;height:30px;margin: 3px;"><br>
					
					<input type="file" name="image" style="display: inline-block;">
					<input type="submit" name="submit_image" value="Upload">
			</form>
		</div>
    <div class="err"></div>
		<div class="container" >
			<table class="table table-bordered" style="margin-top:100px;">
				<thead style="text-align: center;">
					<tr>
						<th style="text-align: center;">Arm Text</th>
						<th style="text-align: center;">Eng Text</th>
						<th style="text-align: center;">Delete</th>
					</tr>
					</thead>
				<tbody id="sort_slide">
					<?php $query = mysqli_query($db, "select * from  slider order by check_a asc"); ?>
					<?php mb_internal_encoding("UTF-8");?>
					<?php while($blog = mysqli_fetch_array($query)){ ?>
						<tr class="tr" id="<?php echo $blog['id']; ?>">
							<td class="slide_text"><?php echo mb_substr($blog['arm_text'],0,15);?></td>
							<td class="slide_text"><?php echo mb_substr($blog['eng_text'],0,15);?></td>
							
							<td><span data-toggle='modal' data-target='#myModal' class='glyphicon glyphicon-trash delete slide'data-name="slide" data-id=" <?php echo $blog['id'];?> "></span></td>
						</tr>
					<?php }; ?>
                </tbody>
				
			</table>
		</div>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content"style="background-color: rgba(8, 8, 8, 0.81);">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<div class="modal-body text-center">
						<h4 style="color: #fff;font-size: 14px;">Are you sure you want to delete this blog??</h4>
						<button type="button" class="btn btn-info yes" name="yes" data-dismiss="modal">YES</button>
						<button type="button" class="btn btn-info no" name="no" data-dismiss="modal">NO</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>