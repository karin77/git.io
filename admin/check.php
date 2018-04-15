<?php
   require "config.php";
    session_start();
    if(isset($_SESSION['admin'])){
        mysqli_query($db,"update users set admin = '1'");
    }
    else{
        header("Location: http/localhost/percent/admin");
    }
	
		
     if(isset($_POST['del'])){
		$name = $_POST['name'];
        if($name == "blog"){
			$del = $_POST['del'];  
			$sql = mysqli_query($db,"select * from images where id = '$del'");  
			$arr = mysqli_fetch_array($sql);
			unlink("../uploads/".$arr['img_name']);
			mysqli_query($db, "delete from images where id = '$del'");    
        }
        elseif($name == "slide"){
			$slide = $_POST['del'];
			$sql = mysqli_query($db,"select * from slider where id = '$slide'");
			$arr = mysqli_fetch_array($sql);
			unlink("../uploads/".$arr['images']);
			mysqli_query($db, "delete from slider where id = '$slide'");
		}
		elseif($name == "comment") {
			$del = $_POST['del'];  
			mysqli_query($db, "delete from comment_db where id = '$del'");
		} 
         elseif($name == "cat") {
			$del = $_POST['del'];  
			mysqli_query($db, "delete from category where id = '$del'");
		}       
		elseif($name == "prod") {
			$del = $_POST['del'];  
			mysqli_query($db, "delete from products where id = '$del'");
		}       
	}	
        if(isset($_POST['quest'])){
            $ok = $_POST['quest'];
            mysqli_query($db, "update comment_db set admin='1' where id = '$quest'");
        }	
         if(isset($_POST['ok'])){
            $ok = $_POST['ok'];
            mysqli_query($db, "update comment_db set admin='1' where id = '$ok'");
        }	
  

    if(isset($_POST["order"])){
            $order = $_POST['order'];
            for($i=0;$i<count($order);$i++){
                $sql = mysqli_query($db,"update images set check_a = ".$i." where id = '$order[$i]'");
                echo "1";
            }
        }

    
     if(isset($_POST["comm"])){
            $comm = $_POST['comm'];
            for($i=0;$i<count($comm);$i++){
                $sql = mysqli_query($db,"update comment_db set check_a = ".$i." where id = '$comm[$i]'");
                echo "1";
            }
        }


		if(isset($_POST["slider"])){
            $slider= $_POST['slider'];
            var_dump($slider);
            for($i=0;$i<count($slider);$i++){
                $sql = mysqli_query($db,"update slider set check_a = ".$i." where id = '$slider[$i]'");
                echo "1";
            }
        }
		if(isset($_POST['new_text'])){
			$new_text = $_POST['new_text'];
			$id = $_POST['id'];
			$lang = $_POST['lang'];
				mysqli_query($db, "update slider set ".$lang."_text = '$new_text' where id = '$id'");
				echo "1";
		}
		
		
		//------ Product's main image selector ------//
		if(isset($_POST['check'])){
			$prod_id = $_SESSION['prod_id'];
			$checked = $_POST['check'];
			mysqli_query($db,"update pictures set avatar = '0' where product_id = '$prod_id'");
			mysqli_query($db,"update pictures set avatar = '1' where product_id = '$prod_id' and id = '$checked'");
			echo "1";
		}
		
		
  
        
?>
	