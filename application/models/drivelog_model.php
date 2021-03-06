<?php 

class Drivelog_model extends CI_Model {
	


    function __construct()
    {
        parent::__construct();
    }
	
	
	
	
	public function brands()
	{
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get('brands');
		
		return $query->result();
	}
	
	public function users()
	{
		$sql = 'SELECT * FROM users where name!=\'Limbo\' ORDER BY name ASC'; 
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function allUsers()
	{
		$sql = 'SELECT * FROM users  ORDER BY name ASC'; 
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function capacity()
	{
		$this->db->order_by("amount", "asc"); 
		$query = $this->db->get('capacity');
		return $query->result();
	}
	
	public function drives()
	{
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get('drives');
		return $query->result();
	}
	
	
	#################### ADMIN ##################
	
	public function addBrand($data)
	{
		$this->db->insert('brands', $data);
	}
	
	public function deleteBrand($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('brands'); 
	}
	
	public function addUser($data)
	{
		$this->db->insert('users', $data);
	}
	
	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users'); 
	}
	
	
	public function userLimbo($id)
	{
		$SQL = 'UPDATE drives '
		.' SET user_id=\'14\' '
		.' WHERE user_id=\''.$id.'\' ';
		                                                     
		
		$query = $this->db->query($SQL);
		
		$this->db->where('id', $id);
		$this->db->delete('users'); 
	}
	
	
	public function addCapacity($data)
	{
		$this->db->insert('capacity', $data);
	}
	
	public function deleteCapacity($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('capacity'); 
	}
	
	
	public function addDrive($data)
	{
		$this->db->insert('drives', $data);
	}
	
	public function modifyDrive($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('drives', $data); 
	}
	
	public function deleteDrive($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('drives'); 
	}
	
	public function search($searchTerm)
	{
		
		
	$SQL = 'SELECT '
	.' DISTINCT d.id, '
	.' d.name, '
	.' d.contents, '
	.' d.jobs, '
	.' d.brand_id, '
	.' d.user_id, '
	.' d.capacity_id, '
	.' d.free, '
	.' d.free_space '
	
	.' FROM drives as d, users as u, brands as b '
	
	.' WHERE d.contents LIKE \'%'.$searchTerm.'%\' '
	.' || d.name LIKE \'%'.$searchTerm.'%\' '
	.' || d.jobs LIKE \'%'.$searchTerm.'%\' '
	.' || (d.brand_id=b.id && b.name LIKE \'%'.$searchTerm.'%\' )'
	.' || (d.user_id=u.id && u.name LIKE \'%'.$searchTerm.'%\' ) ';
		
		$query = $this->db->query($SQL);
		return $query->result();
	}
}	
?>