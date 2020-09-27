<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_site extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wp_model');
		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('pages/userpage');
	}

	public function registrasi()
	{

		
		$data['noForm'] = $this->Wp_model->noForm()->row();

		$this->load->view('pages/registernwp', $data);
		$this->load->view('template/auth_footer');
	}

	public function new_wajibpajak()
	{
		if ($this->input->post('submit')) {

			$a = $this->input->post('no_formulir');
			$b = $this->input->post('email');
			$c = md5($this->input->post('password'));
			$d = $this->input->post('nama_instansi');
			$e = $this->input->post('alamat_instansi');
			$f = $this->input->post('kodepos_instansi');
			$g = $this->input->post('notelp_instansi');
			$h = $this->input->post('no_suratizin_instansi');
			$i = $this->input->post('bidang_usaha');
			$j = $this->input->post('nama_pemilik');
			$k = $this->input->post('jabatan');
			$l = $this->input->post('alamat_pemilik');
			$m = $this->input->post('notelp_pemilik');
			$n = $this->input->post('kodepos_pemilik');
			$o = $this->input->post('npwpd');

			// echo $a." - ".$b." - ".$c." - ".$d." - ".$e." - ".$f." - ".$g." - ".$h." - ".$i." - ".$j." - ".$k." - ".$l." - ".$m." - ".$n." - ".$o;

			$this->db->query("INSERT INTO `wajib_pajak`(`no_formulir`, `email`, `password`, `nama_instansi`, `alamat_instansi`, `notelp_instansi`, `kodepos_instansi`, `no_suratizin_instansi`, `tgl`, `bidang_usaha`, `nama_pemilik`, `jabatan`, `alamat_pemilik`, `notelp_pemilik`, `kodepos_pemilik`, `npwpd`) VALUES ('$a','$b','$c','$d','$e','$g','$f','$h',NOW(),'$i','$j','$k','$l','$m','$n','$o')");
			redirect('Public_site/form_login','refresh');
		} else {
			redirect('Public_site','refresh');
		}
		
	}

	public function form_login()
	{

		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('template/auth_header');
			$this->load->view('pages/login_user');
			$this->load->view('template/auth_footer');
		}
		else
		{
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('wajib_pajak', ['email' => $email])->row_array();
		
		if ($user) 
		{
			# Berhasil
			if (md5($password) == $user['password']) 
			{
				$data = [
					'id_wp' => $user['id_wp'],
					'email' => $user['email'],
					'nama' => $user['nama_pemilik'],
					'role' => 'USER'
				];
				$this->session->set_userdata($data);
				redirect('Public_site/dashboard','refresh');
			} 
			else 
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login, password salah!</div>');
				redirect('Public_site/form_login');
			}
			
		} 
		else 
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login, silahkan cek kembali username dan password Anda!</div>');
			redirect('Public_site/form_login');
		}
		
		
	}

	public function lupapass()
	{
		$this->load->view('pages/lupa_password');
	}

	public function dashboard()
	{
		// tampilan halaman awal
		if (isset($_SESSION['role'])) {

			// $data['jumNotif'] = $this->Core_actormodel->countNotif()->row();
			// $data['notifAl'] = $this->Core_actormodel->notifAlert()->result_array();

			$this->load->view('template/user/user_header');
			$this->load->view('template/user/user_sidebar');
			$this->load->view('template/user/user_navbar');
			$this->load->view('pages/board_user');
			$this->load->view('template/user/user_footer');
		} else {
			redirect('Public_site/form_login','refresh');
		}
	}

	public function riwayat_sewa($id)
	{
		// tampilan riwayat sewa
		if (isset($_SESSION['role'])) {

			$data['data'] = $this->Wp_model->tampilRiwayat($id)->result_array();

			$this->load->view('template/user/user_header');
			$this->load->view('template/user/user_sidebar');
			$this->load->view('template/user/user_navbar');
			$this->load->view('pages/user_riwayat',$data);
			$this->load->view('template/user/user_footer');
		} else {
			redirect('Public_site/form_login','refresh');
		}
	}

	public function daftar_sewa()
	{

			$data['dataDS'] = $this->Wp_model->tampilDS()->result_array();

			$this->load->view('pages/daftar_sewa_public',$data);
	}

	public function konfirmasi_up($id)
	{
		$a = $this->input->post('bank');
		$b = $this->input->post('norek');


		date_default_timezone_set('Asia/Jakarta');
	    $time        = time();
	    $nama_gambar = $_FILES['images'] ['name']; // Nama images
	    $size        = $_FILES['images'] ['size'];// Size images
	    $error       = $_FILES['images'] ['error'];
	    $tipe_gambar  = $_FILES['images'] ['type']; //tipe images untuk filter
	    $folder      = "./bukti_bayar/"; //folder tujuan upload
	    $valid       = array('jpg','png','gif','jpeg'); //Format File yang di ijinkan Masuk ke server
	    $n = "BUKTI-".date('Y-m-d-his-').$nama_gambar;

		if(strlen($nama_gambar)){   
			// Perintah untuk mengecek format gambar
			list($txt, $ext) = explode(".", $nama_gambar);
			if(in_array($ext,$valid)){
				// Perintah untuk mengecek size file gambar
			  	if($size>0){   
			  		// Perintah untuk mengupload gambar dan memberi nama baru
			    	$gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
			    	$gmbr  = $folder.$gambarnya;
			    	$tmp = $_FILES['images']['tmp_name'];
			    	if(move_uploaded_file($tmp, $folder.$n)){   
			      		$this->db->query("UPDATE `pembayaran` SET `no_rek`=$b,`bank`='$a',`tanggal_bayar`=NOW(),`bukti_bayar`='$n' WHERE id_pembayaran = '$id'");
			      		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil!</strong> Konfirmasi pembayaran sedang di proses, silahkan tunggu....</div>');
			      		redirect('Public_site/riwayat_sewa/'.$_SESSION['id_wp']);
			    	}
			    	else
			    	{ 
			    	// Jika Gambar Gagal Di upload 
			    	}
			  	}
			  	else
			  	{ 
			  		// Jika Gambar melebihi size 
			  	}   
			}
			else
			{ 
				// Jika File Gambar Yang di Upload tidak sesuai eksistensi yang sudah di tetapkan
			}
		}  
		else{ 
			// Jika Gambar belum di pilih 
		}       
		print_r($_FILES['images']);
	}

	public function ubah_password()
	{
		// ubah pass
		$this->load->view('pages/user_gantipass');
	}

	public function logout()
	{
		// logout
		$this->session->unset_userdata('id_wp');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		redirect('Public_site');
	}

	public function logout_re()
	{
		// logout
		$this->session->unset_userdata('id_wp');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		redirect('Public_site/form_login');
	}


	public function dr_autoload()
	{
		if($this->input->post('jr'))
		{
			echo $this->Wp_model->fetch_dr($this->input->post('jr'));
		}
	}

	public function dr_autoload_kelas()
	{
		if($this->input->post('id_jr'))
		{
			echo $this->Wp_model->fetch_dr_kelas($this->input->post('id_jr'));
		}
	}

	public function dr_autoload_harga()
	{
		if($this->input->post('id_jr'))
		{
			echo $this->Wp_model->fetch_dr_harga($this->input->post('id_jr'));
		}
	}

	public function dr_autoload_lokasi()
	{
		if($this->input->post('id_jr'))
		{
			echo $this->Wp_model->fetch_dr_lokasi($this->input->post('id_jr'));
		}
	}

	public function dr_autoload_mpajak()
	{
		if($this->input->post('id_jr'))
		{
			echo $this->Wp_model->fetch_dr_mpajak($this->input->post('id_jr'));
		}
	}

	public function dr_autoload_uraian()
	{
		if($this->input->post('id_jr'))
		{
			echo $this->Wp_model->fetch_dr_uraian($this->input->post('id_jr'));
		}
	}

	public function sewa_reklame()
	{
		$a = $this->input->post('jenisreklame');
		$b = $this->input->post('id_daftar_sewa');
		$c = $this->input->post('kelas');
		$d = $this->input->post('harga');
		$e = $this->input->post('harga');
		$f = $this->input->post('lokasi');
		$g = $this->input->post('masa_pajak');
		$h = $this->input->post('uraian');
		$i = $this->input->post('panjang');
		$j = $this->input->post('lebar');
		$k = $this->input->post('pajak');
		$l = $this->input->post('total');
		$m = $_SESSION['id_wp'];
		$n = $this->input->post('judul');

		$spj1 = str_replace("Rp. ","",$k);
		$stl1 = str_replace("Rp. ","",$l);

		$spj = (INT)str_replace(".","",$spj1);
		$stl = (INT)str_replace(".","",$stl1);

		// echo $spj."-".$stl;

		$bulan = date('m');
		$tahun = date('Y');
		$ukuran = $i * $j;

		$hitung = $bulan + $g;
		if ($hitung > 12) {
			$bln = $hitung - 12;
			$thn = $tahun + 1;
			
		} else {
			$bln = $hitung;
			$thn = $tahun;
		}
		
		$selesai = $thn."-".$bln."-".date('d h:i:s');
		

		$this->db->query("INSERT INTO `sewa`(`id_wp`, `id_daftar_sewa`, `tanggal_selesai_sewa`, `judul`, `ukuran`, `total_bayar`, `tanggal_sewa`) VALUES ('$m','$b','$selesai','$n','$ukuran','$stl',NOW())");
		
		$user = $this->db->query("SELECT * FROM sewa WHERE id_wp = '$m' ORDER BY tanggal_sewa DESC LIMIT 1")->row_array();
		$id_sewa = $user['id_sewa'];

		$this->db->query("INSERT INTO `pembayaran`(`id_sewa`,`pajak`, `jumlah_bayar`) VALUES ('$id_sewa','$spj','$stl')");

		redirect('Public_site/dashboard','refresh');
		// echo $a." - ".$b." - ".$c." - ".$d." - ".$e." - ".$f." - ".$g." - ".$h." - ".$i." - ".$j." - ".$k." - ".$l." - ".$m." - ".$n;
	}

	function fetch()
	{
		$output = '';
		$data = $this->Wp_model->fetch_data($this->input->post('limit'), $this->input->post('start'));
		if($data->num_rows() > 0)
			{
			foreach($data->result() as $row)
			{
				if ($row->status == 'Yes') {
					$stts = 'Sudah Disewa';
					$bg_clr = '#e25151';
				} else {
					$stts = 'Belum Disewa';
					$bg_clr = '#19c171';
				}
				
				$output .= '
				<div class="post_data">
				 	<h3 class="text-danger">'.$row->jenis_reklame.'</h3>
				 	<p style="color: #34a8ce;"><strong>Jenis</strong> : '.$row->jenis_sewa.'&nbsp;&nbsp;&nbsp;<strong>Lokasi</strong> : '.$row->lokasi.' &nbsp;&nbsp;&nbsp; <strong>Kelas</strong> : '.$row->kelas.'&nbsp;&nbsp;&nbsp; <strong>Harga</strong> : Rp.'.number_format($row->harga,0,',','.').'.-&nbsp;&nbsp;&nbsp; <span style="background-color: '.$bg_clr.'; color: white; padding-left: 10px; padding-right: 10px;padding-top: 5px; padding-bottom: 5px; border-radius: 5px;">'.$stts.'</span></p>
				 	<p><strong>Uraian : </strong>'.$row->uraian.'</p>
				</div>
				';
			}
		}
		echo $output;
	}

}

/* End of file public.php */
/* Location: ./application/controllers/public.php */