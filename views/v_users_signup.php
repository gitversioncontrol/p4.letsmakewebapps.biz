<form method='POST' action='/users/p_signup'>

    <p>First Name : <input type='text' name='first_name' required> <div id='first' class='msg'></div> </p>
   

   <p> Last Name : <input type='text' name='last_name'  required> <div id='last' class='msg'></div> </p>
   

    <p> Email Id: <input type='email' name='email'  required> <div id='email' class='msg'></div> </p>
    

    <p> Password : <input type='password' name='password'  required> <div id='pw' class='msg'></div> </p>
	
	<p> Initial balance : <input type='text' name='balance'  required> <div id='balance' class='msg'></div> </p>
  
	
	<?php if(isset($error)): ?>
	        <div class='error'>
            Sign-up failed.
			<? echo "<br> $error <br> "?>
			<a href='/users/login'>Log in</a>
        </div>
        <br>
    <?php endif; ?>
	
    <input type='submit' value='Sign up' >

</form>

