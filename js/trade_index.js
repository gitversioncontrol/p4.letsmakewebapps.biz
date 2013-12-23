$('#place').hide(); //Hide order button before verification is done for input data

$('input,select').change( function(){ //Event Listener for Symbol input is changed

 $('#place').unbind();
 $('#place').hide();
 var symbol=$('#symbol').val();

    $.ajax({ //AJAX calls start .This one is to verify stock symbol from Yahoo APi
        type: 'POST',
        url: '/stockAPI/getStock/'+symbol,
        success: function(response) { 
           // Parse the JSON results into an array	
            var data = $.parseJSON(response);
            // Inject the data into the page
				if(data == false){ //If stock symbol is invalid
					$('#error').html('Invalid Symbol');
					$('#lp').html('N/A');
				}
				else{
					$('#error').html('');
					$('#place').hide();

						if  ( ( ! $.isNumeric($('#count_stock').val()) ) || ($('#count_stock').val() <= 0) ){
							$('#error_count').html('Count of stock should be a non-negative number and atleast 1');
							$('#total').html('N/A');
							
						}
						else{
							var count_stock=$('#count_stock').val();
							var last_price=data[2];
							var order_amount= (count_stock * last_price );
							var company_name=$('#count_stock').val();
							$('#lp').html(data[2]);
							$('#error_count').html('');
							$('#total').html(order_amount);
							
							var verify_data=[symbol,$('select').val(),count_stock,last_price,order_amount]; //Array to send data for input verification and placing order
							fetchData(verify_data);
						}
					
				 }  

        }//EOF Success
    }); //EOF AjAX
	
}); //EOF 
	
	function fetchData(response){

		$.ajax({
			type: 'POST',
			async:false,
			url: '/trade/stockInfo/',  //Verifies balance,stock count etc before placing order
			data: {result: response},
			success: function(result) { 

				if (result == 'success'){
					$('#place').show(); //Show place order button
					$('#place').click( function(){
						placeOrder(response);
						 $('#order').html('Order has been Placed.Check your portfolio to see the order.This page is being re-loaded to allow another order....');
						  setTimeout(function() {
							  // Reload page after 2 seconds
							  location.reload()
							}, 2000);   

					});//EOF place click

				}
				else{
					$('#place').hide();
					$('#error_count').html(result);
				}
			}
		
		});//EOF AJAX
	}//EOF
	
	function placeOrder(response){
	
	$('#order').html(response);
		$.ajax({
			type: 'POST',
			async:false,
			url: '/trade/placeOrder/', //Place Order
			data: {result: response},
			beforeSend : function (){
            $('#order').html("Placing order...");
            },
			// $('#post_count').html('hello'),
			success: function(result) { 
			
				if (result == 'success'){
				
				}
				else{
				
				}
			}
		
		});
	}//EOF PlaceOrder
	
	
	
