<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GajiController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('GajiModel', 'KaryawanModel','JabatanModel');
		$helper = array('tgl_indo','nominal');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	public function index(){
		$data = array(
			'gaji' => $this->GajiModel->lihat_gaji(),
			'karyawan' => $this->KaryawanModel->lihat_karyawan(),
			'jabatan' => $this->JabatanModel->lihat_jabatan(),
			'title' => 'Gaji'
		);
		$this->load->view('templates/header',$data);
		$this->load->view('backend/gaji/index',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_gaji(){
		if (isset($_POST['simpan'])){
			$generate = substr(time(), 5);
			$id = 'PEG-' . $generate;
			$karyawan = $this->input->post('karyawan');
			$gaji_tanggal = $this->input->post('gaji_tanggal');
			$gaji_bulan = $this->input->post('gaji_bulan');
			// $gaji_status = $this->input->post('gaji_status');
			// $gaji_date_created = $this->input->post('gaji_date_created');
			$gajiId = $this->input->post('jabatan');
			$nomorHp = $this->input->post('nomor_hp');
			$gawali = $this->input->post('gawali');
			$trasi = $this->input->post('trasi');
			$mejar = $this->input->post('mejar');
			$piket = $this->input->post('piket');
			$prog = $this->input->post('prog');
			$jam = $this->input->post('jam_ngajar');
			$data = array(
				'gaji_karyawan_id' => $karyawan,
				'gaji_tanggal' => $gaji_tanggal,
				'gaji_bulan_ke' => $gaji_bulan,
				// 'gaji_status' => $gaji_status,
				// 'gaji_date_created' => $gaji_date_created,
				'gawali' => $gawali,
				'trasi' => $trasi,
				'mejar' => $mejar,
				'piket' => $piket,
				'prog' => $prog,
				'jam_ngajar' => $jam,
				'gaji_jabatan_id' => $gajiId
			);
			$save = $this->GajiModel->tambah_gaji($data);
			if ($save>0){
				$this->session->set_flashdata('alert', 'tambah_gaji');
				redirect('gaji');
			}
			else{
				redirect('gaji');
			}
		}
	}


	public function detail($id){
		$data = array(
			'gaji' => $this->GajiModel->lihat_gaji_perorang($id),
			'karyawan' => $this->KaryawanModel->lihat_satu_karyawan($id),
			'title' => 'Gaji'
		);
		$this->load->view('templates/header',$data);
		$this->load->view('backend/gaji/detail',$data);
		$this->load->view('templates/footer');
	}

	public function lihat($id){
		$data = $this->GajiModel->lihat_satu_gaji_by_id($id);
		echo json_encode($data);
	}
	
		public function update(){
			if (isset($_POST['update'])){
				$nama = $this->input->post('nama');
				$gaji_tanggal = $this->input->post('gaji_tanggal');
				$gaji_bulan = $this->input->post('gaji_bulan');
				// $gaji_status = $this->input->post('gaji_status');
				// $gaji_date_created = $this->input->post('gaji_date_created');
				$gajiId = $this->input->post('jabatan');
				$nomorHp = $this->input->post('nomor_hp');
				$gawali = $this->input->post('gawali');
				$trasi = $this->input->post('trasi');
				$mejar = $this->input->post('mejar');
				$piket = $this->input->post('piket');
				$prog = $this->input->post('prog');
				$jam = $this->input->post('jam_ngajar');
				$data = array(
					'karyawan_id' => $id,
					'gaji_karyawan_id' => $karyawan,
					'gaji_tanggal' => $gaji_tanggal,
					'gaji_bulan' => $gaji_bulan,
					// 'gaji_status' => $gaji_status,
					// 'gaji_date_created' => $gaji_date_created,
					'gawali' => $gawali,
					'trasi' => $trasi,
					'mejar' => $mejar,
					'piket' => $piket,
					'prog' => $prog,
					'jam_ngajar' => $jam,
					'gaji_jabatan_id' => $gajiId
				);
				$save = $this->GajiModel->update_gaji($id,$data);
				if ($save>0){
					$this->session->set_flashdata('alert', 'update_gaji');
					redirect('gaji');
				}
				else{
					redirect('gaji');
				}
			}
		}
	
		public function hapus($id){
			$hapus = $this->GajiModel->hapus_gaji($id);
			if ($hapus > 0){
				$this->session->set_flashdata('alert', 'hapus_gaji');
				redirect('gaji');
			}else{
				redirect('gaji');
			}
		}

		public function ajaxIndex(){
			echo json_encode($this->GajiModel->lihat_gaji());
		}

	}
