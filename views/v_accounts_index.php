<h1> Account Status and Portfolio </h1>


<p>Total Account value: $<?=$total; ?>   </p>

<p> Remaining Cash balance: $<?=$balance; ?> </p>

<p> Amount invested: $<?=$amount_invested; ?>   </p>

<h3> Portfolio: </h3>
<table class="table">  
        <thead>  
          <tr>  
            <th>Stock Symbol</th>  
            <th>Count Bought</th>  
			<th>Count Sold</th>
			<th>Cost Basis</th>	
            <th>Amount Invested</th>  
          </tr>  
        </thead>  
        <tbody id="tabledata">  
	<?php foreach($txns as $txn): ?>
			<tr>  
            <td><?=$txn['stock_symbol'] ;?></td>  
            <td><?=$txn['count_bought'] ;?></td>  
			<td><?=$txn['count_sold'] ;?></td> 
            <td><?=$txn['cost_basis'] ;?></td>  
            <td><?=$txn['amount_invested'] ;?></td>  
			</tr>
	<?php endforeach; ?>	
			  
        </tbody>  
      </table>  

