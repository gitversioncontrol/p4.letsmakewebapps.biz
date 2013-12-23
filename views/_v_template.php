<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
		<div class="container">
			<div   class="navbar">

		   <a href='/' class="btn btn-large btn-success">Home</a>

			<!-- Menu for users who are logged in -->
			<?php if($user): ?>
			 <a href='/trade' class="btn btn-large btn-success">Trade</a>
			 <a href='/transactions' class="btn btn-large btn-success">Account History</a>
			 <a href='/accounts/performance' class="btn btn-large btn-success">Gain/Loss Center</a>
			 <a href='/quotes' class="btn btn-large btn-success">Quotes</a>
			 <a href='/users/logout' class="btn btn-large btn-success">Logout</a>
				
			<!-- Menu options for users who are not logged in -->
			<?php else: ?>
			<!--	<div id="top"> -->
				 <a href='/users/login' class="btn btn-large btn-success">Log in</a>
				 <a href='/users/signup' class="btn btn-large btn-success">Sign up</a>
				<!-- </div> -->
						 
			<?php endif; ?>

			</div>
		
	
		
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
		</div>
</body>
</html>