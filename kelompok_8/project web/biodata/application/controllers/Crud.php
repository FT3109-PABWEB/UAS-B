<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');

	}

	// List all data
	public function index()
	{
     $data['tmp']= $this->m_crud->tampil()->result();
     $this->template->load('role','crud/view',$data);
	}

	// Add a form item
	public function form_add()
	{
     $this->template->load('role','crud/create');
	}
    
    // ada data proses input
	public function add()
	{
     
     $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]|max_length[45]');
     $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|max_length[45]');
     $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[14]');
     
     if ($this->form_validation->run() == TRUE) 
     {
     	if($this->m_crud->input())
            {
            $this->session->set_flashdata('pesan','Add data succesfuly!');
            redirect('crud','refresh');
            }
     } else {
        $this->template->load('role','crud/create');
            }

	}

	public function edit(){

     $data['tmp']=$this->m_crud->m_edit()->row();
     $this->template->load('role','crud/edit',$data);

	}

	//Update one item
	public function update()
	{

	 $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]|max_length[45]');
     $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|max_length[45]');
     $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[14]');
      
      if ($this->form_validation->run() == TRUE) 
      {
		 if($this->m_crud->m_update()){
                $this->session->set_flashdata('pesan','Update data succesfuly!');
                redirect('/','refresh');
	      }else{

	   	        $this->session->set_flashdata('pesan','Update data failed');
                redirect('/','refresh');

	            }

	  }else{

	  	$data['tmp']=$this->m_crud->m_edit()->row();
        $this->template->load('role','crud/edit',$data);
	       
	       }

    }

	//Delete one item
	public function del()
	{

	   if($this->m_crud->delete())
	   {
                $this->session->set_flashdata('pesan','Delete data succesfuly!');
                redirect('crud','refresh');
	   }else{

	   	        $this->session->set_flashdata('pesan','Delete data failed');
                redirect('crud','refresh');

	        }

	}
}

/* End of file Crud.php */
/* Location: ./application/controllers/Crud.php */
