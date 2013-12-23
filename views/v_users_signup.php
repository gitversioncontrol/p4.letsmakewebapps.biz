<form method='POST' action='/users/p_signup'>

    <p>First Name : <input type='text' name='first_name' required>  </p>
   

   <p> Last Name : <input type='text' name='last_name'  required>  </p>
   

    <p> Email Id: <input type='email' name='email'  required>  </p>
    

    <p> Password : <input type='password' name='password'  required>  </p>
	
	<p> Initial balance : <input type='text' name='balance'  required> </p>
  
	
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

