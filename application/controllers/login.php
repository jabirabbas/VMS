<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
   {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
 
	public function index()
	{
		$this->load->view('login');
	}
	
	public function authenticate()
	{
		$this->load->model('loginmodel');
		$username = mysql_real_escape_string(trim($this->input->post('username', true)));
		$password = mysql_real_escape_string(trim($this->input->post('password', true)));
		$verify = $this->loginmodel->getData($username, $password);
		if($verify)
		{
			$this->session->set_userdata('user',$verify);
			redirect('visitors/index');
		}
		else {
			$this->session->set_userdata('error','Username Password Mismatch!!!');
			redirect('login/index');

		}
	}
}