<?php

class base_controller {
	
	public $user;
	public $userObj;
	public $template;
	public $email_template;

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
						
		# Instantiate User obj
			$this->userObj = new User();
			
		# Authenticate / load user
			$this->user = $this->userObj->authenticate();					
						
		# Set up templates
			$this->template 	  = View::instance('_v_template');
			$this->email_template = View::instance('_v_email');		

		# JavaScript files
      //  $client_files_body = Array('/js/jquery-1.10.2.min.js');
       // $this->template->client_files_body = Utils::load_client_files($client_files_body);			
								
		# So we can use $user in views			
			$this->template->set_global('user', $this->user);
			
	}
	
} # eoc
