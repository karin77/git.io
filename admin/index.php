 
<?php
	session_start();
	$db = mysqli_connect("localhost", "root", "", "percent") or die("Database Error");
	$login_error = "";
	
	function test($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);
		
		return $data;
	}  
	if(isset($_POST["login_btn"])){
		$username = test($_POST['username']);
		$password = test($_POST['password']);
		
		$login_query = mysqli_query($db,"SELECT * FROM login_admin WHERE username = '$username' AND password = '$password'");
		$login_rows = mysqli_num_rows($login_query);
			if($login_rows == 1){
				$_SESSION['admin'] = 'Admin';
				header("Location: home.php");
			}else{
				$login_error = "
					<div class='alert alert-danger'>
						<strong>Error!</strong> Wrong username or password.
					</div>
				";
			}
	}
?>
<html>
	<head>
		<title>home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href='CSS/style.css'>
		<link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
        <script src="../js/inner_blog.js"></script>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap/js/bootstrap.min.js"></script>
		<script src=""></script>
	</head>
	<body>
		<div class="container text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>LOGIN </h1>
				</div>
				<div class="panel-body">
					<form action="" method="POST">
						<div class="control-group">
							<label class="control-label" for="email">Username:</label>
							<input type="username" name="username" class="input-xlarge">
						</div>
						<div class="control-group">
							<label class="control-label" for="password">Password:</label>
							<input type="password" name="password" class="input-xlarge">
						</div>
						<?php echo $login_error;?>
						<div class="control-group">
							<div class="controls" style="margin-top: 15px;">
								<input type="submit" name="login_btn" value="LogIn">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

