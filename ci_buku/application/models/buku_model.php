<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {


	public function getall()
	{
		return $this->db->get('buku');

	}

	public function tambahData($table,$data){
		 $this->db->insert($table,$data);

	}
	public function hapusData($tablename,$id){
		$this->db->where('id',$id);
		return $this->db->delete($tablename);
	}
	public function editData($table_name,$id){
		$this->db->where('id',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}
	public function updateData($table_name,$data,$id){
		$this->db->where('id',$id);
		$edit = $this->db->update($table_name,$data);
		return $edit;
	}
}
