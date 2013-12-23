				
		
		 <h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
		
		<?php if($user): ?>	<!-- Menu options for users who logged in,for landing page -->
			<?php Router::redirect("/accounts"); ?>
				
		<!-- Menu options for users who are not logged in -->
        <?php else: ?>
		<div class="hero-unit" >
			<p>This is a simulator site for Stock market Trading.It helps you create a stock brokerage account,get live quotes,place buy/sell orders in your account,check transaction history and performance of your portfolio.</p>
		
			</div>
			
					 
			
			
					
					<div class="row">
				 <div class="span6">
				
					<?=$login_module?>
					 
				 </div>
				 <div class="span6">
				 <h3>Are you a new client? Please sign up :	</h3>
					 <?=$signup_module?>
				 </div>
			 </div>
			
			
		
			
		<!--	<div id="bottomLeft">
			<a href='http://validator.w3.org/check?uri=http%3A%2F%2Fp2.letsmakewebapps.biz%2F'>Html Validation</a>
			</div> -->
		
		<?php endif; ?>
		
	
		
		
