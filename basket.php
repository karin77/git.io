<?php
   require "admin/config.php";
    session_start();
	$lang = "arm";

	if(isset($_POST['prod_id_add'])){
		if(!isset($_SESSION["array"])){
          $id =$_POST['prod_id_add'];
          	if(!filter_var($id, FILTER_VALIDATE_INT)){
				header("Location:" .$_SERVER['HTTP_REFERER']);
			}else{
                
                $sql = mysqli_query($db, "select * from products where id = '$id'");
			    $prod_array = mysqli_fetch_array($sql);
                $query = mysqli_query($db, "select * from  pictures where product_id = '$id' and avatar ='1'");
                $img_array = mysqli_fetch_array($query);
                
                
                $name = $prod_array["name_".$lang];
                $value = $prod_array["value"];
                
                $avatar = "uploads/category/".$prod_array['id']."-". $prod_array['category_id']."/". $img_array['img_name'];
                $i=0;
                $product = array(
                    "avatar" => $avatar,
                    "name"  => $name,
                    "value" => $value,
                    "id" => $id,
                    );
                    
                $_SESSION["array"][$i] = $product;
                $i++;
                $_SESSION['i'] = $i;
                
             
                echo json_encode($_SESSION["array"]);
                
                
                
                
            }
		}else{
			$id =$_POST['prod_id_add'];
			if(!filter_var($id, FILTER_VALIDATE_INT)){
				header("Location:" .$_SERVER['HTTP_REFERER']);
			}else{
               $result = $_SESSION['array'];
			   for($x=0;$x<count($result);$x++){
					$arr = $result[$x];
					if($arr['id'] == $id){
						echo "0";
						exit();
					}
				}
                $sql = mysqli_query($db, "select * from products where id = '$id'");
			    $prod_array = mysqli_fetch_array($sql);
                $query = mysqli_query($db, "select * from  pictures where product_id = '$id' and avatar ='1'");
                $img_array = mysqli_fetch_array($query);
                
                
                $name = $prod_array["name_".$lang];
                $value = $prod_array["value"];
                
                $avatar = "uploads/category/".$prod_array['id']."-". $prod_array['category_id']."/". $img_array['img_name'];
                $i=$_SESSION['i'];
                $product = array(
                    "avatar" => $avatar,
                    "name"  => $name,
                    "value" => $value,
                    "id" => $id,
                    );
                    
                $_SESSION["array"][$i] = $product;
                $i++;
                $_SESSION['i'] = $i;
                
             
                echo json_encode($_SESSION["array"]);
                
			
			}
		}
	}
	
	
	//------ Delete a product from a basket ------//
	if(isset($_POST['remove'])){
		$remove = $_POST['remove'];
		if(!filter_var($remove, FILTER_VALIDATE_INT)){
				header("Location: ".$_SERVER['HTTP_REFERER']);
			}
			else{
				$sql = mysqli_query($db, "select * from products where id = $remove");
				$check_row = mysqli_num_rows($sql);
				if($check_row == 0){
					header("Location: ".$_SERVER['HTTP_REFERER']);
				}
				else{
					$i = $_SESSION['i'];
					$array = $_SESSION['array'];
					
					for($x=0;$x<count($array);$x++){
						$arr = $array[$x];
						if($arr['id'] == $remove){
							unset($array[$x]);
							$_SESSION["array"] = array_values($array);
							$i--;
						}
					}
					$_SESSION['i'] = $i;
					
					
					echo json_encode($_SESSION["array"]);
				}
			}
	}
	
	//------ Drop basket  ------//
	if(isset($_POST['drop'])){
		unset($_SESSION['array']);
		unset($_SESSION['i']);
	}

    
        
    
?>
