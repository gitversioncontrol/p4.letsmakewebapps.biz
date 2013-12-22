<h1> Transaction History </h1>

Here are recent transactions done by you:

<?php foreach($txns as $txn): ?>

<article>
 <p>
 At:  <time datetime="<?=Time::display($txn['txn_time'],'Y-m-d G:i')?>"> <?=Time::display($txn['txn_time'])?></time> 
 ,an order of <?=$txn['stocks_count'] ;?> stocks for:<?=$txn['stock_symbol'] ;?>  and market price of <?=$txn['market_price'] ;?>was placed.
Total order amount :<?=$txn['total_order'] ;?>

</p>
</article>

<?php endforeach; ?>