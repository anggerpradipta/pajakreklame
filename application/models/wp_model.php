<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp_model extends CI_Model {

	
	public function noForm()
	{
		// menampilkan laporan reklame jalan /wilayah
		return $this->db->query("SELECT no_formulir FROM `wajib_pajak` ORDER BY no_formulir DESC LIMIT 1");
	}

	function fetch_dr($jenis_reklame)
	{
		// $this->db->where('jenis_sewa', $jenis_reklame);
		// $this->db->order_by('jenis_reklame', 'ASC');
		$query = $this->db->query("SELECT * FROM daftar_sewa_reklame WHERE jenis_sewa = '$jenis_reklame' AND status = 'No'");
		$output = '<option value=""> ------ Pilih Reklame ------ </option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="'.$row->id_daftar_sewa.'">'.$row->jenis_reklame.' ['.$row->lokasi.']</option>';
		}
		return $output;
	}

	function fetch_dr_kelas($id_jr)
	{
		// $this->db->where('jenis_sewa', $jenis_reklame);
		// $this->db->order_by('jenis_reklame', 'ASC');
		$query = $this->db->query("SELECT * FROM daftar_sewa_reklame WHERE id_daftar_sewa = '$id_jr'");
		foreach ($query->result() as $row) {
			$output = $row->kelas;
		}
		return $output;
	}

	function fetch_dr_harga($id_jr)
	{
		// $this->db->where('jenis_sewa', $jenis_reklame);
		// $this->db->order_by('jenis_reklame', 'ASC');
		$query = $this->db->query("SELECT * FROM daftar_sewa_reklame WHERE id_daftar_sewa = '$id_jr'");
		foreach ($query->result() as $row) {
			$output = $row->harga;
		}
		return $output;
	}

	function fetch_dr_lokasi($id_jr)
	{
		// $this->db->where('jenis_sewa', $jenis_reklame);
		// $this->db->order_by('jenis_reklame', 'ASC');
		$query = $this->db->query("SELECT * FROM daftar_sewa_reklame WHERE id_daftar_sewa = '$id_jr'");
		foreach ($query->result() as $row) {
			$output = $row->lokasi;
		}
		return $output;
	}

	function fetch_dr_mpajak($id_jr)
	{
		// $this->db->where('jenis_sewa', $jenis_reklame);
		// $this->db->order_by('jenis_reklame', 'ASC');
		$query = $this->db->query("SELECT * FROM daftar_sewa_reklame WHERE id_daftar_sewa = '$id_jr'");
		foreach ($query->result() as $row) {
			$output = $row->masa_pajak;
		}
		return $output;
	}

	function fetch_dr_uraian($id_jr)
	{
		// $this->db->where('jenis_sewa', $jenis_reklame);
		// $this->db->order_by('jenis_reklame', 'ASC');
		$query = $this->db->query("SELECT * FROM daftar_sewa_reklame WHERE id_daftar_sewa = '$id_jr'");
		foreach ($query->result() as $row) {
			$output = $row->uraian;
		}
		return $output;
	}

	public function tampilRiwayat($id)
	{
		// menampilkan seluruh data sewa reklame
		return $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa INNER JOIN wajib_pajak wp ON s.id_wp=wp.id_wp INNER JOIN daftar_sewa_reklame dsr ON s.id_daftar_sewa=dsr.id_daftar_sewa WHERE s.id_wp = '$id'");
	}

	function fetch_data($limit, $start)
	{

		$this->db->select("*");
		$this->db->from("daftar_sewa_reklame");
		$this->db->order_by("id_daftar_sewa", "DESC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;
	}
	
	public function tampilDS()
	{
		// menampilkan seluruh data sewa reklame
		return $this->db->get('daftar_sewa_reklame');
	}

}

/* End of file wp_model.php */
/* Location: ./application/models/wp_model.php */