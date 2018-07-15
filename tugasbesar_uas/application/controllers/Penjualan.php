<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * CLASS NAME : Penjualan
 * ------------------------------------------------------------------------
 */

class Penjualan extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('ap_level') == 'inventory'){
			redirect();
		}
	}

	public function index()
	{
		$this->transaksi();
	}

	public function transaksi()
	{
		$level = $this->session->userdata('ap_level');
		if($level == 'admin' OR $level == 'kasir')
		{
			if($_POST)
			{
				 if( ! empty($_POST['kode_barang']))
				 {
				 	$total = 0;
				 	foreach ($_POST['kode_barang'] as $k)
				 	{
				 		if( ! empty($k)){$total++; }
				 	}

				 	if($total > 0)
				 	{
				 		$this->load->library('form_validation');
				 		$this->form_validation->set_rules('nomor_nota', 'Nomor Nota', 'trim|required|max_length[40]|alpha_numeric|callback_cek_nota[nomor_nota]');
				 		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

				 		$no++;
				 	}

				 	$this->form_validation->set_rules('cash', 'Total Bayar', 'trim|numeric|required|max_length[17]');
				 	$this->form_validation->set_rules('catatan', 'Catatan', 'trim|max_length[1000]');
				 	$this->form_validation->set_message('required', '%s Harus di isi !!');
				 	$this->form_validation->set_message('cek_kode_barang', '%s Tidak ditemukan !!');
				 	$this->form_validation->set_message('cek_nota', '%s Sudah ada !!');
				 	$this->form_validation->set_message('cek_nol', '%s Tidak boleh nol !!');
				 	$this->form_validation->set_message('alpha_numeric', '%s Harus huruf / angka !!');

				 	if ($this->form_validation->run() == TRUE) 
				 	{
				 		$nomor_nota		= $this->input->post('nomor_nota');
				 		$tanggal		= $this->input->post('tanggal');
				 		$id_kasir		= $this->input->post('id_kasir');
				 		$id_pelanggan	= $this->input->post('id_pelanggan');
				 		$bayar			= $this->input->post('cash');
				 		$grand_total	= $this->input->post('grand_total');
				 		$catatan 		= $this->clean_tag_input($this->input->post('catatan'));

				 		if($bayar < $grand_total)
			 			{
			 				$this->querry_error("Cash Kurang");
			 			}
			 			else
			 			{
			 				$this->load->model('m_penjualan_master');
			 				$master = $this->m_penjualan_master->insert_master($nomor_nota, $tanggal, $id_kasir, $id_pelanggan, $bayar, $grand_total, $catatan);
			 				if($master)
			 				{
			 					$id_master	= $this->m_penjualan_master->get_id($nomor_nota)->row()->id_penjualan_m;
			 					$inserted 	= 0;

			 					$this->load->model('m_penjualan_detail');
			 				}
			 			}
				 	} else {
				 		# code...
				 	})

				}
			}
		}
	}
}