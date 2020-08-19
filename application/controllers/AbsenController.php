<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AbsenController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('KaryawanModel', 'AbsenModel', 'GajiModel' ,'JabatanModel');
		$helper = array('tgl_indo_helper');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'absen' => $this->AbsenModel->lihat_absen(),
			'karyawan' => $this->KaryawanModel->lihat_karyawan(),
			'jabatan' => $this->JabatanModel->lihat_jabatan(),
			'title' => 'Absen');
		$this->load->view('templates/header',$data);
		$this->load->view('backend/absen/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])){
			$generate = substr(time(), 5);
			$id = 'PEG-' . $generate;
			$karyawan = $this->input->post('karyawan');
			$rekap = $this->input->post('rekap_absen');
			$gajiId = $this->input->post('jabatan');
			$mapel = $this->input->post('mapel');
			$data = array(
				'absen_id' => $id,
				'absen_karyawan_id' => $karyawan,
				'absen_rekap' => $rekap,
				'mata_pelajaran' => $mapel,
				'absen_jabatan_id' => $gajiId
			);
			$save = $this->AbsenModel->tambah_absen($data);
			if ($save>0){
				$this->session->set_flashdata('alert', 'tambah_absen');
				redirect('absen');
			}
			else{
				redirect('absen');
			}
		}
	}

	public function lihat($id){
		$data = $this->AbsenModel->lihat_satu_absen($id);
		echo json_encode($data);
	}

	public function update(){
		if (isset($_POST['update'])){
			$id = $this->input->post('id');
			$absen = $this->input->post('absen');
			$mata = $this->input->post('mata_pelajaran');
			$gajiId = $this->input->post('jabatan');
			$data = array(
				'absen_rekap' => $absen,
				'mata_pelajaran' => $mata,
				'absen_jabatan_id' => $gajiId
			);
			$save = $this->AbsenModel->update_absen($id,$data);
			if ($save>0){
				$this->session->set_flashdata('alert', 'update_absen');
				redirect('absen');
			}
			else{
				redirect('absen');
			}
		}
	}

	public function hapus($id){
		$hapus = $this->AbsenModel->hapus_absen($id);
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'hapus_absen');
			redirect('absen');
		}else{
			redirect('absen');
		}
	}

	public function ajaxIndex(){
		echo json_encode($this->AbsenModel->lihat_absen());
	}
}
		

	// public function lembur($id){
	// 	$dataAbsen = array(
	// 		'absen_status' => 'lembur'
	// 	);

	// 	$updateAbsen = $this->AbsenModel->update_absen($id,$dataAbsen);
	// 	if ($updateAbsen > 0) {
	// 		$cekAbsen = $this->AbsenModel->lihat_satu_absen($id);

	// 		$gaji = $this->GajiModel->lihat_satu_gaji($cekAbsen['karyawan_id']);
	// 		$gajiId = $gaji['gaji_id'];
	// 		$gajiLembur = $gaji['gaji_lembur'];
	// 		$gajiLembur = $gajiLembur + $gaji['jabatan_gaji'];
	// 		$dataGaji = array(
	// 			'gaji_lembur' => $gajiLembur
	// 		);
	// 		$updateGaji = $this->GajiModel->update_gaji($gajiId,$dataGaji);

	// 		$this->session->set_flashdata('alert', 'update_absen');
	// 		redirect('absen');
	// 	} else {
	// 		redirect('absen');
	// 	}
	// }
