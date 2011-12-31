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
		echo '{"method":"brands"}';
	}
	
	public function modifyDrive()
	{
		$data = $_POST;
		unset($data['add']);
		$this->drivelog->modifyDrive($data);
		echo '{"method":"brands"}';
	}
	
	public function deleteDrive()
	{
		///print_r($_POST);
		$data = $_POST;
		$this->drivelog->deleteDrive($data['id']);
		echo '{"method":"drives","drive":"d_'.$data['id'].'"}';
	}
	
	public function search()
	{
		///print_r($_POST);
		$results = $this->drivelog->search($_POST['search_term']);
		$formattedResults[] = $this->formatSearchResults($results);
		echo '{"method":"search","results":'.json_encode($formattedResults).'}';
	}
	
	private function formatSearchResults($results)
	{
		
		
			$template = '<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
								<tr>
									<td class="dsR28">Name</td>
									<td class="dsR28">Contents</td>
									<td class="dsR121">Jobs</td>
									<td class="dsR20">Brand</td>
									<td class="dsR28">Capacity</td>
									<td class="dsR28">Free Space</td>
									<td class="dsR28">User</td>
									<td class="dsR28">Free</td>
									<td class="dsR28">Update</td>
									<td class="dsR28">Delete</td>
								</tr>
								<tr>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR121">
										<hr />
									</td>
									<td class="dsR20">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
								</tr>';
			foreach($results as $key => $value)
			{
				
				$template .= '<form id="drive_'.$value->id.'" method="POST"><tr id="d_'.$value->id.'">
									<td class="dsR28"><input class="dsR77" type="text" name="name" value="'.$value->name.'" size="8" maxlength="5" /></td>
									<td class="dsR28"><textarea class="dsR75" name="contents" rows="2" cols="50">'.$value->contents.'</textarea></td>
									<td class="dsR121"><input class="dsR122" type="text" name="jobs" value="'.$value->jobs.'" size="24" /></td>
									<td class="dsR20" class="brands">
			
										<select name="brand_id" size="1">';
				
				$brands = $this->drivelog->brands();	
				
				foreach($brands as $k =>$val)
				{
					$selected = '';
					
					if($val->id == $value->brand_id)
					{
						$selected = 'selected';
					}
					$template .= '<option '.$selected.' value="'.$val->id.'">'.$val->name.'</option>';
				}				
				
				$template .= '	</select>
										</td>
									<td class="dsR28"><select class="dsR54" name="capacity_id" size="1" class="capacity">';
				$capacity = $this->drivelog->capacity();	
				
				foreach($capacity  as $k =>$val)
				{
					$selected = '';
					
					if($val->id == $value->capacity_id)
					{
						$selected = 'selected';
					}
					$template .= '<option '.$selected.' value="'.$val->id.'">'.$val->amount.'</option>';
				}				
				
				$template .= '						</select></td>
									<td class="dsR28"><input class="dsR77" type="text" name="freespace" value="'.$value->free_space.'" size="8" maxlength="8" /></td>
									<td class="dsR28"><select name="user_id" size="1" class="users">';
			
				$users = $this->drivelog->users();	
				
				foreach($users  as $k =>$val)
				{
					$selected = '';
					
					if($val->id == $value->user_id)
					{
						$selected = 'selected';
					}
					$template .= '<option '.$selected.' value="'.$val->id.'">'.$val->name.'</option>';
				}				
								
				$free = '';
				
				if($value->free == 1)
				{
					$free = ' selected ';
				}
				
							
				$template .= '	</select></td>
									<td class="dsR28"><select name="free" size="1">
											<option '.$free.' value="Yes">Yes</option>
											<option '.$free.' value="No">No</option>
										</select></td>
										
									<td class="dsR28"><input type="button" name="submitButtonName" value="Update" onClick="javascript:$.api(\'drive_'.$value->id.'\',\'updateDrive\');"/></td>
									<td class="dsR28"><input type="button" name="submitButtonName" value="Delete"  onClick="javascript:$.api(\'drive_'.$value->id.'\',\'deleteDrive\',{cofirmAction:true});"/></td>
								</tr><input type="hidden" name="id" value="'.$value->id.'"></form>';
			}
	
			$template .= '</table>';				
			return $template;
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