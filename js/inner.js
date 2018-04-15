$(document).ready(function(){
	$(".dropdown2").click(function(){
		$(".dp1").hide();
		$(".dp2").toggle();
	})
	
	$(".dropdown1").click(function(){
		$(".dp1").toggle();
		$(".dp2").hide();
	})
	
	$(".reg").click(function(){
		$(".dp1").hide();
		$(".dp2").show();
	})
	
	
	$(".logout").click(function(){
		$.ajax({
			type: "POST",
			url: 'logout.php',
			data: {logout : 1}, 
			success: function(data){
				location.reload();
			}
		})
	})
	$("#basket_ul").click(function(e){
		e.stopPropagation();
	})
		
	$(".percent").click(function(){
		percent_sum = $(this).attr("data-name");
		$.ajax({
			type: "POST",
			url: 'check2.php',
			dataType: "json",
			data: {check : percent_sum}, 
			success: function(data){
				if(data == 0){
					$("#div").html("<div class='alert alert-danger'><strong>Error!</strong> You have already voted.</div>");
				}
				else{
					if(data == 2){
						$(".dp1").show();
						$("#div").html("<div class='alert alert-danger'><strong>Error!</strong> You must LogIn or Register to vote.</div>");
					}
					else{
						$('.progress-bar').each(function(index){
							$(this).css("width",data[index]+'%');
							str = data[index].toString();
							per = str.substring(0,5)
							$(this).html(per +'%');
						})
					}
				}
				
			}
		})
		
	})
	
	//------ Product's main image select ------//
	$(".main_img").click(function(){
		checked = $(this).attr('data-id');
		check = $(this);
		$.ajax({
			type: "POST",
			url: 'check.php',
			data: {check : checked}, 
			success: function(data){
				$(".image_div").removeClass('checked_img');
				check.parent().addClass('checked_img');
				$(".main_img").removeClass('checked');
				check.addClass('checked');
			}
        });
	})  
	
	
	
	
	$(".refresh").click(function(){
		$.ajax({
			type: "POST",
			url: 'check.php',
			dataType: "json",
			data: {load : 1}, 
			success: function(data = 1){
				$(".red").addClass("green");
				$(".new").text("New registered: 0");
			}
			
		})
	})
	
	
	$(".delete").click(function(){
		icon = $(this);
		del = $(this).attr('data-id');
		console.log(del);
	})
	
	$(".yes").click(function(){
		$.ajax({
			type: "POST",
			url: 'check.php',
			data: {del : del}, 
			success: function(data){
				icon.parent().parent().fadeOut(500,function(){
					icon.parent().parent().remove();
				})
			}
		})
	})
    $(".ok").click(function(){
		icon = $(this);
		ok = $(this).attr('data-id');
		console.log(ok);
        
	})
	
	
	$(".ok").click(function(){
        $.ajax({
			type: "POST",
			url: 'check.php',
			data: {ok : ok}, 
			success: function(data){
				$(".red").addClass("green");
			
			}
		})
	})
	$(".quest").click(function(){
		icon = $(this);
		quest = $(this).attr('data-id');
		console.log(quest);
        $.ajax({
			type: "POST",
			url: 'check.php',
			data: {quest : quest}, 
			success: function(data){
                icon.parent().parent().addClass("green");
				
			
			}
		}) 
         
	})
	$(".login_btn").click(function(){
		email = $(".email").val();
        pass = $(".password").val();
        if(email == "" || pass == ""){
            $(".error").html("<div class='alert alert-denger'><strong>Error!</strong>");
        }
        else{
           $.ajax({
               type:"POST",
               url: 'login.php',
               dataType: "json",
               data:{emai:email, 
                     pass: pass},
               success: function(data){
                   if(data == 1){
                       $(".error").html("<div class='alert alert-denger'><strong>Error!</strong>");
                       $(".dp1").toggle();
                   }
                   else{
                       $(".error").html("<div class='alert alert-denger'><strong>Error!</strong>");
                   }
               }
           }) 
        }
		
})
 //basket ajax   
   $(".add_to_cart").click(function(){
       prod_id = $(this).attr('data-id');
      console.log(prod_id);
        $.ajax({
           type: "POST",
			url: 'basket.php',
			dataType: "json",
            data: {prod_id_add : prod_id,
			},
           
            success: function(data){
                if(data == 0 ){
                    $(".err").html("<div class='alert alert-denger'>You have already chosen this product.");
                }
                else{
                    $(".basket_ul").html("");
                    $(".bask").text("("+data.length+")");
                    $.each(data,function(){
                       $(".basket_ul").prepend("<li><div class='row' style='margin-bottom: 10px'> <div class='col-xs-2'><img style='width: 50px;height: 50px; display: inline-block;' src='"+this.avatar+"'></div><div class='col-xs-8'><p style='color: #000;'>"+this.name+"</p><p style='color: #000;'>"+this.value+"</p></div><div class='col-xs-1 text-right'><span style='color: #000;' class='glyphicon glyphicon-remove-circle remove remove_prod' data-remove='"+this.id+"'></span></div></li>") ;
                        
                    })
                }
            }
							
       })
   })
 
 //------ Delete a product from a basket ------//
	$(".remove_prod").click(function(){
		remove = $(this).attr("data-remove");
		console.log(remove);
		$.ajax({
			type: "POST",
			url: 'basket.php',
			dataType: "json",
			data: {remove : remove,
					}, 
			success: function(data){
				if(data.length == 0){
					$(".bask").text("(0)");
					$(".no_prod").show();
					$(".basket_ul").html("<p style='color: #000'>There are not any products in a basket.</p>");
				}
				else{
					$(".bask").text("("+data.length+")");
					$(".no_prod").hide();
						$(".basket_ul").html("");
					$.each(data, function () {
						$(".basket_ul").prepend("<li><div class='row' style='margin-bottom: 10px'> <div class='col-xs-2'><img style='width: 50px;height: 50px; display: inline-block;' src='"+this.avatar+"'></div><div class='col-xs-8'><p style='margin: 0'>"+this.name+"</p><p style='margin: 0'>"+this.quantity+" x "+this.price+" = "+"<span style='color: #000'>"+this.total+"</span></p></div><div class='col-xs-1 text-right'><span class='glyphicon glyphicon-remove-circle remove remove_prod' data-remove='"+this.id+"'></span></div></li>");
						
					})
				}
				
			
			}
		})
	})
 //------ Basket drop ------//
	$(".drop").click(function(){
		$.ajax({
			type: "POST",
			url: 'basket.php',
			data: {drop : 1}, 
			success: function(data){
				$(".bask").text("(0)");
				$(".basket_ul").html("<li><p style='color: #000'>There are not any products in a basket.</p></li>");
				$(".total").text("Total price: 0");
			}
		})
	})
 
 })
    

