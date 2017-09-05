<?php

class user_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
		
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }
	function delete_user($user_id)
	{
		$this->db->where('c_id',$user_id);
		$delete_user=$this->db->delete("customer");
		if($delete_user)
		{
		return 1;
		}else
		{
		return 0;
		}
	}
	function get_userdetails($user_id)
	{
	$this->db->where('c_id',$user_id);
	$query=$this->db->get('customer');
	return $query->row_array();
	}
    function add_user_details($insert_data)
	{
	$insert_id=$this->db->insert('customer',$insert_data);

		if($insert_id)
		{
		return 1;
		}else
		{
		return 0;
		}
	}
	
	function update_user_status($update_data,$user_id)
	{
	$this->db->where('c_id',$user_id);
	$update_id=$this->db->update('customer',$update_data);

		if($update_id)
		{
		return 1;
		}else
		{
		return 0;
		}
	}
	
	
	function update_user_details($insert_data,$user_id)
	{
	$this->db->where('c_id',$user_id);
	$update_id=$this->db->update('customer',$insert_data);

		if($update_id)
		{
		return 1;
		}else
		{
		return 0;
		}
	}

	
    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}

