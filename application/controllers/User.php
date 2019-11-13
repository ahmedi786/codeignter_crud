<?php

/**  
 * 
 */ 
class User extends CI_Controller 
{

		public function __construct()
		{
		    parent::__construct();

		    $this->load->library('session');
		    $this->load->model('User_model');
		    $this->load->helper(array('form', 'url','file'));
		}

	
		public function index()
		{

		 $query = $this->User_model->listusers();
 		 $data['users'] = array();
 		 if(count($query) > 0) {
 		 $data['users'] =  $query;
 		 }
 		
     $this->load->view('list.php', $data);
	}
	 
	public function create()
	{

 		$this->load->library('upload');

		$this->form_validation->set_rules('name','name','required');
		$this->form_validation->set_rules('email','email','required|valid_email');
		
		if($this->form_validation->run() == false){
			$this->load->view('create');

		} else {

			//save record to database

			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['email'] = $this->input->post('email');
			$formArray['created_at'] = date('y-m-d');

	        $files = $_FILES['userfile'];
          
	        $this->upload->initialize($this->set_upload_options());
	        $this->upload->do_upload();
	        $dataInfo = $this->upload->data();

			$image_path=base_url("upload/".$dataInfo['raw_name'].$dataInfo['file_ext']);
			$formArray['photo']=$image_path;

			$this->User_model->create($formArray);

			$this->session->set_flashdata('success','Record added successfully');
			redirect(base_url().'index.php/user/index');
		}
		
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './upload/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;
	    return $config;

	}

	public function edit($id)
	{

		$this->load->model('User_model');

		$data=$this->User_model->getUserById($id);

		$this->load->view('edit.php',compact('data'));
		
	}

	public function update()
	{
			$this->load->model('User_model');

        	$update = array(
            'name' => $this->input->post('name'),   //new name value anything if changed or old one from edit_form assigned 
            'email' => $this->input->post('email'),
            
            );
            $id = $this->input->post('user_id');
            $this->User_model->editCrud($id,$update);

            $this->session->set_flashdata('success','Record updated successfully');

            redirect(base_url().'index.php/user/index');
            
    }

    public function delete($id)
    {
    	$this->load->model('User_model');
    	$data=$this->User_model->deletecrud($id);
    	$this->session->set_flashdata('success','Record deleted successfully');
    	redirect(base_url().'index.php/user/index');

    }
}

?>