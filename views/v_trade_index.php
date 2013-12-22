<h1>Submit Your Order</h1>

<form id="orderform" >
<p> Symbol:<input type="text" id="symbol" maxlength='15' class='stock' required> <span id='error'></span></p>
<p> 		<label>Buy/Sell</label>
             <select id = "myList">
               <option value = "Buy" class='stock'>Buy</option>
               <option value = "Sell" class='stock'>Sell</option>
              </select>
</p>
<p>  Shares Count:<input type="text" id="count_stock" maxlength='15' class='stock' required> <span id='error_count'></span> </p>
<p>Last Price: <span id='lp' class='stock' > </span> </p>
<p> Total Order amount: <span id='total' class='stock' ></span> </p>
<input type='button' id='place' value='Place Order'  > <span id='order'></span>

</form>