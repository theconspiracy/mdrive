<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drivelog extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->model('Drivelog_model','drivelog',true);
    }
    
	
	public function index()
	{
		$data['brands'] = $this->drivelog->brands();
		$data['users'] = $this->drivelog->users();
		$data['capacity'] = $this->drivelog->capacity();
		
		$this->load->view('drivelog',$data);
	}
	
	public function addBrand()
	{
		$data = $_POST;
		$this->drivelog->addBrand($data);
		echo '{"method":"brands"}';
	}
	
	public function deleteBrand()
	{
		$data = $_POST;
		$this->drivelog->deleteBrand($data['brand_id']);
		echo '{"method":"brands"}';
	}
	
	public function addUser()
	{
		$data = $_POST;
		unset($data['add']);
		$this->drivelog->addUser($data);
		echo '{"method":"users"}';
	}
	
	public function deleteUser()
	{
		$data = $_POST;
		$this->drivelog->deleteUser($data['user_id']);
		echo '{"method":"users"}';
	}
	
	
	public function addCapacity()
	{
		$data = $_POST;
		unset($data['add']);
		$this->drivelog->addCapacity($data);
		echo '{"method":"capacity"}';
	}
	
	public function deleteCapacity()
	{
		$data = $_POST;
		unset($data['delete']);
		$this->drivelog->deleteCapacity($data['capacity_id']);
		echo '{"method":"capacity"}';
	}
	
	public function addDrive()
	{
		$data = $_POST;
		unset($data['add']);
		$this->drivelog->addDrive($data);
	}
	
	public function modifyDrive()
	{
		$data = $_POST;
		unset($data['add']);
		$this->drivelog->modifyDrive($data);
	}
	
	public function deleteDrive()
	{
		$data = $_POST;
		$this->drivelog->deleteDrive($data['id']);
	}
	
	public function search()
	{
		
	}
	
	public function brands(){
		
		$brands =  $this->drivelog->brands();
		$html = '<select name="brand_id" size="1">';
		foreach($brands as $key =>$value)
		
		{
			$html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
		} 
		
		$html .= '<select>';
		echo $html;
	}

	public function capacity(){
		
		$capacity =  $this->drivelog->capacity();
		$html = '<select name="capacity_id" size="1">';
		foreach($capacity as $key =>$value)
		
		{
			$html .= '<option value="'.$value->id.'">'.$value->amount.'</option>';
		} 
		
		$html .= '<select>';
		echo $html;
	}
	
	public function users(){
		
		$users =  $this->drivelog->users();
		$html = '<select name="user_id" size="1">';
		foreach($users as $key =>$value)
		
		{
			$html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
		} 
		
		$html .= '<select>';
		echo $html;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */