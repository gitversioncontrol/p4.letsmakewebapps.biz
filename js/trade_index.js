$('#place').hide();

$('input,select').change( function(){ //Event Listener for Symbol input is changed
 //$('.stock').unbind();
 $('#place').unbind();
 $('#place').hide();

//$('#lastp').html('kidda');
	var symbol=$('#symbol').val();
	//	console.log(symbol);
    $.ajax({
        type: 'POST',
        url: '/stockAPI/getStock/'+symbol,
		
		// $('#post_count').html('hello'),
        success: function(response) { 

            // For debugging purposes
            // console.log(response);

            // Example response: {"post_count":"9","user_count":"13","most_recent_post":"May 23, 2012 1:14am"}

            // Parse the JSON results into an array
			
            var data = $.parseJSON(response);
			console.log("data is "+data);
			console.log("response is "+response[0]);
			//$('#trade-button').hide();
			//echo data;
            // Inject the data into the page
				if(data == false){
				console.log('error');
				$('#error').html('Invalid Symbol');
				
				   $('#lp').html('N/A');
				   
				
				}
				else{
					
					$('#error').html('');
					$('#place').hide();
					
					console.log("count is: "+ $('#count_stock').val());
					console.log("option is: "+ $('select').val());
					
				  //  $('#count_stock,select').unbind('#count_stock,select,#place').change( function(){
					
						//  console.log("count is: "+ $('#count_stock').val());
							if  ( ( ! $.isNumeric($('#count_stock').val()) ) || ($('#count_stock').val() <= 0) ){
								$('#error_count').html('Count of stock should be a non-negative number and atleast 1');
								$('#total').html('N/A');
								
							}
							else{
							var count_stock=$('#count_stock').val();
							var last_price=data[2];
							var order_amount= (count_stock * last_price );
							var company_name=$('#count_stock').val();
							console.log("order amount is : " + order_amount);
							$('#lp').html(data[2]);
								$('#error_count').html('');
								$('#total').html(order_amount);
							
							var verify_data=[symbol,$('select').val(),count_stock,last_price,order_amount];
							console.log(verify_data);
							fetchData(verify_data);
									
								
							}
						//});
				 }  
		  // $('#test').html('testcase');
            //$('#user_count').html(data['user_count']);
            //$('#most_recent_post').html(data['most_recent_post']);

        }
    });
	
});
	
	function fetchData(response){
		console.log(response);
		$.ajax({
			type: 'POST',
			async:false,
			url: '/trade/stockInfo/', //$.getJSON(data),
			//data:JSON.stringify(response),
			data: {result: response},
			  
			
		
			
			// $('#post_count').html('hello'),
			success: function(result) { 
			// $('#lp').html(result);
				if (result == 'success'){
				$('#place').show();
				//$('#place').click( placeOrder(response) ); /*function (){ */
				$('#place').click( function(){
				
				placeOrder(response);
				
				 //$(this).html('');
				 $('#order').html('Order has been Placed.Check your portfolio to see the order.This page is being re-loaded to allow another order....');
				 // setTimeout(location.reload(), 50000);
				  setTimeout(function() {
						  // Do something after 5 seconds
						  location.reload()
					}, 2000);   
				//  $('#order').html('Order has been Placed.Check your portfolio to see the order.');
				//$('#place').hide();
				});
				
				
										//});	
				}
				else{
				$('#place').hide();
				$('#error_count').html(result);
				}
			}
		
		});
	}
	
	function placeOrder(response){
	
	$('#order').html(response);
		$.ajax({
			type: 'POST',
			async:false,
			url: '/trade/placeOrder/', //$.getJSON(data),
			//data:JSON.stringify(response),
				data: {result: response},
				 beforeSend : function (){
            $('#order').html("Placing order...");
			 //$.blockUI();
            },
			// $('#post_count').html('hello'),
			success: function(result) { 
			
				if (result == 'success'){
				
				}
				else{
				
				}
			}
		
		});
	}
	
	
	
