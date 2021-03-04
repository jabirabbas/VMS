<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$id = $this->session->userdata['user'][0]->id; 
		$sql = $this->db->get_where('users', array('id'=>$id));
		$data['user'] = $sql->result();
		$data['heading'] = 'Edit Profile';
		$data['filename'] = APPPATH.'views/profile.php';
		$this->load->view('home', $data);
	}
	
	public function save()
	{
		$profile = $_POST;
		$check = $this->db->get_where('users', array('password'=>$profile['oldpassword']));
		$result = $check->result();
		if(!empty($result)){
			$profile['password'] = $profile['newpassword'];
			unset($profile['oldpassword'], $profile['confirm'],$profile['newpassword']);
			$this->db->update('users', $profile);
			$this->session->set_userdata('message','Profile was successfully updated!');	
		}
		else
		{
			$this->session->set_userdata('error','Old Password was not correct!');		
		}
		redirect('profile/index');
	}
	
	
}