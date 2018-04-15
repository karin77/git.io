<?php
	 require "admin/config.php";
	require "header.php";
	
	if(isset($_GET['id'])){
		$cat_id = $_GET['id'];
		if(!filter_var($cat_id, FILTER_VALIDATE_INT)){
				header("Location: http://localhost/blog/blog/category.php");
			}
			else{
				$check = mysqli_query($db, "select * from category where id = $cat_id");
				$check_row = mysqli_num_rows($check);
				if($check_row == 0){
					header("Location: http://localhost/blog/blog/category.php");
				}else{
					$cat_sql = mysqli_query($db, "select * from category where id = '$cat_id'");
					$cat_arr = mysqli_fetch_array($cat_sql);
				}
			}
	}
	else{
		header ("Location: category.php");
	}
	
?>
		<div class="container main_cont">
			<!-- Print category -->
				<div class="col-sm-12">
						<h2><a style="text-decoration: none;" href="product.php?id=<?php echo $cat_arr['id'];?>"><span ><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <?php echo $cat_arr['name_'.$lang];?></a></h2>
					</div>
				<div class="row" style="margin-top: 30px;">
						<!-- Print some products -->
						<?php $prod_sql = mysqli_query($db, "select * from products where category_id = '".$cat_arr['id']."'");?>
							<?php while($prod_arr = mysqli_fetch_array($prod_sql)){ ?>
							<div class="col-sm-3" style="margin-bottom: 30px;"> 
								<div>
									<!-- Print avatar image -->
									<?php $img_sql = mysqli_query($db, "select * from pictures where product_id = '".$prod_arr['id']."' and avatar ='1'");?>
									<?php while($img_arr = mysqli_fetch_array($img_sql)){?>
											<img style="height: 160px;" class="img-responsive" src="uploads/category/<?php echo $prod_arr['id']."-".$prod_arr['category_id'];?>/<?php echo $img_arr['img_name'];?>">										
									<?php };?>
									<!-- Print avatar image// END-->
								</div>
								<div>
									<h1><?php echo $prod_arr['name_'.$lang];?></h1>
								</div>
								<div class="text-right" style="float: left;
                                    margin-top: 5px;">
									<span style="padding: 2px" class="button"> <a style="padding: 2px;" href="product_vew.php?id=<?php echo $prod_arr['id'];?>" class="button_a"> <?php echo $vew;?> </a></span>
								</div>
							</div>
						<?php };?>
						<!-- Print some products// END -->
				</div>
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
