<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->library('Ion_auth');
        $this->load->model('Transaksi_model', 'mod_transaksi');
        $this->load->model('m_laporan');
        ceklogin_staff();
    }

    function index()
    {
        $data['trans_bln'] = $this->mod_transaksi->get_bulan_trans();
        $data['trans_thn'] = $this->mod_transaksi->get_tahun_trans();
        $this->template->load('template/backend/dashboard', 'staff/v_laporan', $data);
    }

    function lap_order()
    {
        $bulan = $this->input->post('bln');
        $x['jml'] = $this->m_laporan->get_total_trans_perbulan($bulan);
        $x['data'] = $this->m_laporan->get_trans_perbulan($bulan);
        $this->load->view('admin/laporan/v_lap_order', $x);
    }

    function lap_data_pelanggan()
    {
        $x['data'] = $this->m_laporan->get_data_pelanggan();
        $this->load->view('admin/laporan/v_lap_pelanggan', $x);
    }

    function lap_data_transaksi()
    {
        $x['data'] = $this->m_laporan->get_data_transaksi();
        $x['jml'] = $this->m_laporan->get_total_transaksi();
        $this->load->view('admin/laporan/v_lap_transaksi', $x);
    }
    function lap_transaksi_pertanggal()
    {
        $tanggal = $this->input->post('tgl');
        $x['jml'] = $this->m_laporan->get_data_total_trans_pertanggal($tanggal);
        $x['data'] = $this->m_laporan->get_data_trans_pertanggal($tanggal);
        $this->load->view('admin/laporan/v_lap_transaksi_pertanggal', $x);
    }
    function lap_transaksi_perbulan()
    {
        $bulan = $this->input->post('bln');
        $x['jml'] = $this->m_laporan->get_total_trans_perbulan($bulan);
        $x['data'] = $this->m_laporan->get_trans_perbulan($bulan);
        $this->load->view('admin/laporan/v_lap_transaksi_perbulan', $x);
    }
    function lap_transaksi_pertahun()
    {
        $tahun = $this->input->post('thn');
        $x['jml'] = $this->m_laporan->get_total_trans_pertahun($tahun);
        $x['data'] = $this->m_laporan->get_trans_pertahun($tahun);
        $this->load->view('admin/laporan/v_lap_transaksi_pertahun', $x);
    }
    function lap_laba_rugi()
    {
        $bulan = $this->input->post('bln');
        $x['jml'] = $this->m_laporan->get_total_lap_laba_rugi($bulan);
        $x['data'] = $this->m_laporan->get_lap_laba_rugi($bulan);
        $this->load->view('admin/laporan/v_lap_laba_rugi', $x);
    }
}
