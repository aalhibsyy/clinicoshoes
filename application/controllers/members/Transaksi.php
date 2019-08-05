<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->library('Ion_auth');
        $this->load->model('Jasa_model', 'mod_jasa');
        $this->load->model('Transaksi_model', 'mod_transaksi');
        $this->load->model('Pelanggan_model', 'mod_pelanggan');
        ceklogin_members();
    }

    public function index()
    {
        $data['kode'] = $this->mod_transaksi->buat_kode();
        $data['jasa'] = $this->mod_jasa->tampil_jasa();
        $data['pelanggan'] = $this->mod_pelanggan->get_all();
        $this->template->load('template/backend/dashboard', 'members/transaksi/transaksi_form', $data);
    }
    function get_barang()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $kobar = $this->input->post('kode_brg');
            $x['brg'] = $this->m_barang->get_barang($kobar);
            $this->load->view('admin/v_detail_barang_jual', $x);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function add_to_cart()
    {
        $id_jasa = $this->input->post('id_jasa');
        $jasa = $this->mod_jasa->get_jasa($id_jasa);
        $i = $jasa->row_array();
        $data = array(
            'id'       => $i['id_jasa'],
            'name'     => $i['nama_jasa'],
            'price'    => $this->input->post('harga'),
            'qty'      => $this->input->post('qty'),
            'ket'     => $i['keterangan']
        );
        if (!empty($this->cart->total_items())) {
            foreach ($this->cart->contents() as $items) {
                $id = $items['id'];
                $qtylama = $items['qty'];
                $rowid = $items['rowid'];
                $id_jasa = $this->input->post('id_jenis');
                $qty = $this->input->post('qty');
                if ($id == $id_jasa) {
                    $up = array(
                        'rowid' => $rowid,
                        'qty' => $qtylama + $qty
                    );
                    $this->cart->update($up);
                } else {
                    $this->cart->insert($data);
                }
            }
        } else {
            $this->cart->insert($data);
        }
        redirect(site_url('members/transaksi'));
    }
    function remove()
    {
        $row_id = $this->uri->segment(4);
        $this->cart->update(array(
            'rowid'      => $row_id,
            'qty'     => 0
        ));
        redirect(site_url('members/transaksi'));
    }
    function simpan_transaksi()
    {
        $nofak = $this->input->post('id_transaksi');
        $id_pelanggan = $this->ion_auth->get_user_id();
        $id_staff = $this->input->post('id_barang');
        $total = $this->input->post('total');
        $jml_uang = $this->input->post('total');
        $kembalian = 0;
        if (!empty($total) && !empty($jml_uang)) {
            if ($jml_uang < $total) {
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Jumlah Uang yang anda masukan Kurang</div>');
                redirect(site_url('members/transaksi'));
            } else {
                $this->session->set_userdata('nofak', $nofak);
                $order_proses = $this->mod_transaksi->simpan_transaksi($nofak, $id_pelanggan, $id_staff, $total, $jml_uang, $kembalian);
                if ($order_proses) {
                    $this->cart->destroy();
                    echo $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Transaksi Berhasil Silahkan Cetak Faktur Transaksi!</strong>
                    <a class="btn btn-default" href="' . base_url() . 'members/transaksi"><span class="fa fa-backward"></span>Kembali</a>
                    <a class="btn btn-info" href="' . base_url() . 'members/transaksi/cetak_faktur" target="_blank"><span class="fa fa-print"></span>Cetak</a>
                </div>');
                    redirect(site_url('members/transaksi'));
                    //$this->load->view('admin/alert/alert_sukses');
                } else {
                    redirect(site_url('members/transaksi'));
                }
            }
        } else {
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</div>');
            redirect(site_url('members/transaksi'));
        }
    }

    function cetak_faktur()
    {
        $x['data'] = $this->mod_transaksi->cetak_faktur();
        $this->load->view('admin/laporan/v_faktur', $x);
        //$this->session->unset_userdata('nofak');
    }

    //======================= GET PELANGGAN===================================
    public function getpelanggan($id)
    {
        $pelanggan = $this->mod_pelanggan->get_by_id($id);
        if ($pelanggan) {
            echo ' <div class="row form-group">
            <div class="col col-md-3">
                <label class=" form-control-label text-right">Nama :</label>
            </div>
            <div class="col-12 col-md-8">
                <input type="text" class="form-control reset" name="nama_pelanggan" id="nama_pelanggan" readonly="readonly" value="' . $pelanggan->first_name . '">
            </div>
        </div>
     
        <div class="row form-group">
            <div class="col col-md-3">
                <label class=" form-control-label text-right">No Telepon :</label>
            </div>
            <div class="col-12 col-md-8">
                <input type="number" class="form-control reset" name="telepon" id="telepon" readonly="readonly" value="' . $pelanggan->phone . '">
            </div>
        </div>
        <input type="hidden" id="id_pelanggan" name="id_pelanggan" class="form-control input-sm" style="text-align:right;margin-bottom:5px;"value="' . $pelanggan->id . '>';
        } else {

            echo ' <div class="row form-group">
            <div class="col col-md-3">
                <label class=" form-control-label text-right">Nama :</label>
            </div>
            <div class="col-12 col-md-8">
                <input type="text" class="form-control reset" name="nama_pelanggan" id="nama_pelanggan" readonly="readonly">
            </div>
        </div>
    
        <div class="row form-group">
            <div class="col col-md-3">
                <label class=" form-control-label text-right">No Telepon :</label>
            </div>
            <div class="col-12 col-md-8">
                <input type="number" class="form-control reset" name="telepon" id="telepon" readonly="readonly">
            </div>
        </div>
        <input type="hidden" id="id_pelanggan" name="id_pelanggan" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>';
        }
    }

    //======================= END GET PELANGGAN===============================

}
