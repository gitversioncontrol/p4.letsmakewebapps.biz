		
		<p> Search Stock Symbol: <input type="text" id="symbol" maxlength='15' required> </p>
		<button id='submit-button'>Submit</button> 
		<div id='error'></div>
		
		<div id='search'>
		<h3>Stock Information</h3>		
		Symbol: <span id='stock'></span><br>
		 Company Name: <span id='company'></span> <br>
		Last Price: <span id='lp'></span><br>
		Change from last day: <span id='priceChg'></span><br>
		Percentage Change: <span id='percentageChg'></span>
		</div>
		
		<button id='trade-button' action='/posts/p_add'>Trade this Stock</button> 
		
		