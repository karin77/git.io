<?php
  require "admin/config.php";
   require "header.php";
 
  
  
  
	
    
?>
<html>

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
			<?php
				if(isset($_GET['page'])){
					$page = $_GET['page'];
					if(!filter_var($page, FILTER_VALIDATE_INT)){
						header("Location: blog.php");
					} 
				}
				else{
					$page = "";
				}
				if($page == "" || $page == "1"){
					$page1 = 0;
				}
				else{
					$page1 = ($page*4)-4;
				}
				$sql = mysqli_query($db, "select * from images order by check_a limit $page1,4");
			?>
			<?php while($array = mysqli_fetch_assoc($sql)){ ?>   
				<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="col-sm-12 col">
						<div class="row">
								<img style="width: 450px; " src="uploads/<?php echo $array['img_name'];?>">
									<div class="content"style="color:#fff;">
									                  
										<span  style="margi-top:20px;"></span>
										    <?php
                                              $date = mb_substr($array['blog_date'],0,10);
                                              $arr = explode("-",$date);
                                              $month = mktime(0,0,0, $arr[1],1);
                                              $monthName = date('M',$month);
                                              echo $arr[2]."," .$monthName .$arr[0]."by Walter Myers";
										   ?>
										
											<h4 ><?php echo $array[$lang.'_name'];?></h4>
								 
											<p><?php echo  mb_substr ($array[$lang.'_comment'],0,50);?>
											</p>
								  
									</div>    
								<div class="btn">
                                    <a href="more.php?id=<?php echo $array['id'];?>"><button type="button" class="btn btn-success btn-order " style="color: #fff;
                                    background-color: #3ec7c2;
                                    border-color: #3ec7c2;    padding: 12px 31px;"><?php echo $learnmore?></button></a>
								</div>
						</div>
					</div>
				</div>
			<?php };?>
      </div>
 </div>  
					<div class="row text-center">
						<?php 
							$query = mysqli_query($db, "select * from images");
							$rows = mysqli_num_rows($query);
							$page_num = $rows/4;
							$page_num = ceil($page_num);
						?>
						
						<ul class="pagination" style="margin-top:20px;">
							<?php for($pg=1;$pg<=$page_num;$pg++){?>
								<li><a href="blog.php?page=<?php echo $pg;?>"> <?php echo $pg;?> </a></li>
							<?php };?>
						</ul>
					
					</div>
     </section>
</div>

</section> 
  
       <div class="contact_blog">
        
         <section class="container-fluid">
           <div class="container text-center">  
                  
             <div class="cell-xs-12" >
              <h3><?php echo $news?></h3>
               <h3 class="blogh3"></h3>
       </div>
        <div class="range offset-top-40 offset-md-top-30">
         <div class="cell-xs-6 cell-sm-4">
        <ul class="list-marked">
        <li><a style="#444;" href="#"><?php echo  $mounth?> 2017</a></li>
        <li><a style="#444;" href="#">January 2016</a></li>
        <li><a style="#444;" href="#">March 2016</a></li>
        <li><a style="#444;" href="#">April 2016</a></li>
        <li><a style="#444;" href="#">May 2016</a></li>
  </ul>
</div>
   <div class="cell-xs-6 cell-sm-4 offset-top-40 offset-xs-top-0">
    <ul class="list-marked">
        <li><a style="#444;" href="#">June 2016</a></li>
        <li><a style="#444;" href="#">July 2016</a></li>
        <li><a style="#444;" href="#">August 2016</a></li>
        <li><a style="#444;" href="#">September 2016</a></li>
        <li><a style="#444;"href="#">October 2016</a></li>
   </ul>
</div>
    <div class="cell-xs-6 cell-sm-4 offset-top-40 offset-sm-top-0">
<ul class="list-marked">
    <li><a style="#444;" href="#">November 2016</a></li>
    <li><a style="#444;" href="#">December 2016</a></li>
    <li><a style="#444;"href="#">January 2015</a></li>
    <li><a style="#444;" href="#">February 2015</a></li>
    <li><a style="#444;" href="#">March 2015</a></li>
</ul>
</div>
</div>
  </div>
   </section>
     <aside class="bg-dark">
       <div class="row" >
         <div class="container text-center">
           <div class="coll-sm-12" >
             <div class="col-sm-11">
           <h1 class="h1group">SOFTWARE DEVELOPMENT CYCLE</h1>
        </div>
    </div> 
    <div class="pull-right" style="margin-top: -46px;">
      <div class="cell-md-3 offset-top-30 offset-md-top-0">
       <div class="inset-md-right-15"><a href="#" class="btm2 btn-gray-dark" style="text-decoration:none;" >learn more</a></div>
  </div>
</div>
 </div>
   </div>
    </aside>
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
    
    
    
  </body>
  
</html>

