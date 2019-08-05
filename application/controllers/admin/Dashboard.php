<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('Ion_auth', 'Form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->model('Ion_auth_model', 'm');
		$this->load->model('Jasa_model', 'mod_jasa');
		$this->load->model('Pelanggan_model', 'mod_pelanggan');
		$this->load->model('Transaksi_model', 'mod_transaksi');
		$this->load->model('Transaksi_status_model', 'mod_status');
	}

	public function index()
	{
		if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
			redirect('Auth/login', 'refresh');
		} elseif ($this->ion_auth->in_group('admin')) // remove this elseif if you want to enable this for non-admins
		{
			$data['id'] = $this->ion_auth->get_user_id();
			$data['akses'] = 1;
			$data['jumlah_users'] = $this->m->jumlah()->result();

			$data['jumlah_transaksi'] = $this->mod_transaksi->jumlahtransaksi()->result();
			$data['jumlah_selesai'] = $this->mod_transaksi->jumlahselesai()->result();
			$data['jumlah_proses'] = $this->mod_transaksi->jumlahproses()->result();
			$data['jumlah_pelanggan'] = $this->mod_pelanggan->jumlah()->result();
			$this->template->load('template/backend/dashboard', 'backend/dashboard', $data);
		} else if ($this->ion_auth->in_group('members')) {
			$data['akses'] = 2;
			$this->template->load('template/backend/dashboard', 'backend/dashboard', $data);
		} else if ($this->ion_auth->in_group('staff')) {
			$data['staff_jumlah_transaksi'] = $this->mod_transaksi->staff_jumlahtransaksi()->result();
			$data['staff_jumlah_selesai'] = $this->mod_transaksi->staff_jumlahselesai()->result();
			$data['staff_jumlah_proses'] = $this->mod_transaksi->staff_jumlahproses()->result();
			$data['staff_jumlah_pelanggan'] = $this->mod_transaksi->staff_jumlah()->result();
			$data['akses'] = 3;
			$this->template->load('template/backend/dashboard', 'backend/dashboard', $data);
		} else {
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
	}
}
