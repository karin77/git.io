<?php
  require "config.php";
 require "header.php";
   
	$query = mysqli_query($db,"select * from images");
	$array = mysqli_fetch_array($query);

  
	function test($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripslashes($data);
		return $data;
	}  

    
   if(isset($_POST['submit_image'])){
                        
		
		$title = test($_POST['name']);
		$comm = test($_POST['comment']);
		$arm = test($_POST['arm_name']);
		$com = test($_POST['arm_comment']);
		
		$image = $_FILES["image"]["tmp_name"];
		$image_name = $_FILES["image"]["name"];
		if(empty($image_name)){
			mysqli_query($db, "insert into images (img_name,eng_name,eng_comment,arm_name,arm_comment) values ('','$title','$comm','$arm','$com')"); 
		}
			else{
				$allowed_formats = array('jpeg','jpg','gif','png');
				$img_arr = explode(".",$image_name);
				$format = end($img_arr);
				if(in_array($format,$allowed_formats)){
					$date = date(DATE_ATOM);
					$new_name = $date.$image_name;
					$new_image = md5($new_name);
					
					move_uploaded_file($image,"../uploads/".$new_image.".".$format);
					mysqli_query($db, "insert into images (img_name,eng_name,eng_comment,arm_name,arm_comment) values ('$new_image"."."."$format','$title','$comm','$arm','$com')"); 
				 }
			}
	}

       				
      

?>
					
<html>
 
       
         
  
<body>
					


		<div class="container" style="text-align: center;margin-top: 50px;">
			<form method="POST" action="" enctype="multipart/form-data">
				<h2>Add</h2>
					<input type="text" name="name" value="" placeholder="Title" class="input"style="width: 400px;
					height: 30px;"><br>
					<textarea name="comment" rows="5" cols="40" placeholder="comment"style="    width: 400px; height: 159px;margin: 3px;"></textarea><br>
					<input type="text" name="arm_name" value="" placeholder="Title Arm" class="input"style="width: 400px;height:30px;margin: 3px;"><br>
					<textarea name="arm_comment" rows="5" cols="40" placeholder="comment Arm"style="    width: 400px;height:159px;margin:20px;"></textarea><br>
					<input type="file" name="image" style="display: inline-block;">
					<input type="submit" name="submit_image" value="Upload">
			</form>
		</div>
		<div class="err"></div>
		<div class="container" >
			<table class="table table-bordered" style="margin-top:100px;">
				<thead style="text-align: center;">
					<tr>
						<th style="text-align: center;">Title</th>
						<th style="text-align: center;">Comment</th>
						<th style="text-align: center;">Title Arm</th>
						<th style="text-align: center;">Comment Arm</th>
						<th style="text-align: center;">Edit</th>
						<th style="text-align: center;">Delete</th>
					</tr>
                  </thead>
				    <tbody id="sort_blog">
					<?php $query = mysqli_query($db, "select * from  images order by check_a asc"); ?>
					<?php mb_internal_encoding("UTF-8");?>
					<?php while($blog = mysqli_fetch_array($query)){ ?>
				
						<tr class="tr" id="<?php echo $blog['id'];?>">
						 
							<td class="ui-state-default" class="arm"><?php echo mb_substr($blog['eng_name'],0,15);?><span class="ui-icon ui-icon-arrowthick-2-n-s" ></span></td>
							<td class="arm"><?php echo mb_substr($blog['eng_comment'],0,15);?></td>
							<td class="arm"><?php echo mb_substr($blog['arm_name'],0,15);?></td>
							<td class="arm"><?php echo mb_substr($blog['arm_comment'],0,15);?></td>
							<td><a href="edit.php?blog_id=<?php echo $blog['id']; ?>"><span  class='glyphicon glyphicon-edit edit btn btn-default btn-lg' class="myBtn" id="myBtn" data-id="<?php echo $blog['id']; ?>"></span></a></td>
							<td><span data-toggle='modal' data-target='#myModal' class='glyphicon glyphicon-trash delete'data-name="blog" data-id=" <?php echo $blog['id'];?> "></span></td>
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


