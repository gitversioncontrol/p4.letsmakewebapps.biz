$('#trade-button').hide(); //To Hide  Trade button 
$('#submit-button').click(function(){
	var symbol=$('#symbol').val();
	console.log(symbol);
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
			$('#trade-button').hide();
			//echo data;
            // Inject the data into the page
				if(data == false){
				console.log('error');
				$('#error').html('Invalid Symbol');
				 $('#stock').html('N/A');
				   $('#company').html('N/A');
				   $('#lp').html('N/A');
				   $('#priceChg').html('N/A');
				   $('#percentageChg').html('N/A')
				   $('#trade-button').hide(); 
				}
				else{
					$('#error').html('');
				   $('#stock').html(data[0]);
				   $('#company').html(data[1]);
				   $('#lp').html(data[2]);
				   $('#priceChg').html(data[3]);
				   $('#percentageChg').html(data[4]);
				   $('#trade-button').show(); //Show Trade button for valid Stock Symbol
				 }  
		  // $('#test').html('testcase');
            //$('#user_count').html(data['user_count']);
            //$('#most_recent_post').html(data['most_recent_post']);

        }
    });
	
	//$('#post_count').html('test');
});