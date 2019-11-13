<?php

/**
 *  
 */
class User_model extends CI_model
{
	function listusers(){
		 $this->db->select("*");
		
  		 $this->db->from('users');
 		 $query = $this->db->get();
 		 return $query->result(); 
	}

	function create($formArray){
	
	$this->db->insert('users',$formArray); //Insert into users (name,email) values (?,?)
    }


    // Get user by id
    function getUserById($id){ 

        $this->db->select('*');
        $this->db->where('user_id',$id);
        $q = $this->db->get('users');
        $result = $q->result_array();
        return $result;
    }


       public function editCrud($id,$update)
    {
        $this->db->where('user_id',$id);
        $this->db->update('users', $update);
        return true;

    }

    public function deletecrud($id)
    {
        $this->db->where('user_id',$id);
        $this->db->delete('users');
    }

    function upload($data)
    {
       
        $this->db->insert('users',$data);
         return true;
    } 

   
}


?>