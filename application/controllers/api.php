<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {


	function __construct()
    {
        parent::__construct();
		//$this->load->model('Drivelog_model','drivelog');
        
    }
    
	public function index()
	{
		//$this->load->view('drivelog');
	}
	
	public function addBrand()
	{
		//$this->load->view('drivelog');
		//$this->drivelog->addBrand();
	}
	
	public function deleteBrand()
	{
		
	}
	
	public function addUser()
	{
		//$this->load->view('drivelog');
	}
	
	public function deleteUser()
	{
		
	}
	
	
	public function addCapacity()
	{
		//$this->load->view('drivelog');
	}
	
	public function deleteCapacity()
	{
		
	}
	
	public function addDrive()
	{
		//$this->load->view('drivelog');
	}
	
	public function modifyDrive()
	{
		
	}
	
	public function deleteDrive()
	{
		
	}
	
	public function search()
	{
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */