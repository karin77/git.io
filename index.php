<?php
  require "admin/config.php";
   require "header.php";
    
 
  
  
  
	
    
?>
<html>
<head>
	<title>Bootstrap slider</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Made with WOW Slider - Create beautiful, responsive image sliders in a few clicks. Awesome skins and animations. Bootstrap slider" />
	
	
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	

</head>
<body style="background-color:#d7d7d7;margin:0">
	
	
	<div id="wowslider-container1">
	<div class="ws_images" style="margin-top:-17px;">
	<?php $query = mysqli_query($db, "select * from  slider order by id desc"); ?>
   <?php while($array = mysqli_fetch_assoc($query)){ ?>   
	<ul>
		<li><img src="uploads/slide/<?php echo $array['images'];?>" class="media-object" style="margin-left:50px;"    title="<?php echo  $array['arm_text']?>" /></li>
		
	</ul>
	
	<?php };?>
	</div>
	
	
	
	</div>	
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	
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