<?php
  require "config.php";
?>


<html>
	<head>
		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	      <link rel="stylesheet" href="../css/styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
		  
         <script src="../jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
          <script src="../js/inner.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-inverse" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar- collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Admin</a>
            </div>
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="blog.php">Blog</a></li>
             <li><a href="comment.php">CommentT</a></li>
             <li><a href="slider.php">Slide</a></li>
             <li><a href="category.php">Category</a></li>
              
             
        </ul>
          <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-out"></span>Log Out</a>
			
        </li>
      </ul>
    </div>
  </div>
</nav>