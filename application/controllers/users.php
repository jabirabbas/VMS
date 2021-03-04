<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$sql = $this->db->where('role != "admin"')->get('users');
		$data['users'] = $sql->result();
		$data['filename'] = APPPATH.'views/users.php';
		$data['heading'] = 'Users';
		$this->load->view('home', $data);
	}
	
	public function add()
	{
		$data['filename'] = APPPATH.'views/users_add.php';
		$data['heading'] = 'Users';
		$this->load->view('home', $data);
	}
	
	public function edit()
	{
		$id = $this->uri->segment(3);
		$sql = $this->db->get_where('users', array('id' => $id));
		$data['users'] = $sql->result();	
		$data['filename'] = APPPATH.'views/users_add.php';
		$data['heading'] = 'Users';
		$this->load->view('home', $data);
	}
	
	public function save()
	{
		$id = $_POST['id'];
		$users = $this->input->post();
		if($id) {
			$this->db->where('id', $id);
			$this->db->update('users', $users);
			$this->session->set_userdata('message','User was successfully updated!');	
		}
		else {
			$this->db->insert('users', $users);
			$id = $this->db->insert_id();
			$this->session->set_userdata('message','User was successfully added!');
		}
		redirect('users');
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->db->delete('users', array('id' => $id));
		redirect('users/index'); 
	}
	
	public function deleteMultiple()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id IN('.$id.')');
		$this->db->delete('users');
		redirect('users/index'); 
	}
	
	public function excel()
	{
		$sql = $this->db->where('role != "admin"')->get('users');
		$query = $sql->result();
		export_excel('users', $query);
		redirect('users/index');
	}
	
}