		
		<p> Search Stock Symbol: <input type="text" id="symbol" maxlength='15' required> </p>
		<button id='submit-button'>Submit</button> 
		<div id='error'></div>
		
		<div id='search'>
		<h3>Stock Information		
		Symbol: <span id='stock'></span><br>
		 Company Name: <span id='company'></span> <br>
		Last Price: <span id='lp'></span><br>
		Change from last day: <span id='priceChg'></span><br>
		Percentage Change: <span id='percentageChg'></span>
		</h3>
		</div>
		
		<form action='/trade'/>
		<input type='submit' id='trade-button' value='Trade this Stock'>
		</form>
		