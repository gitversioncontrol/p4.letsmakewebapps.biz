<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
		<div id='menu'>

       <a href='/'>Home</a>

        <!-- Menu for users who are logged in -->
        <?php if($user): ?>
		 <a href='/trade'>Trade</a>
		 <a href='/transactions'>Account History</a>
		 <a href='/performance'>Gain/Loss Center</a>
		 <a href='/quotes'>Quotes</a>
		 <a href='/users/logout'>Logout</a>
            
		<!-- Menu options for users who are not logged in -->
        <?php else: ?>
		<!--	<div id="top"> -->
			 <a href='/users/login'>Log in</a>
			 <a href='/users/signup'>Sign up</a>
			<!-- </div> -->
					 
        <?php endif; ?>

		</div>
		
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>