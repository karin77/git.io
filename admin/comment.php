<?php
   require "config.php";
 require "header.php";
	session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: http://localhost/comment/admin/");
	}else{
		$query = mysqli_query($db, "select * from  comment_db where admin = '0'");
		$rows = mysqli_num_rows($query);
		
    }
		
        
?>

    <html>
    <body>
        <div class="container new_user">
			<div class="col-sm-2">
				<p class="new">New Comments: 
					<?php 
						echo $rows;
					?>
				</p>
			</div>
			
		</div>
 <div class="err"></div>
  <div class="container" >
       <table class="table table-bordered" style="margin-top:100px;">
       <thead style="text-align: center;">
        <tr>
                  <th style="text-align: center;">User</th>
                  <th style="text-align: center;">Email</th>
                  <th style="text-align: center;">Blog Heding</th>
                  <th style="text-align: center;">Comment</th>
                  <th style="text-align: center;">Add comment</th>
                  <th style="text-align: center;">Delay comment</th>
                  <th style="text-align: center;">Delete comment</th>
                  
                  
               
                  
            </tr>
             </thead>
             <tbody id="sort_comment">
            <?php $query = mysqli_query($db, "select * from  comment_db  order by check_a asc"); ?>
            <?php while($user = mysqli_fetch_array($query)){ ?>
            <tr class="
                <?php
                  if($user['admin'] == 0){
                      echo "red";
                  }
                    else{
                      echo "green" ; 
                    };
                ?>"id="<?php echo $user['id'];?>">
               
                 <td ><?php echo $user['user'];?></td>
                 <td ><?php echo $user['email'];?></td>
                 <td ><?php echo $user['blog_heading'];?></td>
                 <td ><?php echo $user['comment'];?></td>
                <td><span data-toggle='modal' data-target='#Modal1' class='glyphicon glyphicon-ok ok' data-id=" <?php echo $user['id'];?> "></span></td>
				<td><span class='glyphicon glyphicon-question-sign quest' data-id=" <?php echo $user['id'];?> "></span></td>
				
				<td><span  data-toggle='modal' data-target='#myModal' class='glyphicon glyphicon-trash delete' data-name="comment" data-id=" <?php echo $user['id'];?> "></span></td>
                 
           </tr>
            <?php }; ?>
            </tbody>
            <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content"style="background-color: rgba(8, 8, 8, 0.81);">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <h4 style="color: #fff;font-size: 14px;">Are you sure you want to delete this blog??</h4>
                                <button type="button" class="btn btn-info yes" name="yes" data-dismiss="modal">YES</button>
                                <button type="button" class="btn btn-info no" name="no" data-dismiss="modal">NO</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
 

          <div class="modal fade" id="Modal1"  role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Add a Comment??</h5>
                </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-info yes" name="add" data-dismiss="modal">Add</button>
           </div>
      </div>
    </div>
  </div>
  
 
 
</table>
</div>

  
 
</body>
</html>