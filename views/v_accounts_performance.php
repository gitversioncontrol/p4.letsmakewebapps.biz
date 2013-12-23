<h1>  Performance of your Portfolio </h1>


<p>Total Realized gain/loss after selling stocks: $<?=$total_realized; ?>   </p>

<p> Total Unrealized gain/loss for stocks currently in your portfolio: $<?=$total_unrealized; ?> </p>

<h3> Details of performance for each company stock investment: </h3>
<table class="table">  
        <thead>  
          <tr>  
            <th>Stock Symbol</th>  
            <th>Unrealized gain ($) </th>  
			<th>Realized gain ($)</th>	
          </tr>  
        </thead>  
        <tbody id="tabledata">  
	<?php foreach($txns as $txn): ?>
			<tr>  
            <td><?=$txn['stock_symbol'] ;?></td>  
            <td><?=$txn['unrealized_gain'] ;?></td>  
            <td><?=$txn['realized_gain'] ;?></td>  
			</tr>
	<?php endforeach; ?>	
			  
        </tbody>  
      </table>  

