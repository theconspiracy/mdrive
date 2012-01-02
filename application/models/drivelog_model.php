<?php 

class Drivelog_model extends CI_Model {
	


    function __construct()
    {
        parent::__construct();
    }
	
	
	
	
	public function brands()
	{
		$query = $this->db->get('brands');
		return $query->result();
	}
	
	public function users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}
	
	public function capacity()
	{
		$query = $this->db->get('capacity');
		return $query->result();
	}
	
	public function drives()
	{
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
		$SQL = 'SELECT * '
		.' FROM drives '
		.' WHERE contents LIKE \'%'.$searchTerm.'%\' '
		.' || name LIKE \'%'.$searchTerm.'%\' '
		.' || jobs LIKE \'%'.$searchTerm.'%\' ';
		
		$query = $this->db->query($SQL);
		return $query->result();
	}
}	
?>