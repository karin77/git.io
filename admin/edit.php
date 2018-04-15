<?php
  require "config.php";
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
				  $query = mysqli_query($db,"select * from images");
				   $array = mysqli_fetch_array($query);

				if(isset($_POST['submit_image'])){
								
					$title = test($_POST['name']);
					$comm = test($_POST['comment']);
					$arm = test($_POST['arm_name']);
                    $com = test($_POST['arm_comment']);
                    $image =$_FILES["image"]["tmp_name"];
					$image_name = $_FILES["image"]["name"];
					if(empty($image_name)){
						  mysqli_query($db, "insert into images (img_name,name,comment, arm_name,) values ('','$title','$comm','$arm','$com')"); 
					}
						else{
							$allowed_formats = array('jpeg','jpg','gif','png');
							$img_arr = explode(".",$image_name);
							$format = end($img_arr);
							if(in_array($format,$allowed_formats)){
								move_uploaded_file($image,"../uploads/".$image_name);
								 mysqli_query($db, "insert into images (img_name,name,arm_name,arm_comment,) values ('$image_name','$title','$comm','$arm','$com')"); 
							 }
						}
				}
			
				$sql = mysqli_query($db, "select * from images where id = '$id'");
				$array = mysqli_fetch_array($sql);
				$src = "../uploads/".$array['img_name'];  				
			
					}
		}
	else{
		header("Location: blog.php");
	}  

?>
					


    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
   <html>
  <body>
  <nav class="navbar navbar-default navbar-inverse" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar- collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Admin</a>
            </div>
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">HOME</a></li>
            <li><a href="blog.php">BLOG</a></li>
            
        </ul>
          <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-out"></span>Log Out</a>
			
        </li>
      </ul>
    </div>
  </div>
</nav>
   <div class="container" style="text-align: center;margin-top: 50px;">
    <form method="POST" action="" enctype="multipart/form-data">
         <h2>Edit</h2>
          <input type="text" name="name" placeholder="Title" class="input"style="width: 400px;
          height: 30px;"><br>
          
           <textarea name="comment" rows="5" cols="40" placeholder="comment"style="    width: 400px; height: 159px;margin: 3px;"></textarea><br>
            <input type="text" name="arm_name" value="<?php echo $array['arm_name']?>" placeholder="Title Arm" class="input"style="width: 400px;height:30px;margin: 3px;"><br>
             
          <textarea name="arm_comment" value="<?php echo $array['arm_comment']?>" rows="5" cols="40" placeholder="comment Arm"style="    width: 400px;height:159px;margin:20px;"></textarea><br>
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