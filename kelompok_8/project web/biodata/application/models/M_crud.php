<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

	
	public function input(){
    $data = array('name' => $this->input->post('name') , 
                  'email'=> $this->input->post('email'),
                  'phone'=> $this->input->post('phone'));
    return $this->db->insert('user',$data);
	}

	public function tampil(){
    $this->db->select('*');
	return $this->db->get('user');
	}

	public function delete(){

        $this->db->where('id',$this->uri->segment(3));
        return $this->db->delete('user');

	}

	public function m_edit(){

    $this->db->select('*');
    $this->db->where('id',$this->uri->segment(3));
	return $this->db->get('user');
	
	}

	public function m_update(){

		$data = array('name' => $this->input->post('name') , 
                  'email'=> $this->input->post('email'),
                  'phone'=> $this->input->post('phone'));

        $this->db->where('id',$this->uri->segment(3));
        return $this->db->update('user',$data);

	}

}

/* End of file M_crud.php */
/* Location: ./application/models/M_crud.php */