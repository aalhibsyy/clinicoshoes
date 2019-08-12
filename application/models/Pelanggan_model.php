<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->library('m_db');
    }

    function pelanggan_data($where = array(), $order = "nama ASC")
    {
        $d = $this->m_db->get_data($this->table, $where, $order);
        return $d;
    }
    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('users_groups a');
        $this->db->join('users b', 'a.user_id=b.id');
        $this->db->where('group_id', '3');
        return $this->db->get()->result();
        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result();
    }

    function get_staff_limit()
    {
        $hsl = $this->db->query(" SELECT * FROM
                    ( SELECT *, COUNT(*) AS jmltrans
                        FROM users a JOIN transaksi b ON a.id=b.id_staff 
                        WHERE DATE(trans_tanggal)=CURRENT_DATE 	GROUP BY id_staff
                    ) as innerTable
                WHERE jmltrans <= 5
                ");
        return $hsl->result();
    }

    function get_user()
    {
        $this->db->select('*');
        $this->db->from('users_groups a');
        $this->db->join('users b', 'a.user_id=b.id');
        $this->db->where('group_id', '2');
        return $this->db->get()->result();
    }

    // get data by id
    function user_get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('users_groups a');
        $this->db->join('users b', 'a.user_id=b.id');
        $this->db->where('group_id', '2');
        $this->db->where('b.id', $id);
        return $this->db->get()->row();
    }

    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('users_groups a');
        $this->db->join('users b', 'a.user_id=b.id');
        $this->db->where('group_id', '3');
        $this->db->where('b.id', $id);
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_pelanggan', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('telepon', $q);
        $this->db->or_like('alamat', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pelanggan', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('telepon', $q);
        $this->db->or_like('alamat', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(pelanggan.id_pelanggan,4) as kode', FALSE);
        $this->db->order_by('id_pelanggan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pelanggan');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "PL-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }

    public function jumlah()
    {
        return $this->db->get($this->table);
    }
}
