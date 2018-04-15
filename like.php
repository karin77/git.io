<?php
    require "admin/config.php";
    session_start();
	
	if(isset($_POST['liked'])){
		
		if(isset($_SESSION['id'])){
			$blog_id = $_POST["liked"];
			$user_id = $_SESSION['id'];
			
			$query = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and user_id='$user_id'");
			$row = mysqli_num_rows($query);
			if($row == 0){
				mysqli_query($db, "insert into like_unlike (likes, unlike, user_id, blog_id) values ('0','0','$user_id','$blog_id')");
			}
			
			$query = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and user_id='$user_id' and likes = '1'");
			$row = mysqli_num_rows($query);
			if($row == 0){
				mysqli_query($db, "update like_unlike set likes = '1',unlike = '0' where blog_id='$blog_id' and user_id='$user_id'");
				$sql = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and likes = '1'");
				$like_rows = mysqli_num_rows($sql);
				$sql = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and unlike = '1'");
				$dis_rows = mysqli_num_rows($sql);
				$result = array($like_rows,$dis_rows);
				echo json_encode($result);
			}
			else{
				echo "liked";
			}
		}
		else{
			echo "0";
		}
		
	}
	

   if(isset($_POST['dislike'])){
		
		if(isset($_SESSION['start'])){
			$blog_id = $_POST["dislike"];
			$user_id = $_SESSION['id'];
			
			$query = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and user_id='$user_id'");
			$row = mysqli_num_rows($query);
			if($row == 0){
				mysqli_query($db, "insert into like_unlike (likes, unlike, user_id, blog_id) values ('0','0','$user_id','$blog_id')");
			}
			
			$query = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and user_id='$user_id' and unlike = '1'");
			$row = mysqli_num_rows($query);
			if($row == 0){
				mysqli_query($db, "update like_unlike set unlike = '1',likes = '0' where blog_id='$blog_id' and user_id='$user_id'");
				$sql = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and likes = '1'");
				$like_rows = mysqli_num_rows($sql);
				$sql = mysqli_query($db, "select * from like_unlike where blog_id='$blog_id' and unlike = '1'");
				$dis_rows = mysqli_num_rows($sql);
				$result = array($like_rows,$dis_rows);
				echo json_encode($result);
			}
			else{
				echo "dislike";
			}
		}
		else{
			echo "0";
		}
		
	}
	 
	 
	 if(isset($_POST['msg'])){
		$msg = $_POST["msg"];
		$name = $_POST['name'];	
		$email = $_POST['email'];	
		$headers = 'From: '.$email."\r\n".
					'Reply-To: '.$email."\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
		if(!empty($msg) && !empty($name) && !empty($email)){
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "0";
			}
			else{
				mysqli_query($db, "insert into email_cont (name, message, email) values ('$name','$msg','$email')");
				//mail("wamp.contact@gmail.com","Message",$msg,$headers);
				echo "1";
			}
			
		}
		else{
			echo "2";
		}
	}
	    
?>
