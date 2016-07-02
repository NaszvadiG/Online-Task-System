<?php if ( ! defined('BASEPATH')) exit('No direct script allowed') ;

/**
* Admin Controller
*/
class Adminutama extends CI_Controller
{
	function hapus_pesan($posisi, $id_pesan)
	{
		$this->cek_session();

		$query = $this->m_admin->delete('pesan', "id_pesan=$id_pesan");

		if (!$query) {
			$this->_pesan2('warning', 'Pesan gagal dihapus');
			redirect('adminutama/' . $posisi . '');
		}

		$this->_pesan2('success', 'Pesan berhasil dihapus');
		redirect('adminutama/' . $posisi . '');
	}

	function inbox()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'subject'	=> $this->m_admin->GetTeman($id_akun)->result_array(), 
			'judul' => 'Manajemen Pesan Masuk',
			'sub_judul'	=> 'manajemen pesan masuk anda',
			'tipe'	=> 'Manajemen Pesan Masuk', 
			'pesan' => $this->m_admin->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $ambil['id_akun'] . " ORDER BY waktu_pesan DESC")->result_array(),
			'jenis2'	=> 'inbox',
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/pesan', $data);
	}

	function outbox()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'subject'	=> $this->m_admin->GetTeman($id_akun)->result_array(), 
			'judul' => 'Manajemen Pesan Keluar',
			'sub_judul'	=> 'manajemen pesan keluar anda',
			'tipe'	=> 'Manajemen Pesan Keluar', 
			'pesan' => $this->m_admin->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.dari = " . $ambil['id_akun'] . " ORDER BY status ASC")->result_array(),
			'jenis2'	=> 'outbox',
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/pesan', $data);
	}

	function baca_pesan($id_pesan)
	{
		$this->cek_session();

		$ambil = $this->ambil_user();

		$this->m_guru->ubah_terbaca($id_pesan);

		$data = array(
			'judul' => 'Baca Pesan',
			'sub_judul'	=> 'baca pesan anda',
			'tipe'	=> 'Baca Pesan', 
			'pesan' => $this->m_admin->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where id_pesan = '$id_pesan'")->row_array(),

			// dari => tujuan
			// id_akun => dari
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/baca_pesan', $data);
	}

	function thumbnail_template($gambar)
	{
		$this->cek_session();
		$config = array(
			'source_image' 	=> './assets/image/background/'.$gambar,
			'new_image'		=> './assets/image/background/thumbnail/'.$gambar,
			'maintain_ratio'	=> true,
			'width'			=> 280,
			'height'		=> 280,
		);
			$this->image_lib->initialize($config);

			if (!$this->image_lib->resize()) {
				$this->_pesan2('warning', $this->image_lib->display_errors());
			}

		
	}

	function ajaxpaket()
	{
		$this->cek_session();
		$id_paket = $this->input->POST('id_paket');

		
		$isi[] = $this->m_admin->GetPaket("where id_paket = '$id_paket'")->row_array();

		echo json_encode($isi);
	}

	function ajaxtemplate()
	{
		$this->cek_session();

		$id_template = $this->input->POST('id_template');

		
		$isi[] = $this->m_admin->GetTemplate("where id_template = '$id_template'")->row_array();

		echo json_encode($isi);
	}

	function update_insert_paket($jenis)
	{
		$this->cek_session();

		$id_paket 		= $this->input->POST('id_paket');
		$nama_paket 	= $this->input->POST('nama_paket');
		$harga_paket 	= $this->input->POST('harga_paket');
		$tipe_paket 	= $this->input->POST('tipe_paket');
		$template_soal 	= $this->input->POST('template_soal');

		// jumlah_kelas
		if ($this->input->POST('jumlah_kelas') != 'unlimited') {
			$jumlah_kelas = $this->input->POST('jumlah_kelas2');
		} else {
			$jumlah_kelas = $this->input->POST('jumlah_kelas');
		}

		// jumlah_siswa
		if ($this->input->POST('jumlah_siswa') != 'unlimited') {
			$jumlah_siswa = $this->input->POST('jumlah_siswa2');
		} else {
			$jumlah_siswa = $this->input->POST('jumlah_siswa');
		}

		// jumlah_soal
		if ($this->input->POST('jumlah_soal') != 'unlimited') {
			$jumlah_soal = $this->input->POST('jumlah_soal2');
		} else {
			$jumlah_soal = $this->input->POST('jumlah_soal');
		}

		$iklan = $this->input->POST('iklan');

		$set = array(
			'nama_paket' 	=> $nama_paket, 
			'harga_paket' 	=> $harga_paket, 
			'tipe_paket' 	=> $tipe_paket, 
			'template_soal' => $template_soal, 
			'jumlah_kelas' 	=> $jumlah_kelas, 
			'jumlah_siswa' 	=> $jumlah_siswa, 
			'jumlah_soal' 	=> $jumlah_soal, 
			'iklan'			=> $iklan,
		);


		// proses pemilihan apakah insert atau update
		if ($jenis == 'insert') { // proses insert
			$query = $this->m_admin->insert('paket', $set);

			// proses pemilihan pesan sukses		
			if ($query) {
				$this->_pesan2('success', 'Berhasil di insert...');
			} else {
				$this->_pesan2('warning', 'Gagal di insert...');
			}

		// proses update
		} else { 
			$query = $this->m_admin->update('paket', $set, "id_paket = $id_paket");

			// proses pemilihan pesan sukses		
			if ($query) {
				$this->_pesan2('success', 'Berhasil di update...');
			} else {
				$this->_pesan2('warning', 'Gagal di update...');
			}

		}

		redirect('adminutama/setting/paket');
	}

	function insert_template($jenis)
	{
		$this->cek_session();
		$this->load->library('image_lib');

		$nama_template 		= $this->input->POST('nama_template');
		$deskripsi		 	= $this->input->POST('deskripsi');
		$id_template 		= $this->m_admin->LastIdTemplate();

		$foto = array(
			'upload_path' => './assets/image/background',
			'file_name'	=> $id_template, 
			'allowed_types'	=> '*',
			'overwrite'	=> TRUE,
		);

		$this->load->library('upload', $foto);

		// pengecekan hasil upload
		if ($this->upload->do_upload('foto')) {

			$nama_gambar = base_url('assets/image/background/' . $this->upload->data('file_name') . '');
			$thumbnail = base_url('assets/image/background/thumbnail/' . $this->upload->data('file_name') . '');

			$data = array(
				'nama_template'	=> $nama_template,
				'deskripsi' => $deskripsi, 
				'isi' => $nama_gambar, 
				'thumbnail'	=> $thumbnail,
			);

			// insert kelas
			$query = $this->m_guru->insert('template', $data);

			if ($query) {
				// menampilkan sukses
				$this->_pesan2('success', 'Template berhasil ditambah...');
			}else{
				$this->_pesan2('warning', 'Template gagal ditambah...');
			}
		}else{
			// gambar gagal di upload
			$this->_pesan2('warning', 'Gambar gagal diupload...');
		}	

		$thumbnail = $this->thumbnail_template($this->upload->data('file_name'));

		redirect('adminutama/setting/template');
	}

	function _delete_template($id_template)
	{
		$this->cek_session();

		$query = $this->m_admin->delete_template($id_template)->row_array();
		
		if ($query) {
			$file_gambar = $query['isi'];
			$thumbnail = $query['thumbnail'];
			$file_gambar2 = substr($file_gambar, 29);
			$thumbnail2 = substr($thumbnail, 29);
			
			unlink(".$file_gambar2");
			unlink(".$thumbnail2");

			$this->_pesan2('success', 'Template berhasil dihapus');	
		}else{
			$this->_pesan2('warning', 'Template gagal dihapus');
		}

		redirect('adminutama/setting/template');
	}

	function update_template()
	{
		$this->cek_session();



		$id_template 	= $this->input->POST('id_template');
		$nama_template 	= $this->input->POST('nama_template');
		$deskripsi 		= $this->input->POST('deskripsi');

		if ($this->input->post('delete') == 'delete') {
			$this->_delete_template($id_template);
		}

		$foto = array(
			'upload_path' => './assets/image/background',
			'file_name'	=> $this->input->post('id_template'), 
			'allowed_types'	=> '*',
			'overwrite'	=> TRUE,
		);

		$this->load->library('upload', $foto);

	   
		// pengecekan hasil upload
		if (!$this->upload->do_upload('foto')) {
			
				$this->_pesan2('warning', "Foto gagal diupdate");
				redirect('adminutama/setting/template');
			
		}
	   

		$set = array(
			'nama_template' => $nama_template, 
			'deskripsi' 	=> $deskripsi, 
			'isi' 			=> base_url('assets/image/background/' . $this->upload->data('file_name') . ''),
			'thumbnail' 	=> base_url('assets/image/background/thumbnail/' . $this->upload->data('file_name') . ''),
		);

		$query = $this->m_admin->update('template', $set, "id_template = $id_template");

			// proses pemilihan pesan sukses		
		if ($query) {
			$this->_pesan2('success', 'Berhasil di update...');
		} else {
			$this->_pesan2('warning', 'Gagal di update...');
		}

		$thumbnail = $this->thumbnail_template($this->upload->data('file_name'));

		redirect('adminutama/setting/template');
	}

	function _pesan2($jenis, $isi)
	{
		//$this->cek_session();

		if ($jenis == 'success') {
			$pesan2 = "
			<div class='box-header'>
			<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					<i class='icon fa fa-thumbs-o-up fa-2x'></i> <span style='font-size: 20px;'> " . $isi ."</span>
				</div>
			</div>";
		} elseif($jenis == 'warning') {
			$pesan2 = "
			<div class='box-header'>
			<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					<i class='icon fa fa-warning fa-2x'></i> <span style='font-size: 20px;'> " . $isi ."</span>
				</div>
			</div>";
		}

		$this->session->set_flashdata('pesan2', $pesan2);
	}

	function inserttampilan($value='')
	{
		$this->cek_session();

		$cek = $this->m_admin->GetSetting()->num_rows();

		$data = array(
			'nama_web' 		=> $this->input->post('nama_web'),
			'warna_dasar' 	=> $this->input->post('warna_dasar'),
			'footer_credit' => $this->input->post('footer_credit'),
			'tentang' 		=> $this->input->post('tentang'),
			'ad_430_125'	=> $this->input->post('ad_430_125'),
			'ad_210_210'	=> $this->input->post('ad_210_210'),
		);

		if ($cek) {
			$this->m_admin->update('setting', $data);
		}else{
			$favicon = array(
				'upload_path' => './assets/image',
				'file_name'	=> 'favicon', 
				'allowed_types'	=> '*',
				'overwrite'	=> TRUE,
			);

			$this->load->library('upload', $favicon);

			// pengecekan hasil upload
			if ($this->upload->do_upload('favicon')) {
				$nama_gambar = $this->upload->data('file_name');

				$data2 = array(
					'favicon' => $nama_gambar, 
				);

				$data = array_merge($data, $data2);

				$query = $this->m_admin->insert('setting', $data); 
				if ($query) {
					// menampilkan sukses
					$pesan2 = "
					<div class='box-header'>
					<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
							<i class='icon fa fa-thumbs-o-up fa-2x'></i> <span style='font-size: 20px;'> Tampilan berhasil diubah... </span>
						</div>
					</div>";
					$this->session->set_flashdata('pesan2', $pesan2);
				}else{
					//form validation
				}
			}else{
				// gambar gagal di upload
				$pesan2 = "
				<div class='box-header'>
				<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='icon fa fa-warning fa-2x'></i> <span style='font-size: 20px;'> Gambar gagal diupload... </span>
					</div>
				</div>";
				$this->session->set_flashdata('pesan2', $pesan2);
			}			
		}

		redirect('adminutama/setting/tampilan');
	}

	function insertpaket()
	{
		$this->cek_session();

		$data = array(
			'nama_paket' => $this->input->post('nama_paket'), 
			'harga_paket' => $this->input->post('harga_paket'), 
			'jumlah_kelas' => $this->input->post('jumlah_kelas2'),
			'jumlah_siswa' => $this->input->post('jumlah_siswa2'),
			'jumlah_soal' => $this->input->post('jumlah_soal2'),
			'iklan' => $this->input->post('iklan'),
			'tipe_paket' => $this->input->post('tipe_paket'),
		);

		$query = $this->m_admin->insert('paket', $data);

		if ($query) {
			// menampilkan sukses
			$pesan2 = "
			<div class='box-header'>
			<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					<i class='icon fa fa-thumbs-o-up fa-2x'></i> <span style='font-size: 20px;'> Paket berhasil disimpan... </span>
				</div>
			</div>";
			$this->session->set_flashdata('pesan2', $pesan2);
		}

		redirect('adminutama/setting/paket');
	}

	function detailguru($id_akun)
	{
		$this->cek_session();
		$data = array(
			'judul'	=> 'Detail Biodata',
			'sub_judul'	=> 'lihat detail biodata di sini',
			'tipe'	=> 'Detail Biodata',
			'isi' => $this->m_admin->GetUser("where id_akun = " . $id_akun . "")->row_array(), 
			'kelas'	=> $this->m_admin->GetKelas("where id_akun = " . $id_akun . "")->result_array(),

		);

		$data2 = $this->_header($id_akun);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/detailguru', $data);
	}

	function hapuskelas($id_kelas, $id_akun)
	{
		$this->cek_session();
		$this->m_admin->Delete('kelas', array('id_kelas' => $id_kelas));

		$this->_pesan2('success', 'Kelas berhasil dihapus... ');
		
		redirect("adminutama/detailguru/$id_akun");
	}

	function detailsiswa($id_akun)
	{
		$this->cek_session();
		$data = array(
			'judul'	=> 'Detail Biodata',
			'sub_judul'	=> 'lihat detail biodata di sini',
			'tipe'	=> 'Detail Biodata',
			'isi' => $this->m_admin->GetUser("where id_akun = " . $id_akun . "")->row_array(), 
			'kelas'	=> $this->m_admin->GetKelasSiswa("LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas where kelas_siswa.id_akun = " . $id_akun . "")->result_array(),

		);

		$data2 = $this->_header($id_akun);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/detailsiswa', $data);
	}

	function hapusguru($id_akun='')
	{
		$this->cek_session();

		$this->m_admin->Delete('akun', array('id_akun' => $id_akun));

		redirect('adminutama/guru');
	}

	function hapussiswa($id_akun='')
	{
		$this->cek_session();

		$this->m_admin->Delete('akun', array('id_akun' => $id_akun));

		redirect('adminutama/siswa');
	}

	function activated($tipe)
	{
		$this->cek_session();
		$id_akun = $this->input->post('id_akun');
		$id_paket = $this->input->post('id_paket');

		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$batas_time = time() + 12441600;

		$mulai_paket = mdate($datestring, $time);
		$batas_paket = mdate($datestring, $batas_time);

		// penghitungan paket
		$harga_paket = $this->m_admin->GetPaket("where id_paket = $id_paket")->row_array();
		$tahun = $this->input->post('tahun');
		$total = $harga_paket['harga_paket'] * $tahun;

		// pengecekan isi deposit dg total
		$deposit = $this->m_admin->GetUser("where id_akun = $id_akun")->row_array();

		if ($deposit['deposit'] < $total) { // jika deposit kurang dari total

			// maka menampilkan pesan2 bahwa deposit kurang
			$this->_pesan2('warning', 'Kelas gagal ditambah...');

			if ($tipe == 'guru') {
				redirect('adminutama/guru');
			}else{
				redirect('adminutama/siswa');
			}
		}

		// update paket dan pengurangan saldo deposit
		$pengurangan = $deposit['deposit'] - $total; // pengurangan deposit
		
		$this->m_admin->Update('akun', array('id_paket' => $id_paket, 'mulai_paket' => $mulai_paket, 'batas_paket' => $batas_paket, 'deposit' => $pengurangan), array('id_akun' => $id_akun));

		// menampilkan pesan sukses
		$this->_pesan2('success', "Anda berhasil berlangganan " . $harga_paket['nama_paket'] ."");

		if ($tipe == 'guru') {
			redirect('adminutama/guru');
		}else{
			redirect('adminutama/siswa');
		}
		

/*		if ($value == 2) {
			redirect("adminutama/detail/$id_akun");
		}else{
			redirect('adminutama/guru');
		}*/
	}



	function cek_cookies()
	{
		$this->load->helper('cookie');

		$ambil = $this->m_admin->GetUser("where jenis = 'admin'")->result_array();
		if (get_cookie('login',true)) {

			foreach ($ambil as $key) {
				if (get_cookie('login[username]') == $key['username'] && get_cookie('login[password]') == $key['password']) {
					
					$array = array(
						'id_akun' => $key['id_akun'],
						'username'	=> $key['username'],
						'nama'	=> $key['nama'],
						'jenis'	=> $key['jenis'],
						'foto'	=> $key['foto'],
					);
					
					$this->session->set_userdata( 'login',$array );

					redirect('adminutama');
					//header('location:'.site_url('admin'));
				}
			}
		}
	}

	function buat_captcha()
	{
		$this->load->helper('captcha');

		$vals = array(
			'img_path' 	=> './assets/image/captcha/',
			'img_url'	=> base_url('assets/image/captcha/'),
			'img_width'	=> 200,
			'img_height'	=> 30,
			'border'	=> 0,
			'expiration'	=> 7200
			);

		$cap = create_captcha($vals);

		/* Pembuatan session capthcha untuk pengecekan di proses cek_captcha */
		$this->session->set_userdata('captcha_login', $cap['word']); 

		return $cap;
	}

	function cek_captcha($value='')
	{
		if ($value == $this->session->userdata('captcha_login')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function proseslogin()
	{
		if ($_POST) {
			$this->load->helper('cookie');

			$username 	= $this->input->post('username');
			$password 	= md5($this->input->post('password'));
			$captcha 	= $this->input->post('captcha');

			$cookie = $this->input->post('cookie');

			/* Buat Cookies */
			if ($cookie) {
				$this->input->set_cookie('login[username]', $username, 86400);
				$this->input->set_cookie('login[password]', $password, 86400);
			}

			$ambil = $this->m_admin->GetUser("where username = '$username' and password = '$password' and jenis = 'admin'")->row_array();

			if ($this->cek_captcha($captcha) == TRUE) {
				if ($ambil != NULL) {
					$array = array(
						'id_akun' => $ambil['id_akun'],
						'username'	=> $ambil['username'],
						'nama'	=> $ambil['nama'],
						'jenis'	=> $ambil['jenis'],
						'foto'	=> $ambil['foto'],
					);
					
					$this->session->set_userdata('login',$array );

					redirect('adminutama');					

				}else{
					/* Info Login Gagal */
					$this->_pesan2('warning', 'Password yang anda masukan salah');
					redirect('adminutama/mlebu');
				}

			}else{
				/* Capctha Salah */
				$this->_pesan2('warning', 'Masukkan Chaptcha dengan benar');
				redirect('adminutama/mlebu');
			}

		}else{
			echo "anda tidak dapat mengakses halaman ini";
		}
	}

	function mlebu()
	{
		$this->cek_cookies();

		$pesan = $this->session->flashdata('pesan');

		$cap = $this->buat_captcha();

		$data = array(
			'pesan' => "$pesan",
			'cap_image'	=> $cap['image'],
			'cap_text'	=> $cap['word'],
		);
					
		$this->load->view('admin/login', $data);
	}

	function index()
	{
		$this->dashboard();
	}

	function cek_session()
	{
		$session = $this->session->userdata('login');
		
		if ( $session['jenis'] != 'admin') {
			//header('location:' . site_url('web_con/index/3' ));

			$this->_pesan2('warning', 'Anda harus login dahulu');
			redirect('adminutama/mlebu');
		}

		return $session;
	}

	function logout()
	{
		$this->load->helper('cookie');

		delete_cookie('login[username]');
		delete_cookie('login[password]');

		$this->session->sess_destroy();


		$this->session->set_flashdata('pesan', "<script>alert('Anda berhasil logout');</script>");

		//$this->session->keep_flashdata('pesan');
		
		redirect('adminutama/mlebu');
		
	}

	function ambil_user()
	{
		$session = $this->cek_session();
		
		$ambil = $this->m_admin->GetUser("where id_akun = " . $session['id_akun'] . "")->row_array();

		return $ambil;
	}

	private function _header($id_akun)
	{
		$ambil = $this->ambil_user();

		$data = array(
			'nama'			=> $ambil['nama'],
			'foto'			=> $ambil['foto'],
			'jenis'			=> $ambil['jenis'],
			'tgl_gabung'	=> $ambil['tgl_gabung'],
			'jumlah_pesan'	=> $this->m_admin->GetPesan("where id_akun = " . $id_akun . "")->num_rows(),
			'isi_pesan'		=> $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $id_akun . " ORDER BY waktu_pesan DESC")->result_array(),
		);

		return $data;
	}

	function dashboard()
	{
		$this->cek_session();
		
		$ambil = $this->ambil_user();

		$data = array(
			'judul' 		=> 'Dashboard',
			'sub_judul'		=> 'dashboard anda',
			'tipe'			=> 'Admin Utama', 
			'jumlah_kelas' 	=> $this->m_admin->GetKelas("where id_akun = " . $ambil['id_akun'] . "")->num_rows(),
			'jumlah_siswa'	=> $this->m_admin->GetKelasSiswa("JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas WHERE kelas.id_akun = " . $ambil['id_akun'] . "")->num_rows(),
			'jumlah_soal'	=> $this->m_admin->GetSoal("where id_akun = " . $ambil['id_akun'] . "")->num_rows(),
			'browser'		=> $this->m_admin->GetCountBrowser()->result_array(),
			'os'			=> $this->m_admin->GetCountOs()->result_array(),
			'visitor'		=> $this->m_admin->GetCountVisitor()->result_array(),
			'member'		=> $this->m_admin->GetCountMember()->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/dashboard', $data);
	}

	function guru()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();

		$data = array(
			'judul' => 'Manajemen Guru',
			'sub_judul'	=> 'manajemen guru di sini',
			'tipe'	=> 'Manajemen Guru', 
			'guru' => $this->m_admin->GetUser("LEFT JOIN paket ON akun.id_paket = paket.id_paket where jenis = 'guru'")->result_array(),
			'paket'	=> $this->m_admin->GetPaket("where tipe_paket = 'guru'")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/guru', $data);
	}

	function siswa()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();

		$data = array(
			'judul' => 'Manajemen Siswa',
			'sub_judul'	=> 'manajemen siswa area',
			'tipe'	=> 'Manajemen Siswa', 
			'guru' => $this->m_admin->GetUser("LEFT JOIN paket ON akun.id_paket = paket.id_paket where jenis = 'siswa'")->result_array(),
			'paket'	=> $this->m_admin->GetPaket("where tipe_paket = 'siswa'")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/siswa', $data);
	}

	function kirimpesan()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();

		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();

		$data = array(
			'id_akun' 	=> $this->input->post('id_akun'),
			'judul_pesan'	=> $this->input->post('judul_pesan'),
			'pesan'		=> $this->input->post('pesan'),
			'dari'		=> $ambil['id_akun'],
			'waktu_pesan'	=> mdate($datestring, $time),
			'status'	=> 'belum_terbaca',
			);

		$this->m_admin->insert('pesan', $data);

		$this->_pesan2('success', 'Pesan telah terkirim');

		redirect('adminutama/inbox');
	}

	function setting($tab = 'tampilan')
	{
		$this->cek_session();
		$ambil = $this->ambil_user();

		$data = array(
			'judul' 	=> 'Halaman Setting',
			'sub_judul'	=> 'halaman setting area',
			'tipe'		=> 'Halaman Setting',
			'data2'		=> $this->m_admin->GetSetting()->row_array(), 
			'paket'		=> $this->m_admin->GetPaket()->result_array(),
			'template'	=> $this->m_admin->GetTemplate()->result_array(),
			'id_akun'	=> $ambil['id_akun'],
			'username'	=> $ambil['username'],
			'tab'		=> $tab,
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('admin/setting', $data);
	}

	function update_administrasi()
	{
		$this->cek_session();

		$id_akun 		= $this->input->post('id_akun');
		$username 		= $this->input->post('username');
		$password_baru 	= md5($this->input->post('password_baru'));
		$konf_password 	= md5($this->input->post('konf_password'));
		$password_lama 	= md5($this->input->post('password_lama'));

		if ($password_baru != $konf_password) {
			$this->_pesan2('warning', 'Konfirmasi password salah...');
		} else {
			$isi = $this->m_admin->GetUser("where id_akun = $id_akun")->row_array();
			if ($isi['password'] != $password_lama) {
				$this->_pesan2('warning', 'Password lama tidak cocok...');
			} else {

				$set = array(
					'username' 	=> $username,
					'password'	=> $password_baru,
				);

				$where = "id_akun = $id_akun";

				$this->m_admin->update('akun', $set, $where);

				$this->_pesan2('success', 'Data berhasil diubah...');
			}
		}

		redirect('adminutama/setting/administrasi');
		
	}

}

 ?>