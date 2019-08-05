<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jasa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->library('Ion_auth');
        $this->load->model('Jasa_model', 'mod_jasa');
        ceklogin();
    }


    public function index()
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jasa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jasa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jasa/index.html';
            $config['first_url'] = base_url() . 'jasa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->mod_jasa->total_rows($q);
        $jasa = $this->mod_jasa->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jasa_data' => $jasa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/backend/dashboard', 'admin/jasa/jasa_list', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jasa/create_action'),
            'id_jasa' => set_value('id_jasa'),
            'nama_jasa' => set_value('nama_jasa'),
            'harga' => set_value('harga'),
            'keterangan' => set_value('keterangan'),
        );
        $this->template->load('template/backend/dashboard', 'admin/jasa/jasa_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_jasa' => $this->input->post('nama_jasa', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->mod_jasa->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Menambahkan Data!');
            redirect(site_url('jasa'));
        }
    }

    public function update($id)
    {
        $row = $this->mod_jasa->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jasa/update_action'),
                'id_jasa' => set_value('id_jasa', $row->id_jasa),
                'nama_jasa' => set_value('nama_jasa', $row->nama_jasa),
                'harga' => set_value('nama_jasa', $row->harga),
                'harga' => set_value('nama_jasa', $row->harga),
                'keterangan' => set_value('nama_jasa', $row->keterangan),
            );
            $this->template->load('template/backend/dashboard', 'admin/jasa/jasa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jasa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jasa', TRUE));
        } else {
            $data = array(
                'nama_jasa' => $this->input->post('nama_jasa', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->mod_jasa->update($this->input->post('id_jasa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Data Success');
            redirect(site_url('jasa'));
        }
    }

    public function delete($id)
    {
        $row = $this->mod_jasa->get_by_id($id);

        if ($row) {
            $this->mod_jasa->delete($id);
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect(site_url('jasa'));
        } else {
            $this->session->set_flashdata('message', 'Data Not Found');
            redirect(site_url('jasa'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jasa', 'nama jasa', 'trim|required');

        $this->form_validation->set_rules('id_jasa', 'id_jasa', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
