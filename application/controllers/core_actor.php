<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_actor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Core_actormodel');
	}

	public function index()
	{
		// tampilan halaman awal
		if (isset($_SESSION['role'])) {

			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$data['jumDataWP'] = $this->Core_actormodel->countPw()->row();
			$data['jumDataDSR'] = $this->Core_actormodel->countDsr()->row();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/home', $data);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}
		
	}

	public function dsewa()
	{
		// tampilan daftar sewa
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$data['data'] = $this->Core_actormodel->tampilDS()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/daftarsewa', $data);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}
	}

	public function tambah_dsewa()
	{
		// Tampilan form
		if (isset($_SESSION['role'])) {

			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/tambahdaftarsewa', $data);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}
	}

	public function insert_dsewa()
	{
		// proses insert ke database
		if ($this->input->post('submit')) {
			$a = $this->input->post('kelas');
			$b = $this->input->post('uraian');
			$c = $this->input->post('lokasi');
			$d = $this->input->post('jenis_reklame');
			$e = $this->input->post('harga');
			$f = $this->input->post('masa_pajak');
			$g = $this->input->post('jenis_sewa');


			if ($this->input->post('kelas') == false) {
				$a = "-";
			} else {
				$a = $this->input->post('kelas');
			}

			if ($this->input->post('uraian') == false) {
				$b = "-";
			} else {
				$b = $this->input->post('uraian');
			}

			if ($this->input->post('lokasi') == false) {
				$c = "-";
			} else {
				$c = $this->input->post('lokasi');
			}
			$databaru = array(
				'kelas' => $a,
				'uraian' => $b,
				'lokasi' => $c,
				'jenis_reklame' => $d,
				'harga' => $e,
				'masa_pajak' => $f,
				'jenis_sewa' => $g
			);

			$this->db->insert('daftar_sewa_reklame', $databaru);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data '.$d.' berhasil ditambah.</div>');
			redirect('Core_actor/dsewa','refresh');

		} else {

			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Gagal!</strong> Data '.$d.' gagal ditambahkan!!</div>');

			redirect('Core_actor/tambah_dsewa');
		}

	}

	public function editds($id)
	{
		// form edit
		$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
		$data['editdata'] = $this->db->get_where('daftar_sewa_reklame', ['id_daftar_sewa' => $id])->row();

		$this->load->view('template/admin/admin_header');
		$this->load->view('template/admin/admin_sidebar');
		$this->load->view('template/admin/admin_navbar', $data);
		$this->load->view('pages/edit_daftarsewa', $data);
		$this->load->view('template/admin/admin_footer');
	}

	public function update($id = null)
	{
		// update sewa reklame
		$a = $this->input->post('kelas');
		$b = $this->input->post('uraian');
		$c = $this->input->post('lokasi');
		$d = $this->input->post('jenis_reklame');
		$e = $this->input->post('harga');
		$f = $this->input->post('masa_pajak');
		$g = $this->input->post('jenis_sewa');

		$dataedit = array(
			'kelas' => $a,
			'uraian' => $b,
			'lokasi' => $c,
			'jenis_reklame' => $d,
			'harga' => $e,
			'masa_pajak' => $f,
			'jenis_sewa' => $g
		);

		$this->db->where('id_daftar_sewa', $id);
		$this->db->update('daftar_sewa_reklame', $dataedit);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data '.$d.' berhasil diupdate.</div>');

		redirect('Core_actor/dsewa','refresh');
	}

	public function hapusDS($id = null)
	{
		// hapus data sewa reklame
		$dsr = $this->db->get_where('daftar_sewa_reklame', ['id_daftar_sewa' => $id])->row_array();
		if ($this->Core_actormodel->deleteDS($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data '.$dsr['id_daftar_sewa'].' - '.$dsr['jenis_reklame'].' berhasil dihapus.</div>');
			redirect('Core_actor/dsewa');
					
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Gagal!</strong> Data '.$id.' gagal dihapus!!</div>');
			redirect('Core_actor/dsewa');
		}
		
	}

	public function dwajibpajak()
	{
		// tampilan daftar wajib pajak
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$data['data'] = $this->Core_actormodel->tampilWP()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/daftarwp', $data);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}
	}

	public function hapusWP($id = null)
	{
		// hapus data wajib pajak
		$wp = $this->db->get_where('wajib_pajak', ['id_wp' => $id])->row_array();
		if ($this->Core_actormodel->deleteWP($id)) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data '.$wp['no_formulir'].' berhasil dihapus.</div>');
			redirect('Core_actor/dwajibpajak');
					
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Gagal!</strong> Data '.$wp['no_formulir'].' gagal dihapus!!</div>');
			redirect('Core_actor/dwajibpajak');
		}
		
	}

	public function sewaReklame()
	{
		// tampilan sewa reklame
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$data['data'] = $this->Core_actormodel->tampilSR()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/sewareklame', $data);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function setujui($id)	
	{
		// Setujui pesanan

		$this->db->query("UPDATE `pembayaran` SET `status_verifikasi`= 'No' WHERE id_pembayaran = '$id'");

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data sudah disimpan untuk diproses, selanjutnya menunggu konfirmasi pembayaran.</div>');
		
		redirect('Core_actor/sewareklame','refresh');
	}

	public function tolak($id)	
	{
		// Tolak pesanan

		$this->db->query("UPDATE `pembayaran` SET `status_verifikasi`= 'Ditolak' WHERE id_pembayaran = '$id'");

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data sudah disimpan untuk diproses, selanjutnya menunggu konfirmasi pembayaran.</div>');
		
		redirect('Core_actor/sewareklame','refresh');
	}

	public function verifikasi($id)	
	{
		// verifikasi pembayaran
		$disv = $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa WHERE id_pembayaran = '$id'")->row_array();

		$id_dr = $disv['id_daftar_sewa'];

		$this->db->query("UPDATE `daftar_sewa_reklame` SET `status`= 'Yes' WHERE id_daftar_sewa = '$id_dr'");

		$this->db->query("UPDATE `pembayaran` SET `status_verifikasi`= 'Yes' WHERE id_pembayaran = '$id'");

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data berhasil di-Verifikasi.</div>');
		
		redirect('Core_actor/sewareklame','refresh');
	}

	public function disverifikasi($id)
	{
		// disverifikasi pembayaran
		$disv = $this->db->query("SELECT * FROM `pembayaran` p INNER JOIN sewa s ON p.id_sewa=s.id_sewa WHERE id_pembayaran = '$id'")->row_array();

		$id_dr = $disv['id_daftar_sewa'];

		$this->db->query("UPDATE `daftar_sewa_reklame` SET `status`= 'No' WHERE id_daftar_sewa = '$id_dr'");

		$this->db->query("UPDATE `pembayaran` SET `status_verifikasi`= 'No' WHERE id_pembayaran = '$id'");

		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data berhasil di Dis-Verifikasi.</div>');
		
		redirect('Core_actor/sewareklame','refresh');
	}

	public function lapPJkeseluruhan()
	{
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->lappjkeseluruhan()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_pjkeseluruhan', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapPJperiode()
	{
		$t1 = $this->input->post('tgl1');
		$t2 = $this->input->post('tgl2');

		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->lappjPeriode($t1, $t2)->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_pjperiode', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapPJwilayah()
	{
		$sq = $this->input->post('kelas');
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->lappjwilayah($sq)->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_pjwilayah', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapRJbelumdipakai()
	{
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->laprjbelumdipakai()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_rjbelumdipakai', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapRJdisewa()
	{
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->laprjdisewa()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_rjdisewa', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapRJkeseluruhan()
	{
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->laprjseluruh()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_rjkeseluruhan', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapRJwilayah()
	{
		$sq = $this->input->post('kelas');
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->laprjwilayah($sq)->result_array();	

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_rjwilayah',$datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapSKDP()
	{
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->lappjkeseluruhan()->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_skdp', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function lapWPpengguna()
	{
		// Laporan
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->tampilWP()->result_array();	

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/laporan_wppengguna',$datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function printRLwilayah($kelas = null)
	{
		
		$parkelas = str_replace("%20"," ", $kelas);
		$data['wilayah'] = $this->Core_actormodel->laprjwilayah($parkelas)->result_array();
		$this->load->view('laporan/laporanRJwilayah', $data);
	}

	public function printRLkeseluruhan()
	{
		
		$data['dataRJ'] = $this->Core_actormodel->laprjseluruh()->result_array();
		$this->load->view('laporan/laporanRJkeseluruhan', $data);
	}

	public function printRLdisewa()
	{
		
		$data['dataRJ'] = $this->Core_actormodel->laprjdisewa()->result_array();
		$this->load->view('laporan/laporanRJdisewa', $data);
	}

	public function printRLbelumdipakai()
	{
		
		$data['dataRJ'] = $this->Core_actormodel->laprjbelumdipakai()->result_array();
		$this->load->view('laporan/laporanRJbelumdipakai', $data);
	}

	public function printWPpengguna()
	{
		
		$data['dataRJ'] = $this->Core_actormodel->tampilWP()->result_array();
		$this->load->view('laporan/laporanWPpengguna', $data);
	}

	public function printPJwilayah($kelas = null)
	{
		
		$parkelas = str_replace("%20"," ", $kelas);
		$data['dataRJ'] = $this->Core_actormodel->lappjwilayah($parkelas)->result_array();
		$this->load->view('laporan/laporanPJwilayah', $data);
	}

	public function printPJperiode()
	{
		$t1 = $this->input->post('tgl1');
		$t2 = $this->input->post('tgl2');

		$datar['dataRJ'] = $this->Core_actormodel->lappjPeriode($t1, $t2)->result_array();
		$this->load->view('laporan/laporanPJperiode', $datar);
	}

	public function printPJkeseluruhan()
	{

		$data['dataRJ'] = $this->Core_actormodel->lappjkeseluruhan()->result_array();
		$this->load->view('laporan/laporanPJkeseluruhan', $data);
	}

	public function printSKDP()
	{

		$data['dataRJ'] = $this->Core_actormodel->lappjkeseluruhan()->result_array();
		$this->load->view('laporan/laporanSKDP', $data);
	}

	public function st_user()
	{
		$sq = $this->input->post('roles');
		// Tampilan daftar pengguna
		if (isset($_SESSION['role'])) {
			$data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			$data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();
			$datar['dataRJ'] = $this->Core_actormodel->s_users($sq)->result_array();

			$this->load->view('template/admin/admin_header');
			$this->load->view('template/admin/admin_sidebar');
			$this->load->view('template/admin/admin_navbar', $data);
			$this->load->view('pages/st_user', $datar);
			$this->load->view('template/admin/admin_footer');
		} else {
			redirect('auth','refresh');
		}

	}

	public function addAdmin()
	{
		// Tambah admin
		$a = $this->input->post('nip');
		$b = $this->input->post('nama');
		$c = $this->input->post('alamat');
		$d = $this->input->post('email');
		$e = $this->input->post('username');
		$f = $this->input->post('password');
		$password = md5($f);
		$this->db->query("INSERT INTO `admin`(`username`, `password`, `email`, `nama`, `nip`, `alamat`) VALUES ('$e','$password','$d','$b','$a','$c')");

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Admin baru telah ditambahkan...</div><hr/>');
		redirect('Core_actor/st_user','refresh');
	}

	public function hapusAdmin($id = null)
	{
		// hapus data admin
		$adm = $this->db->get_where('admin', ['id_admin' => $id])->row_array();
		if ($this->Core_actormodel->deleteAdm($id)) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Data '.$adm['nip'].' berhasil dihapus.</div>');
			redirect('Core_actor/st_user');
					
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Gagal!</strong> Data '.$adm['nip'].' gagal dihapus!!</div>');
			redirect('Core_actor/st_user');
		}
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */