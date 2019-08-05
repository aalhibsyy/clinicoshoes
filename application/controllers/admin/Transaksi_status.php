<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->library('Ion_auth');
        $this->load->model('Transaksi_status_model', 'mod_status');
        ceklogin();
    }


    public function index()
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi_status/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi_status/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi_status/index.html';
            $config['first_url'] = base_url() . 'transaksi_status/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->mod_status->total_rows($q);
        $status = $this->mod_status->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'status_data' => $status,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'flag' => 1
        );
        $this->template->load('template/backend/dashboard', 'admin/transaksi/transaksi_list', $data);
    }

    public function update($id)
    {
        $row = $this->mod_status->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_status/update_action'),
                'id_transaksi' => set_value('id_jasa', $row->id_transaksi),
                'nama' => set_value('nama', $row->first_name),
                'phone' => set_value('phone', $row->phone),
                'trans_status' => set_value('trans_status', $row->trans_status),
                'trans_nota' => set_value('trans_nota', $row->trans_nota),
            );
            $this->template->load('template/backend/dashboard', 'admin/transaksi/update_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_status'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
                'trans_status' => $this->input->post('up_status', TRUE),
                'trans_nota' => $this->input->post('trans_nota', TRUE),
            );

            $this->mod_status->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Data Success');
            redirect(site_url('transaksi_status'));
        }
    }

    public function delete($id)
    {
        $row = $this->mod_status->get_by_id($id);

        if ($row) {
            $this->mod_status->delete($id);
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect(site_url('jasa'));
        } else {
            $this->session->set_flashdata('message', 'Data Not Found');
            redirect(site_url('jasa'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
