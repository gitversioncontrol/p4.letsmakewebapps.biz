		
		<p> Search Stock Symbol: <input type="text" id="symbol" maxlength='15' required> </p>
		<button id='submit-button'>Submit</button> 
		<div id='error'></div>
		
		<div id='search'>
		<h3>Stock Information</h3>	
		<p> Symbol: <span id='stock'></span></p>
		<p> Company Name: <span id='company'></span> </p>
		<p> Last Price: <span id='lp'></span> </p>
		<p> Change from last day: <span id='priceChg'></span></p>
		<p> Percentage Change: <span id='percentageChg'></span> </p>

		</div>
		
		<form action='/trade'/>
		<input type='submit' id='trade-button' value='Trade this Stock'>
		</form>
		