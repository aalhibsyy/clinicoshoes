<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_status_model extends CI_Model
{

    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public $order = 'ASC';
    private $tb_transaksi = 'transaksi';
    function __construct()
    {
        parent::__construct();
        $this->load->library('m_db');
    }

    function tampil_transaksi()
    {
        $hsl = $this->db->query("SELECT * FROM transaksi");
        return $hsl;
    }

    function get_transaksi($id_transaksi)
    {
        $hsl = $this->db->query("SELECT * FROM transaksi where id_transaksi ='$id_transaksi'");
        return $hsl;
    }

    function transaksi_data($where = array(), $orderK = "id_transaksi ASC")
    {
        $d = $this->m_db->get_data($this->tb_transaksi, $where, $orderK);
        return $d;
    }

    function transaksi_info($transaksiID, $output)
    {
        $s = array(
            'id_transaksi' => $transaksiID,
        );
        $item = $this->m_db->get_row($this->tb_transaksi, $s, $output);
        return $item;
    }



    function jumlah()
    {
        return $this->db->get('transaksi');
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
        $this->db->select('*, a.id_pelanggan id_pel');
        $this->db->from('transaksi a');
        $this->db->join('users b', 'a.id_pelanggan=b.id');
        $this->db->where($this->id, $id);
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('id_pelanggan', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('a.id_transaksi', $q);
        $this->db->or_like('b.id', $q);
        $this->db->limit($limit, $start);
        $this->db->from('transaksi a');
        $this->db->join('users b', 'a.id_pelanggan=b.id');
        return $this->db->get()->result();
    }

    // get data with limit and search
    function user_get_limit_data($limit, $start = 0, $q = NULL)
    {
        $id = $this->ion_auth->get_user_id();
        $this->db->from('transaksi a');
        $this->db->join('users b', 'a.id_pelanggan=b.id');
        $this->db->where('a.id_pelanggan', $id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }
    // get data with limit and search
    function staff_get_limit_data($limit, $start = 0, $q = NULL)
    {
        $id = $this->ion_auth->get_user_id();
        $this->db->from('transaksi a');
        $this->db->join('users b', 'a.id_pelanggan=b.id');
        $this->db->where('a.id_staff', $id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
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
}
