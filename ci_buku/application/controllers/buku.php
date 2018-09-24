<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {


	public function index()
	{
		$data['hasil'] = $this->buku_model->getall('buku')->result_array();
		$this->load->view('buku_view',$data);
	}

	public function form_add(){
		$this->load->view('buku_add');
	}

	public function insert(){
		$judul_buku = $this->input->post('judul_buku');
		$pengarang= $this->input->post('pengarang');
		$stock = $this->input->post('stock');

		$data = array(
			'judul_buku' => $judul_buku,
			'pengarang' =>$pengarang,
			'stock' => $stock
		);
		$this->buku_model->tambahData('buku',$data);
		redirect('buku/index');
	}

	public function editBuku($id){
		$this->data['editData'] = $this->buku_model->editData('buku',$id);
		$this->load->view('form_edit',$this->data);
	}

	
	public function delete($id){
		$this->buku_model->hapusData('buku',$id);
		redirect('buku/index');

	}
	public function update_buku($id){
		$id = $this->input->post('id');
		$judul_buku = $this->input->post('judul_buku');
		$pengarang= $this->input->post('pengarang');
		$stock = $this->input->post('stock');

		$data = array(
			'judul_buku' => $judul_buku,
			'pengarang' =>$pengarang,
			'stock' => $stock
		);
		$edit = $this->buku_model->updateData('buku',$data,$id);

		if($edit >0){
			redirect('buku/index');
		}else{
			echo "Data gagal dsimpan";
		}
	}
}
