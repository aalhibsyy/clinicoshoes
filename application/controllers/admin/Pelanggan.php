<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->model('Pelanggan_model', 'mod_pelanggan');
        $this->load->library('Ion_auth');
        ceklogin();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pelanggan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelanggan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelanggan/index.html';
            $config['first_url'] = base_url() . 'pelanggan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->mod_pelanggan->total_rows($q);
        $pelanggan = $this->mod_pelanggan->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pelanggan_data' => $pelanggan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/backend/dashboard', 'admin/pelanggan/pelanggan_list', $data);
    }

    public function read($id)
    {
        $row = $this->mod_pelanggan->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pelanggan' => $row->id_pelanggan,
                'nama' => $row->nama,
                'jenis_kelamin' => $row->jenis_kelamin,
                'alamat' => $row->alamat,
                'telepon' => $row->telepon,
            );
            $this->template->load('template/backend/dashboard', 'admin/pelanggan/pelanggan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function create()
    {
        $id = $this->mod_pelanggan->buat_kode();
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelanggan/create_action'),
            'id_pelanggan' => set_value('id_pelanggan', $id),
            'nama' => set_value('nama'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'telepon' => set_value('telepon'),
            'alamat' => set_value('alamat'),
        );
        $this->template->load('template/backend/dashboard', 'admin/pelanggan/pelanggan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'telepon' => $this->input->post('telepon', TRUE),
            );

            $this->mod_pelanggan->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('pelanggan'));
        }
    }

    public function update($id)
    {
        $row = $this->mod_pelanggan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelanggan/update_action'),
                'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
                'nama' => set_value('nama', $row->nama),
                'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'alamat' => set_value('alamat', $row->alamat),
                'telepon' => set_value('telepon', $row->telepon),
            );
            $this->template->load('template/backend/dashboard', 'admin/pelanggan/pelanggan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelanggan', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'telepon' => $this->input->post('telepon', TRUE),
            );

            $this->mod_pelanggan->update($this->input->post('id_pelanggan', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Update Data');
            redirect(site_url('pelanggan'));
        }
    }

    public function delete($id)
    {
        $row = $this->mod_pelanggan->get_by_id($id);

        if ($row) {
            $this->mod_pelanggan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelanggan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('telepon', 'telepon', 'trim|required');

        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
