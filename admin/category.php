<?php

     require "header.php"; 
     require "config.php";




   if(isset($_POST['Add_category'])){
       $arm = $_POST['name_arm'];
       $eng = $_POST['name_eng'];
       if(empty($eng)|| empty($arm)){
           $error = "
            <div class='alert alert-danger'>   
             <strong>Error!</strong> all fields are required.
               </div>
               ";
           
       
       }else{
           
          $query =mysqli_query($db, "select * from category where name_arm = '$arm' or name_eng = '$eng' ");
          $row = mysqli_num_rows($query);
           if($row == 1){
               $error ="
                <div class='alert alert-danger'>
                <strong>Error!</strong> category is already exists.
               </div>
               "; 
               
               
           }else{
               $query = mysqli_query($db, "insert into category(name_arm,name_eng) values('$arm','$eng')");
           }
           
         }
       }
   
        
  

  if(isset($_POST['Edit_category'])){
      $arm = $_POST['name_arm'];
      $eng = $_POST['name_eng'];
      $id = $_POST['id'];
      
      
      
      if(!empty($arm)&& !empty($eng)){
             $query = mysqli_query($db, "update category set name_arm = '$arm' , name_eng ='$eng'  WHERE id= '$id'") or die(mysqli_error($db));
              
          }else{
              
              $error ="
                <div class='alert alert-danger'>
                <strong>Error!</strong> complete all files.
               </div>
               "; 
          }
          
  }



?>
  

  <div class="container"style="margin-top:50px;">
  
    <form action="category.php" method="POST">
        <div class="row clearfix">
        
          <div class="col-md-6 col-md-offset-3 column">
            <label>Arm Name</label>
            <input type="text" class="form-control" name="name_arm">
        </div>
       <div class="col-md-6 col-md-offset-3 column">
            <label>Eng Name</label>
            <input type="text" class="form-control col-xs-4" name="name_eng">
            
     </div>
      </div>
      <div  class="col-md-7 col-md-offset-5 column" style="margin-top:10px;">
          <button type="submit" name="Add_category" class="btn btn-default"data-toggle="modal" >Add Category</button>
    </div>
  </form>
  </div>
  
     
     
    <div class="container" >
      <table class="table table-bordered" style="margin-top:100px;">
    <thead style="text-align: center;">
        <tr>
                  <th style="text-align: center;">Arm name</th>
                  <th style="text-align: center;">Eng name</th>
                  <th style="text-align: center;">Delete</th>
                  <th style="text-align: center;">Add products</th>
        </tr>
    </thead>
        <tbody id="sort_category">
           <h2>Category</h2>
            <?php $query = mysqli_query($db, "select * from  category order by id asc"); ?>
            <?php mb_internal_encoding("UTF-8");?>
            <?php while($category = mysqli_fetch_array($query)){ ?>
            <tr class="tr" class="tr" id="<?php echo $category['id']; ?>">
                <td class="arm"><?php echo mb_substr ($category['name_arm'],0,15);?></td>
                <td class="eng"><?php echo mb_substr ($category['name_eng'],0,15);?></td>
                 
                <td><span data-toggle='modal' data-target='#myModal' class='glyphicon glyphicon-trash delete slide'data-name="cat" data-id=" <?php echo $category['id'];?> "></span></td>
				<td><a style="color: #000;" href="products.php?id=<?php echo $category['id'];?>"><span class='glyphicon glyphicon-plus plus'></span></a></td>
            </tr>
            <?php }; ?>
    
   </tbody>

				
  
</table>
</div>


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

 
    
 