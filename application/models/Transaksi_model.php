<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->library('m_db');
    }

    function pelanggan_data($where = array(), $order = "id_transaksi ASC")
    {
        $d = $this->m_db->get_data($this->table, $where, $order);
        return $d;
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_transaksi', $q);
        /* $this->db->or_like('nama', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('telepon', $q);
        $this->db->or_like('alamat', $q);
        */
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
        /* $this->db->or_like('nama', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('telepon', $q);
        $this->db->or_like('alamat', $q);
        */
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function simpan_transaksi($nofak, $id_pelanggan, $id_staff, $total, $jml_uang, $kembalian)
    {
        $this->db->query("INSERT INTO transaksi (id_transaksi,id_pelanggan,id_staff,trans_total,trans_jml_uang,trans_kembalian,trans_status) VALUES ('$nofak','$id_pelanggan','$id_staff','$total','$jml_uang','$kembalian','Menunggu Konfirmasi')");
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_transaksi'        =>    $nofak,
                'd_trans_jasa_id'    =>    $item['id'],
                'd_trans_jasa_nama'    =>    $item['name'],
                'd_trans_qty'            =>    $item['qty'],
                'd_trans_harga'    =>    $item['price'],
                'd_trans_total'            =>    $item['subtotal']
            );
            $this->db->insert('detail_transaksi', $data);
        }
        return true;
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function cetak_faktur()
    {
        $nofak = $this->session->userdata('nofak');
        $hsl = $this->db->query("SELECT *, a.id_transaksi AS id_trans, DATE_FORMAT(trans_tanggal,'%d/%m/%Y %H:%i:%s') AS tanggal 
                                FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi 
                                JOIN users c ON c.id=a.id_staff
                                WHERE a.id_transaksi='$nofak'");
        return $hsl;
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(transaksi.id_transaksi,4) as kode', FALSE);
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "TS-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }
    //================ Dashboard =======================================================
    public function jumlahtransaksi()
    {
        return $this->db->get($this->table);
    }
    public function jumlahselesai()
    {
        $this->db->where('trans_status', 'Sudah Dikirim');
        return $this->db->get($this->table);
    }
    public function jumlahproses()
    {
        $this->db->where('trans_status', 'Menunggu Konfirmasi');
        return $this->db->get($this->table);
    }

    public function jumlah()
    {
        $this->db->where('id_staff', $this->ion_auth->get_user_id());
        return $this->db->get($this->table);
    }


    public function staff_jumlahtransaksi()
    {
        $this->db->where('id_staff', $this->ion_auth->get_user_id());
        return $this->db->get($this->table);
    }
    public function staff_jumlahselesai()
    {
        $this->db->where('id_staff', $this->ion_auth->get_user_id());
        $this->db->where('trans_status', 'Sudah Dikirim');
        return $this->db->get($this->table);
    }
    public function staff_jumlahproses()
    {
        $this->db->where('id_staff', $this->ion_auth->get_user_id());
        $this->db->where('trans_status', 'Menunggu Konfirmasi');
        return $this->db->get($this->table);
    }

    public function staff_jumlah()
    {
        $this->db->where('id_staff', $this->ion_auth->get_user_id());
        $this->db->group_by('id_pelanggan');
        return $this->db->get($this->table);
    }
    //================ END Dashboard =======================================================

    //================ Laporan =======================================================
    function get_staff_trans()
    {
        $hsl = $this->db->query("SELECT DISTINCT first_name, id FROM transaksi a JOIN users b ON a.id_staff=b.id");
        return $hsl;
    }
    function get_bulan_trans()
    {
        $hsl = $this->db->query("SELECT DISTINCT DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan FROM transaksi");
        return $hsl;
    }
    function get_tahun_trans()
    {
        $hsl = $this->db->query("SELECT DISTINCT YEAR(trans_tanggal) AS tahun FROM transaksi");
        return $hsl;
    }
    //================ END Laporan ===================================================

    //================ Rating ===================================================
    // insert data
    function in_rating($id_users, $testimoni, $rating)
    {
        $this->db->query("INSERT INTO rating (id_users,testimoni,rating) VALUES ('$id_users','$testimoni','$rating')");
    }
    //================ END Rating ===================================================
}
