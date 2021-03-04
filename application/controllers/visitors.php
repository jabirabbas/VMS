<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitors extends CI_Controller {

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
		$sql = $this->db->order_by('id DESC')->get('visitors');
		$data['visitors'] = $sql->result();
		$data['filename'] = APPPATH.'views/visitors.php';
		$data['heading'] = 'Visitors';
		$this->load->view('home', $data);
	}
	
	public function add()
	{
		$data['filename'] = APPPATH.'views/visitors_add.php';
		$data['heading'] = 'Visitors';
		$this->load->view('home', $data);
	}
	
	public function edit()
	{
		$id = $this->uri->segment(3);
		$sql = $this->db->get_where('visitors', array('id' => $id));
		$data['visitors'] = $sql->result();	
		$data['filename'] = APPPATH.'views/visitors_add.php';
		$data['heading'] = 'Visitors';
		$this->load->view('home', $data);
	}
	
	public function save()
	{
		$id = $this->input->post('id');
		$visitors = $this->input->post();
		
		$date = explode('/', $this->input->post('arrival_date'));
		$visitors['arrival_date'] = $date[2].'-'.$date[1].'-'.$date[0];
		
		if($id) {
			$this->db->where('id', $id);
			$this->db->update('visitors', $visitors);
			$this->session->set_userdata('message','Visitor was successfully updated!');	
		}
		else {
			$this->db->insert('visitors', $visitors);
			$id = $this->db->insert_id();
			$this->session->set_userdata('message','Visitor was successfully added!');
		}
		redirect('visitors');
	}
	
	public function search(){
		$search_name = $this->input->get('search_name', true);
		$search_company = $this->input->get('search_company', true);
		
		if(empty($search_company) and empty($search_name)){
			$this->session->set_userdata('error', 'None of the filters were entered');	
		} else {
			if(!empty($search_company)){
				$this->db->like('company', $search_company);
			} 
			if(!empty($search_name)){
				$this->db->like('firstname', $search_name);
				$this->db->or_like('lastname', $search_name);
			}
		}
		
		$sql = $this->db->get('visitors');
		$data['visitors'] = $sql->result();
		
		$data['filename'] = APPPATH.'views/visitors.php';
		$data['heading'] = 'Visitors';
		$this->load->view('home', $data);
		
		
	}
	
	public function printCard(){
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id = '.$id)->get('visitors');
		$data['visitor'] = $sql->row();
		
		$this->load->view('card', $data);	
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->db->delete('visitors', array('id' => $id));
		redirect('visitors/index'); 
	}
	
	public function deleteMultiple()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id IN('.$id.')');
		$this->db->delete('visitors');
		redirect('visitors/index'); 
	}
	
	public function excel()
	{
		$sql = $this->db->get('visitors');
		$query = $sql->result();
		export_excel('visitors', $query);
		redirect('visitors/index');
	}
	
}