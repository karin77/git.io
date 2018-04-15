<?php
   require "config.php";
 require "header.php";
	session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: http://localhost/percent/admin/");
	}else{
		$query = mysqli_query($db, "select * from users where admin = '0'");
		$rows = mysqli_num_rows($query);
		
		
		
	}
?>


        <div class="container new_user">
			<div class="col-sm-2">
				<p class="new">New registered: 
					<?php 
						echo $rows;
					?>
				</p>
			</div>
			<div class="col-sm-10 text-right">
				<span class="refresh"> REFRESH </span>
			</div>
		</div>

  <div class="container" >
       <table class="table table-bordered" style="margin-top:100px;">
       <thead style="text-align: center;">
        <tr>
                  <th style="text-align: center;">Name</th>
                  <th style="text-align: center;">Surname</th>
                  <th style="text-align: center;">E-mail</th>
                  <th style="text-align: center;">Vote</th>
               
                  
            </tr>
            <?php $query = mysqli_query($db, "select * from  users  order by id desc"); ?>
            <?php while($user = mysqli_fetch_array($query)){ ?>
            <tr class="
                <?php
                  if($user['admin'] == 0){
                      echo "red";
                  }
                    else{
                      echo "green" ; 
                    };
                ?>">
               
                 <td ><?php echo $user['name'];?></td>
                 <td ><?php echo $user['surname'];?></td>
                 <td ><?php echo $user['email'];?></td>
                <td>
                  <?php 
                     if($user['percent_sum']== 1){
                        echo"voted";    
                     }else{
                        echo "Don`t voted" ;
                         
                     }
                  ?>  
                </td>
                 
            </tr>
            <?php }; ?>
    
  </thead>
  <tbody>
   
  </tbody>
</table>
</div>

  
 

</body>
</html>
    
