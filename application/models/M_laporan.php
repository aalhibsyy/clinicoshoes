<?php
class M_laporan extends CI_Model
{
	function get_data_pelanggan()
	{
		$hsl = $this->db->query("SELECT *,a.id AS idpel FROM users a JOIN users_groups b ON a.id=b.user_id
								WHERE group_id='2'");
		return $hsl;
	}
	function get_data_transaksi()
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi JOIN pelanggan c ON c.id_pelanggan=a.id_pelanggan ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function get_total_transaksi()
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal,sum(d_trans_total) as total FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function get_data_trans_pertanggal($tanggal)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi JOIN pelanggan c ON c.id_pelanggan=a.id_pelanggan  WHERE DATE(trans_tanggal)='$tanggal' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function get_data_total_trans_pertanggal($tanggal)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal,sum(d_trans_total) as total FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi  WHERE DATE(trans_tanggal)='$tanggal' ORDER BY a.id_transaksi DESC");
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
	function get_trans_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi JOIN pelanggan c ON c.id_pelanggan=a.id_pelanggan WHERE DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function get_total_trans_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal, DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan,sum(d_trans_total) as total FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi WHERE DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function get_trans_pertahun($tahun)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal, YEAR(trans_tanggal) AS tahun FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi JOIN pelanggan c ON c.id_pelanggan=a.id_pelanggan WHERE YEAR(trans_tanggal)='$tahun' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function get_total_trans_pertahun($tahun)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal, DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan,YEAR(trans_tanggal) AS tahun,sum(d_trans_total) as total FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi WHERE YEAR(trans_tanggal)='$tahun' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	//=========Laporan Laba rugi============
	function get_lap_laba_rugi($bulan)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi JOIN pelanggan c ON c.id_pelanggan=a.id_pelanggan WHERE DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function get_total_lap_laba_rugi($bulan)
	{
		$hsl = $this->db->query("SELECT DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan,d_trans_barang_nama,d_trans_barang_satuan,d_trans_barang_harpok,d_trans_barang_harjul,(d_trans_barang_harjul-d_trans_barang_harpok) AS keunt,d_trans_qty,d_trans_diskon,SUM(((d_trans_barang_harjul-d_trans_barang_harpok)*d_trans_qty)-(d_trans_qty*d_trans_diskon)) AS total FROM tbl_trans JOIN tbl_detail_trans ON trans_nofak=d_trans_nofak WHERE DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}

	//========================== ADMIN ============================================
	function admin_get_data_trans($bulan)
	{
		$id = $this->ion_auth->get_user_id();
		$hsl = $this->db->query("SELECT *, a.id_transaksi AS id_trans,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal, DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan
								FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi
								JOIN users c ON c.id=a.id_pelanggan
								WHERE DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan'
								GROUP BY a.id_transaksi,b.d_trans_jasa_nama");
		return $hsl;
	}

	function admin_get_data_trans_staff($id, $bulan)
	{
		$hsl = $this->db->query("SELECT *, a.id_transaksi AS id_trans,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal, DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan
								FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi
								JOIN users c ON c.id=a.id_pelanggan
								WHERE a.id_staff=$id AND DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan'
								GROUP BY a.id_transaksi,b.d_trans_jasa_nama");
		return $hsl;
	}

	//========================== END ADMIN ============================================



	//========================== STAFF ============================================
	function staff_get_trans_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal 
				FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi 
				JOIN users c ON c.id=a.id_pelanggan 
				WHERE DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function staff_get_total_trans_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal, 
		DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan,sum(d_trans_total) as total 
		FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi 
		WHERE DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan' ORDER BY a.id_transaksi DESC");
		return $hsl;
	}
	function staff_get_data_trans($bulan)
	{
		$id = $this->ion_auth->get_user_id();
		$hsl = $this->db->query("SELECT *, a.id_transaksi AS id_trans,DATE_FORMAT(trans_tanggal,'%d %M %Y') AS trans_tanggal, DATE_FORMAT(trans_tanggal,'%M %Y') AS bulan
								FROM transaksi a JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi
								JOIN users c ON c.id=a.id_pelanggan
								WHERE a.id_staff=$id AND DATE_FORMAT(trans_tanggal,'%M %Y')='$bulan'
								GROUP BY a.id_transaksi,b.d_trans_jasa_nama");
		return $hsl;
	}
	//========================== END STAFF ========================================
}
