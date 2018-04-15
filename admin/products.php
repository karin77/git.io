<?php
     require "header.php"; 
     require "config.php";
     $error="" ;
    
  if(isset($_POST['Add_product'])){
      $arm = $_POST['arm-name'];
      $eng = $_POST['eng-name'];
      $numb = $_POST['number'];
      $val = $_POST['value'];
      $sal = $_POST['sale'];
      $desc = $_POST['description'];
      $id = $_GET['id'];
      
        if(empty($arm) || empty($eng) || empty($numb) || empty($val)|| empty($sal)|| empty($desc)){
             
             $error ="
                <div class='alert alert-danger'>
                <strong>Error!</strong> complete all files.
               </div>
               "; 
              
          }else{
            //exit('s');
             $query = mysqli_query($db, "insert into products(name_arm,name_eng,number,value,sale,description,category_id) values('$arm','$eng','$numb','$val','$sal','$desc','$id')") or die(mysqli_error($db));
            
       
  }
}
           
?>
   <div class="container"style="margin-top:50px;">
      <form action="products.php?id=<?php if(isset($_GET['id'])) echo $_GET['id']; ?>" method="POST">
        <div class="row clearfix">
          <div class="col-md-6 col-md-offset-3 column">
            <label>Arm Name</label>
            <input type="text" class="form-control" name="arm-name">
        </div>
       <div class="col-md-6 col-md-offset-3 column">
            <label>Eng Name</label>
            <input type="text" class="form-control col-xs-4" name="eng-name">
            
     </div>
       <div class="col-md-6 col-md-offset-3 column">
            <label>Number</label>
            <input type="text" class="form-control col-xs-4" name="number">
            
     </div>
      <div class="col-md-6 col-md-offset-3 column">
            <label>Value</label>
            <input type="text" class="form-control col-xs-4" name="value">
            
     </div>
      <div class="col-md-6 col-md-offset-3 column">
            <label>Sale</label>
            <input type="text" class="form-control col-xs-4" name="sale">
            
     </div>
      <div class="col-md-6 col-md-offset-3 column">
            <label>Description</label>
            <input type="text" class="form-control col-xs-4" name="description">
            
     </div>
      </div>
      <div  class="col-md-7 col-md-offset-5 column" style="margin-top:10px;">
          <button type="submit" name="Add_product" class="btn btn-default"data-toggle="modal" >Add Product</button>
    </div>
  </form>
  </div>
  
   
   <div class="container" >
      <table class="table table-bordered" style="margin-top:100px;">
       <thead style="text-align: center;">
        <tr>      <th style="text-align: center;">Arm name</th>
                  <th style="text-align: center;">Eng name</th>
                  <th style="text-align: center;">Number</th>
                  <th style="text-align: center;">Value</th>
                  <th style="text-align: center;">Sale</th>
                  <th style="text-align: center;">Description</th>
                  <th style="text-align: center;">Edit</th>
                  <th style="text-align: center;">Delete</th>  
                  
        </tr>
             <?php 
               if(isset($_GET['id'])){
                $cat_id = $_GET['id'];
              }else{
                $cat_id = 0;
              }
                  
             $query = mysqli_query($db, "select * from  products where category_id = '$cat_id' order by id desc"); 
           while($products = mysqli_fetch_array($query)){ ?>

            <tr>
                 <td><?php echo $products['name_arm'];?></td>
                 <td><?php echo $products['name_eng'];?></td>
                 <td><?php echo $products['number'];?></td>
                 <td><?php echo $products['value'];?></td>
                 <td><?php echo $products['sale'];?></td>
                 <td><?php echo $products['description'];?></td>
                <td><a href='edit_prod.php?prod_id=<?php echo $products['id'];?>'><span  class='glyphicon glyphicon-edit edit btn btn-default btn-lg' id="myBtn" ></span></a></td>
                 <td><span data-toggle='modal' data-target='#myModal' class='glyphicon glyphicon-trash delete prod'data-name="prod" data-id=" <?php echo $products['id'];?> "></span></td>
                 
                    
                  <form action="products.php?id=<?php echo $cat_id; ?>" method="POST">
                   
                       
                  </form>
                  
    
            </tr>
            <?php }; ?>
    
  </thead>
  <tbody>
                                              
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
    
  