<?php  

   require "admin/config.php";
   require "header.php";

	 
		
 
?>


<html>

<body>
<div class="row">
<div class="col-sm-6 col-sm-offset-3" style="margin-top:124px;">
   
    <form role="form" id="contactForm">
     <div id="mail-status"></div>
      <div class="row">
            <div class="form-group col-sm-6">
                <label for="name" class="h4">Name</label>
                <input type="text" name="userName" id="userName" class="form-control name"  placeholder="Enter name" required>
                <span id="userName-info" class="info"></span><br/>
            </div>
            <div class="form-group col-sm-6">
                <label for="email" class="h4">Email</label>
                <input type="text" name="userEmail" id="userEmail"  class="form-control e_mail" placeholder="Enter email" required>
                <span id="userEmail-info" class="info"></span><br/>
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="h4 ">Message</label>
            <textarea name="content" id="content" class="form-control message" rows="5" placeholder="Enter your message" required></textarea>
        </div>
		<div class="error"></div>
              <button type="button" class="send_msg">Send</button>
            <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>

    </form>
</div>

</div>

   <footer class="page-foot bg-gray-darker"style="background:#000; margin-top:200px;">
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