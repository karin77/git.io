<?php
 require "admin/config.php";
   require "header.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
			if(!filter_var($id, FILTER_VALIDATE_INT)){
				header("Location: http://localhost/blog5/blog/blog.php");
			}
			else{
				$check = mysqli_query($db, "select * from images where id = $id");
				$check_row = mysqli_num_rows($check);
				if($check_row == 0){
					header("Location: http://localhost/blog5/blog/blog.php");
				}else{
					$sql = mysqli_query($db, "select * from images where id = $id");
				}
			}
	}
	else{
		header("Location: blog.php");
	}
  
      $query = mysqli_query($db,"select * from  comment_db");
      $array = mysqli_fetch_array($query);
        
		if(isset($_POST['send'])){
         if(isset($_SESSION['start'])){
			$query = mysqli_query($db, "select * from images where id = $id");
			$arr = mysqli_fetch_array($query);
			
			$comment = $_POST['comment'];
			$email = $_SESSION['email'];
			$name = $_SESSION['name']." ".$_SESSION['surname'];
			$avatar = $_SESSION['avatar'];
			
			if(!empty($comment)){
				mysqli_query($db, "insert into comment_db (user, user_av, email, blog_id, blog_heading, comment, admin) values ('$name','$avatar','$email','$id','$arr[eng_name]','$comment','0')");
				$success = "
					<div class='alert alert-success'>
						Your comment is sent.It will appear if admin proves it.
					</div>
				";
			}
			else{
				$error = "
				<div class='alert alert-danger'>
					<strong>Error!</strong> Write something.
				</div>
			";
			}
			
		}
		else{
			$error = "
				<div class='alert alert-danger'>
					<strong>Error!</strong> You must Log In to comment.
				</div>
			";
		}
  }
 
      
        
        

?>


<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		
		
<body>
      <section class="section-top-40 section-bottom-66 section-sm-top-87 section-sm-bottom-100 bg-gray-dark"   style="background: rgb(51, 51, 51);">
       <div class="shell">
         <div class="range range-sm-center text-center">
           
            <div class="cell-xs-12">
              
               <h3><?php echo $blog?></h3>
    </div>
</div>
             
		   <section class="section5">
     
        <div class="container text-center">
			<?php while($array = mysqli_fetch_assoc($sql)){ ?>   
				<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="col-sm-12 col">
						<div class="row">
							<h4 ><?php echo $array[$lang.'_name'];?></h4>
							<span  style="margin-top:20px; color: #fff;">
								<?php
								  $date = mb_substr($array['blog_date'],0,10);
								  $arr = explode("-",$date);
								  $month = mktime(0,0,0, $arr[1],1);
								  $monthName = date('M',$month);
								  echo $arr[2]."," .$monthName .$arr[0]."by Walter Myers";
							   ?>
							</span>		
							<img style="width: 450px; height: 350px;" src="uploads/<?php echo $array['img_name'];?>">
							<div class="content"style="color:#fff;">
								<div class="form-group">
									<p><?php echo  mb_substr ($array[$lang.'_comment'],0,200);?>	</p>
								</div> 
							</div>             
						</div>
						<div class="container">
							<?php echo $error. $success. $login_error;?>
						</div>
						
						
						
						<div class="container comment text-left" style="color: #fff;">
							<div class="row">
								<h4>COMMENTS</h4>
							</div>
							<?php $comm = mysqli_query($db, "select * from comment_db where admin = '1' and blog_id = '$id' order by id desc");?>
							<?php while($array = mysqli_fetch_array($comm)){?>	
								<div class="row">
									<div class="media">
										<div class="media-left media-top">
											<img src="uploads/user_avatar/<?php echo $array['user_av'];?>" class="media-object"  style="width:80px">
										</div>
										<div class="media-body">
											<h4 class="media-heading"><?php echo $array['user'];?></h4>
											<span class="date"> 
												<?php
													$date = mb_substr($array['comment_date'],0,10);
													$arr = explode("-",$date);
													$month = mktime(0, 0, 0, $arr[1], 1);
													$monthName = date('M', $month );
													echo $arr[2].".".$monthName.".".$arr[0];
												?>
											</span>
											<p><?php echo $array['comment'];?></p>
										</div>
									</div>
									<hr>
								</div>
							<?php };?>
						</div>
						<div class="grid">
                    <span id="status"></span><br>
                 
                    </div>
						
           
                 
                  
                   	<div class="like">
                           <span class="likes" data-id="<?php echo $id;?>">Like<i class="fa fa-1x fa-thumbs-up" aria-hidden="true"></i>
						   <?php 
								$like = mysqli_query($db, "select * from like_unlike where blog_id = '$id' and likes = '1'");
								$likes = mysqli_num_rows($like);
								echo $likes;
							?>
						   </span>
				          
						  <span class="dislike" data-id=" <?php echo $id;?> ">Dislike<i class="fa fa-1x  fa-thumbs-down" aria-hidden="true"></i>
							<?php 
								$dislike = mysqli_query($db, "select * from like_unlike where blog_id = '$id' and unlike = '1'");
								$dislikes = mysqli_num_rows($dislike);
								echo $dislikes;
							?>
						  </span>
						</div>
		                 
						
						<div class="row">
							<form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
								<textarea placeholder="Comment" class="form-control" rows="5" name="comment"></textarea>
								<input type="submit" name="send" value="Send commment" style="float: left;
                                margin-top: 9px;"> 
							</form>
						</div>
					
						 
						

					</div>
				</div>
			<?php };?>
      </div>
 </div>  
      
     </section>
</div>

</section> 
       
    <footer class="page-foot bg-gray-darker"style="background:#000;">
       <div class="shell text-center">
        <div class="range">
         <div class="cell-xs-12">
           <ul class="list-inline list-inline-sm iconlist">
                <li><a href="#"><span><i  class="fa fa2 fa-2x fa-facebook" aria-hidden="true"></i></span></a></li>
                <li><a href="#"><span ><i class="fa fa2 fa-2x fa-twitter" aria-hidden="true"></i></span></a></li>
                <li><a href="#"><span ><i class="fa fa2 fa-2x fa-google-plus" aria-hidden="true"></i></span></a></li>
                <li><a href="#"><span ><i class="fa fa2 fa-2x fa-rss" aria-hidden="true"></i></span></a></li>
    </ul>
</div>
       <div class="cell-xs-12 offset-top-25 list_a">
         <p class="rights"><a href="#" class="brand"style="text-decoration: none;">Soft App</a>&nbsp;©&nbsp;<span id="copyright-year">2017</span><span class="separator"></span>.<a href="#" class="link-white" style="text-decoration: none;">Privacy Policy</a>
   </p>
  </div>
    </div>
     </div>
      </footer>
     
      
   
    
  
  </body>
  
</html>