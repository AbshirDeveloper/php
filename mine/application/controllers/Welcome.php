<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
		public function index($page = 'abshir'){
		if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
			echo "page doesn't exist";
		}

		$this->load->view('pages/'.$page);
}
}

