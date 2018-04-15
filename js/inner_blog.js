
	//------ Contact message ------//
$(document).ready(function(){	
	$(".send_msg").click(function(){
		name = $(".name").val();
		email = $(".e_mail").val();
		msg = $(".message").val();
		console.log(name);
		console.log(email);
		console.log(msg);
			if(name == "" || email == "" || msg == ""){
				$(".error").html("<div class='alert alert-danger'><strong>Error!</strong> All fields are required.</div>");
			}
			else{
				$.ajax({
					type: "POST",
					url: 'like.php',
					dataType: "json",
					data: {name : name,
							email : email,
							msg : msg}, 
					success: function(data){
							if(data == 1){
								$(".error").html("<div class='alert alert-success'>Your message has been sent.</div>");
								name = "";
								email = "";
								msg = "";
								console.log(name);
							}
							else if(data == 0){
								$(".error").html("<div class='alert alert-danger'><strong>Error!</strong>This is not a valid e-mail.</div>");
							}
							else{
								$(".error").html("<div class='alert alert-danger'><strong>Error!</strong>All fields are required.</div>");
							}
						
					}
				})
			}
	
	
	})
})