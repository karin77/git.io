<?php
    session_start();
    $success = "";
	$error = "";
	$login_error = "";
    $login_error = "";
    $register_error ="";
	
	
	
	if(isset($_POST['register_btn'])){
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		
		$sql = mysqli_query($db, "select * from  users_reg where email = '$email'");
		$row = mysqli_num_rows($sql);
		
		$image = $_FILES["image"]["tmp_name"];
		$image_name = $_FILES["image"]["name"];
		
		$allowed_format = array('jpeg','jpg','png','gif');
		$arr = explode('.', $image_name);
		$format = end($arr);
		
		$select = mysqli_query($db, "select * from users_reg where email= '$email'");
		$row = mysqli_num_rows($select);
		
		
		if(!isset($image) || empty($name) || empty($surname) || empty($email) || empty($password) || empty($password2)){
			$error = "
					<div class='alert alert-danger'>
						<strong>Error!</strong> All fields are required.
					</div>
				";
		}elseif($password != $password2){
			$error = "
				<div class='alert alert-danger'>
					<strong>Error!</strong> Passwords don't match.
				</div>
			";
		}elseif($row == 1){
			$error = "
				<div class='alert alert-danger'>
					<strong>Error!</strong> E-mail alredy exists.
				</div>
			";
		}else{
			if(in_array($format,$allowed_format)){
					
				$date = date(DATE_ATOM);
				$new_name = $date.$image_name;
				$new_image = md5($new_name);
				
				move_uploaded_file($image,"uploads/user_avatar/".$new_image.".".$format);
				mysqli_query($db, "insert into users_reg (name,surname,email,password,images) values
                ('$name','$surname','$email','$password','$new_image"."."."$format')");
                $success = "
				<div class='alert alert-success'>
					<strong>Congratulations!</strong>you are registered.
				</div>
			";
			}
            
            
			else{
				$error = "
					<div class='alert alert-danger'>
						<strong>Error!</strong> Invalid file format.
					</div>
				";
			}
		}
	}
	
	
	
	if(isset($_POST['login_btn'])){
		
		$email = $_POST['logemail'];
		$password = $_POST['logpassword'];
		
		$sql = mysqli_query($db, "select * from  users_reg where email = '$email' and password = '$password'");
		$row = mysqli_num_rows($sql);
		$array = mysqli_fetch_array($sql);
		if($row == 1){
			$_SESSION['start'] = "Start";
			$_SESSION['id'] = $array['id'];
			$_SESSION['email'] = $array['email'];
			$_SESSION['name'] = $array['name'];
			$_SESSION['surname'] = $array['surname'];
			$_SESSION['avatar'] = $array['images'];
			$success = "
				<div class='alert alert-success'>
					<strong>Congratulations!</strong> You are logged in.
				</div>
			";
			
		}
		else{
			$login_error = "
				<div class='alert alert-danger'>
					<strong>Error!</strong> Wrong e-mail or password.
				</div>
			";
		}
	}
	


	


	if(!isset($_SESSION['lang'])){
		$lang = "arm";
		$blog = "ԲԼՈԳ";
        $news = "ՆՈՐՈՒԹՅՈՒՆՆԵՐ ԱՐԽԻՎ";
		 $vew ="Դիտել Մանրամասն";
		$menu = array("ԳԼԽԱՎՈՐ","ՄԵՐ ՄԱՍԻՆ","խանութ","ԲԼՈԳ","ԿԱՊ");
        $link = array ('home.php','aboutus.php','category.php','blog.php','contacts.php');
        $learnmore = "Տեսնել ավելին";
        $mounth =  "Փետրվար";
       $ALL = "բոլոր ապրանքները";
	}

	else{
		$lang = $_SESSION['lang'];
		if($lang =='arm'){
		   $menu = array("ԳԼԽԱՎՈՐ","ՄԵՐ ՄԱՍԻՆ","խանութ","ԲԼՈԳ","ԿԱՊ");
		   $link = array('home.php','abouts.php','category.php','blog.php','contacts.php');
		    $blog = "ԲԼՈԳ";
            $news = "ՆՈՐՈՒԹՅՈՒՆՆԵՐ ԱՐԽԻՎ";
            $learnmore = "Տեսնել ավելին";
            $vew ="Դիտել Մանրամասն";
            $mounth = "Փետրվար";
            $ALL = "բոլոր ապրանքները";
           
             
		}
		elseif($lang =='eng'){
			$menu = array("HOME","ABOUT","SHOP","BLOG","CONTACTS");
			$link = array('index.php','aboutus.php','category.php','blog.php','contacts.php');
			$blog = "BLOG";
            $news = "NEWS ARCHIVE";
            $learnmore = "LEARN MORE";
            $vew ="View Details";
            $mounth ="FEBRUARY"; 
            $ALL = "all products";
            
		}
	}

      
 ?>

 
 <html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
     <link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/styles.css" />
   
    <script src="js/inner.js"></script>
    <script src="js/inner_blog.js"></script>
    
    
    
    
 
     
      
  </head>
  <body>
   <header>
    <nav id="topNav" class="navbar navbar-default" style="border-color: rgb(0, 0, 0);
    background-color: rgb(0, 0, 0);
    border: 1px solid #3ec7c2;
    border-left: navajowhite;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                   <a href="#" class="rd-navbar-brand" style="    text-decoration: none;">
                   <div class="brand-name"><i class="fa  fa-5x  fa-eercast" style="font-size: 3em;
                   margin: 32px;" aria-hidden="true" ></i><span class="text-white text-bold" style="font-size: 15px; color:#fff;">Soft</span><span style="color: #00ffff;
                   text-transform: none;
                   font-size: 15px;">App</span></div></a>
            </div>
             
            <div class="navbar-collapse collapse" id="bs-navbar">
              
                <ul class="nav navbar-nav"style="float:right;margin-top:20px;">
                  
                   
                   <?php
                     for($i=0;$i<count($menu);$i++){
                        echo "<li><a href='".$link[$i]."'class='menu_a'>".$menu[$i]."</a></li>";
                     }
                    ?>
                   
                </ul>
             
            </div>
             <div style=";">
        <?php echo $error. $success. $login_error .$register_error; ?>
    </div>
            <ul class="nav navbar-nav navbar-right" style=" float: left!important;" style="margin-top: -18px;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff;font-weight: 700; background:#000;">  <span><i class="fa f3 fa-user" aria-hidden="true"></i></span> Register <span class="caret"></span></a>
                        <ul class="dropdown-menu  dropdown-lr dp2 animated flipInX" role="menu" style="right: -110px; color:#444;">
                            <div class="col-lg-12">
                                <div class="text-center"><h1>Register</h1></div>
								<form class="form" role="form" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" name="name"  tabindex="1" placeholder="Name" class="form-control">
									</div>
									<div class="form-group">
										<input type="text" name="surname"  tabindex="1" placeholder="Surname" class="form-control" >
									</div>
									<div class="form-group">
										<input type="email" name="email"  tabindex="2" class="form-control"placeholder="Email">
									</div>
									<div class="form-group">
										<input type="password" name="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="password2" tabindex="2" class="form-control" placeholder="Password again">
									</div>
									<div class="form-group">
										<input type="file" name="image">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-xs-offset-3">
												<input  type="submit" name="register_btn" value="Registration" tabindex="4" class="form-control btn2 btn-info2" value="Register Now">
											</div>
										</div>
									</div>
                                    <input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">
								</form>
                           
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff;
							font-weight: 700; background:#000;"><span ><i class="fa f3 fa-sign-in" aria-hidden="true"></i></span>LogIn <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr dp1 animated slideInRight" role="menu" style="min-width: 213px;color:#444;">
                            <div class="row">
								<div class="col-lg-12">
									<div class="text-center"><h1>Log In</h1></div>
									<form id="ajax-login-form" method="post" role="form" autocomplete="off">
										<div class="form-group">
											<label for="username">Email</label>
											<input type="email" name="logemail"  tabindex="1" class="form-control" placeholder="E-mail" value="" autocomplete="off">
										</div>

										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" name="logpassword" tabindex="2" placeholder="Password" class="form-control" autocomplete="off">
										</div>

										<div class="form-group">
											<div class="row">
												
												<div class="col-xs-5 pull-right">
													<input type="submit" name="login_btn" value="LogIn" tabindex="4" class="form-control btn2 btn-success2" value="Log In">
												</div>
											</div>
										</div>

									  
										<input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
									</form>
								</div>
							</div>
                        </ul>
                       </li>
                       <li class="logout log1">
								<?php
									if(isset($_SESSION['start'])){
										$id = $_SESSION['id'];
										$sql = mysqli_query($db, "select * from  users_reg where id = '$id'");
										$arr = mysqli_fetch_array($sql);
										echo $arr['name']." ".$arr['surname'];
									}
								?>
				       </li>
                   <li class="logout log2">
				    <a><span><i class="fa f3  fa-sign-out" aria-hidden="true"></i></span><span>Log Out</span></a> 
                  </li>
                 
        <!-- basket dropdown -->           
        <ul class="nav navbar-nav navbar-right" style="margin-top: -18px;">
        <li class="dropdown"style="background:#000;">
          <a style="background:#000;" href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false"><span  class="item"><i class="fa fa-3x fa-shopping-cart" aria-hidden="true"></i>
                     <span class="bask"> 
					  <?php
                         if(isset($_SESSION['array'])){
                             $count = $_SESSION['array'];
                             echo "(".count($count).")";
                         }else{
                             echo"0";
                         }
                      ?>
                     </span>
                     </span> </a>
          <ul class="dropdown-menu dropdown-cart" id="basket_ul" role="menu"style="min-width: 560px;
          right: -434px;
          padding: 59px 0;">
             <li>
					<ul class="basket_ul" >
             
				<?php 
					if(isset($_SESSION['array'])){
						$array = $_SESSION['array'];
						foreach($array as $arr){
				?>
					<li>
						<div class='row' style='margin-bottom: 10px'> 
							<div class='col-xs-2'>
								<img style='width: 50px;height: 50px; display: inline-block;' src='<?php echo $arr['avatar'];?>'>
							</div>
							<div class='col-xs-8'>
								<p style='margin: 0;color: #000;'><?php echo $arr['name'];?></p>
								<p style='margin: 0;color: #000;'><?php echo $arr['value'];?></p>
							</div>
							<div class='col-xs-1 text-right'>
								<span style='color: #000;' class='glyphicon glyphicon-remove-circle remove remove_prod' data-remove="<?php echo $arr['id'];?>"></span>
							</div>
						</div>
					</li>
				<?php	
						}
					}else{
						echo "<li class='no_prod'> <p style='color: #000'>There are not any products in a basket.</p></li>";
					}
				?>
              </ul>
				</li>
             
              <li class="divider"></li>
            <button type="button" class="button btn-info drop" style="padding: 14px 77px 10px;
              margin: 44px;">DROP</button>
              <button type="button" class="button5 btn-info" style="padding: 14px 77px 10px;
              margin: px;">BUY</button>
          </ul>
        </li>
      </ul>
                
     </ul>
            
                <div class="flag">
                <a href="lang.php?lang=arm">ՀԱՅ</a><img src="images/armflag.png">
                <a href="lang.php?lang=eng">Eng</a><img src="images/england.png">
            </div>
        
        </div>
      </nav>
 </header>
								
			