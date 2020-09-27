<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_actormodel extends CI_Model {

	public function tampilDS()
	{
		// menampilkan seluruh data sewa reklame
		return $this->db->get('daftar_sewa_reklame');
	}

	public function deleteDS($id)
	{
		// menghapus data sewa reklame
		return $this->db->delete('daftar_sewa_reklame', array('id_daftar_sewa'=>$id));
	}

	public function countPw()
	{
		// menghitung total data wajib pajak
		return $this->db->query("SELECT count(*) as jumwp FROM `wajib_pajak`");
	}

	public function countDsr()
	{
		// menghitung total data sewa reklame
		return $this->db->query("SELECT count(*) as jumdsr FROM `daftar_sewa_reklame` WHERE lokasi != '-'");
	}

	public function tampilWP()
	{
		// menampilkan seluruh data swajib pajak
		return $this->db->get('wajib_pajak');
	}

	public function deleteWP($id)
	{
		// menghapus data sewa reklame
		return $this->db->delete('wajib_pajak', array('id_wp'=>$id));
	}

	public function tampilSR()
	{
		// menampilkan seluruh data sewa reklame
		return $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa INNER JOIN wajib_pajak wp ON s.id_wp=wp.id_wp INNER JOIN daftar_sewa_reklame dsr ON s.id_daftar_sewa=dsr.id_daftar_sewa");
	}

	public function countNotif()
	{
		// menghitung total data sewa reklame
		return $this->db->query("SELECT count(*) as jumnotif FROM `pembayaran` WHERE status_verifikasi = 'Proses'");
	}

	public function notifAlert()
	{
		// menampilkan seluruh data sewa reklame
		return $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa INNER JOIN wajib_pajak wp ON s.id_wp=wp.id_wp WHERE status_verifikasi = 'Proses'");
	}

	public function laprjwilayah($kelas)
	{
		// menampilkan laporan reklame jalan /wilayah
		return $this->db->query("SELECT * FROM `daftar_sewa_reklame` WHERE kelas = '$kelas'");
	}

	public function laprjseluruh()
	{
		// menampilkan laporan reklame jalan keseluruhan
		return $this->db->query("SELECT * FROM `daftar_sewa_reklame`");
	}

	public function laprjdisewa()
	{
		// menampilkan laporan reklame jalan disewa
		return $this->db->query("SELECT * FROM `daftar_sewa_reklame` WHERE status = 'Yes'");
	}

	public function laprjbelumdipakai()
	{
		// menampilkan laporan reklame jalan disewa
		return $this->db->query("SELECT * FROM `daftar_sewa_reklame` WHERE status = 'No'");
	}

	public function lappjwilayah($kelas)
	{
		// menampilkan laporan reklame jalan /wilayah
		return $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa INNER JOIN wajib_pajak wp ON s.id_wp=wp.id_wp INNER JOIN daftar_sewa_reklame dsr ON s.id_daftar_sewa=dsr.id_daftar_sewa WHERE kelas = '$kelas'");
	}

	public function lappjPeriode($t1, $t2)
	{
		// menampilkan laporan reklame jalan /wilayah
		return $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa INNER JOIN wajib_pajak wp ON s.id_wp=wp.id_wp INNER JOIN daftar_sewa_reklame dsr ON s.id_daftar_sewa=dsr.id_daftar_sewa WHERE tanggal_bayar >= '$t1' AND tanggal_bayar <= '$t2'");
	}

	public function lappjkeseluruhan()
	{
		// menampilkan laporan reklame jalan /wilayah
		return $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa INNER JOIN wajib_pajak wp ON s.id_wp=wp.id_wp INNER JOIN daftar_sewa_reklame dsr ON s.id_daftar_sewa=dsr.id_daftar_sewa");
	}

	public function s_users($roles)
	{
		// menampilkan management user

		if($roles == 'admin')
		{
			return $this->db->query("SELECT * FROM admin");
		}
		else
		{
			return $this->db->query("SELECT * FROM pimpinan");
		}
	}

	public function deleteAdm($id)
	{
		// menghapus data admin
		return $this->db->delete('admin', array('id_admin'=>$id));
	}

}

/* End of file core_actormodel.php */
/* Location: ./application/models/core_actormodel.php */