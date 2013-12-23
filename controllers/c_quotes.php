<?php
class quotes_controller extends base_controller {

  
   /*public function __construct() { Enable it to check cookie
		parent::__construct();
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
		die("Members only. <a href='/users/login'>Login</a>");
		}
	}
	*/ 
	
  public function index() {
       // Route it to Landing page
	   //Router::redirect("/");
	      # Setup view
        $this->template->content = View::instance('v_quotes_index');
        $this->template->title   = "Quotes";

    # JavaScript files
        $client_files_body = Array(
			'/css/bootstrap.css',
			'/js/jquery-1.10.2.min.js',
            '/js/jquery.form.js',
			'js/bootstrap.js',
            '/js/quotes_index.js');
        $this->template->client_files_body = Utils::load_client_files($client_files_body);

    # Render template
        echo $this->template;
    }



}
