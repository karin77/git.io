<?php
	 require "admin/config.php";
	require "header.php";
	
	if(isset($_GET['id'])){
		$prod_id = $_GET['id'];
		if(!filter_var($prod_id, FILTER_VALIDATE_INT)){
				header("Location: http://localhost/blog/blog/category.php");
			}
			else{
				$check = mysqli_query($db, "select * from products where id = $prod_id");
				$check_row = mysqli_num_rows($check);
				if($check_row == 0){
					header("Location: http://localhost/blog/blog/category.php");
				}else{
					$prod_sql = mysqli_query($db, "select * from products where id = '$prod_id'");
					$prod_arr = mysqli_fetch_array($prod_sql);
					$img_sql = mysqli_query($db, "select * from  pictures where product_id = '$prod_id'");
					$img_av_sql = mysqli_query($db, "select * from  pictures where product_id = '$prod_id' and avatar = '1'");
					$av_row = mysqli_fetch_array($img_av_sql);
				}
			}
	}
	else{
		header ("Location: category.php");
	}
	
?>

		<div class="err"></div>
		<div class="container" style="min-height: calc(100% - 214px)">
			<div class="row">
			<h1><?php echo $prod_arr['name_'.$lang];?></h1>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div>
						<img class="img-responsive" src="uploads/category/<?php echo $prod_arr['id']."-".$prod_arr['category_id'];?>/<?php echo $av_row['img_name'];?>">
					</div>
				</div>
				<div class="col-sm-8">
					<div class="row"> 
						<div class="col-sm-2"> <p></p></div>
						<div class="col-sm-10"> <p> <?php echo $prod_arr['value']."$";?> </p> </div>
					</div>
					<div class="row"> 
						<div class="col-sm-2"> <p></p></div>
						<div class="col-sm-10"> <p> <?php echo $prod_arr['sale']."$";?> </p> </div>
					</div>
					<div class="row"> 
						<div class="col-sm-2"> <p></p></div>
						<div class="col-sm-10"> <p> <?php echo $prod_arr['description'];?> </p> </div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 20px;">
				<?php while($img_arr = mysqli_fetch_array($img_sql)){?>
						<div class="prod_img">
							<img class="img-responsive sl_img" src="uploads/category/<?php echo $prod_arr['id']."-".$prod_arr['category_id'];?>/<?php echo $img_arr['img_name'];?>">
						</div>
				<?php };?>
			</div>
			
			
		</div>
		<div class="row text-right">
				<button type="button" class="btn5 bt_primary add_to_cart" data-id="<?php echo $prod_arr['id'];?>">ADD TO CART</button>
				
			</div>
			
			
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

