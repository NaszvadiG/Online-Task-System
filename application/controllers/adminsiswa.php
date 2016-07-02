<?php if ( ! defined('BASEPATH')) exit('No direct script allowed') ;

/**
* Admin Controller
*/
class Adminsiswa extends CI_Controller
{
	function hapus_pesan($posisi, $id_pesan)
	{
		$this->cek_session();

		$query = $this->m_guru->delete('pesan', "id_pesan=$id_pesan");

		if (!$query) {
			$this->_pesan2('warning', 'Pesan gagal dihapus');
			redirect('adminsiswa/' . $posisi . '');
		}

		$this->_pesan2('success', 'Pesan berhasil dihapus');
		redirect('adminsiswa/' . $posisi . '');
	}

	function inbox()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'subject'	=> $this->m_siswa->GetTeman($id_akun)->result_array(), 
			'judul' => 'Manajemen Pesan Masuk',
			'sub_judul'	=> 'manajemen pesan masuk anda',
			'tipe'	=> 'Manajemen Pesan Masuk', 
			'pesan' => $this->m_siswa->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $ambil['id_akun'] . " ORDER BY status ASC")->result_array(),
			'jenis2'	=> 'inbox',
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/pesan', $data);
	}

	function outbox()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'subject'	=> $this->m_siswa->GetTeman($id_akun)->result_array(), 
			'judul' => 'Manajemen Pesan Keluar',
			'sub_judul'	=> 'manajemen pesan keluar anda',
			'tipe'	=> 'Manajemen Pesan Keluar', 
			'pesan' => $this->m_siswa->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.dari = " . $ambil['id_akun'] . " ORDER BY status ASC")->result_array(),
			'jenis2'	=> 'outbox',
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/pesan', $data);
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

		redirect('adminsiswa/inbox');
	}

	function kirimkonfirmasi()
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

		redirect('adminsiswa/setting/paket');
	}

	function baca_pesan($id_pesan)
	{
		$this->cek_session();

		$ambil = $this->ambil_user();

		$this->m_siswa->ubah_terbaca($id_pesan);

		$data = array(
			'judul' => 'Baca Pesan',
			'sub_judul'	=> 'baca pesan anda',
			'tipe'	=> 'Baca Pesan', 
			'pesan' => $this->m_siswa->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where id_pesan = '$id_pesan'")->row_array(),

			// dari => tujuan
			// id_akun => dari
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/baca_pesan', $data);
	}

	function _pesan2($jenis, $isi)
	{
		//$this->cek_session();

		if ($jenis == 'success') {
			$pesan2 = "
			<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					<i class='icon fa fa-thumbs-o-up fa-2x'></i> <span style='font-size: 20px;'> " . $isi ."</span>
			</div>
			";
		} elseif($jenis == 'warning') {
			$pesan2 = "
			<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					<i class='icon fa fa-warning fa-2x'></i> <span style='font-size: 20px;'> " . $isi ."</span>
				</div>
			";
		}
		
		$this->session->set_flashdata('pesan2', $pesan2);
	}

	function index()
	{
		$this->dashboard();
	}

	function cek_session()
	{
		$session = $this->session->userdata('login');
		
		if ( $session['jenis'] != 'siswa') {
			//header('location:' . site_url('web_con/index/3' ));

			$this->_pesan2('warning', 'Anda harus login dahulu');
			redirect('web_con');
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
		
		redirect('web_con');
	}

	function ambil_user()
	{
		$session = $this->cek_session();
		
		$ambil = $this->m_siswa->GetUser("where id_akun = " . $session['id_akun'] . "")->row_array();

		return $ambil;
	}

	function _header($id_akun)
	{
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];
		$id_paket = $ambil['id_paket'];

		// cek batas akhir paket
		$cek_paket = $this->m_siswa->CekPaket("$id_akun");
		if ($cek_paket == 'habis') {
			$this->m_siswa->update('akun', array("id_paket"=>NULL, "batas_paket"=>NULL), "id_akun=$id_akun");
		}
		// cek batas akhir end

		$data = array(
			'nama'			=> $ambil['nama'],
			'foto'			=> $ambil['foto'],
			'jenis'			=> $ambil['jenis'],
			'jumlah_pesan'	=> $this->m_siswa->GetPesan("where id_akun = " . $id_akun . "")->num_rows(),
			'isi_pesan'		=> $this->m_siswa->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $id_akun . " ORDER BY waktu_pesan DESC")->result_array(),
			'kelas_diterima'	=> $this->m_siswa->GetKelasDiterima($id_akun)->num_rows(),
			'kelas_belum_diterima'	=> $this->m_siswa->GetKelasBelumDiterima($id_akun)->num_rows(),
			'kelas_ditolak'	=> $this->m_siswa->GetKelasDitolak($id_akun)->num_rows(),
			'soal_belum_dikerjakan'	=> $this->m_siswa->GetTugasBelumDikerjakan($id_akun)->num_rows(),
			'soal_dikerjakan'	=> $this->m_siswa->GetTugasSudahDikerjakan($id_akun)->num_rows(),
			'soal_terlewat'	=> $this->m_siswa->GetTugasTerlewat($id_akun)->num_rows(),
			'iklan'		=> $this->m_siswa->GetIklan("$id_paket"),
		);

		return $data;
	}

	function dashboard()
	{
		$this->cek_session();
		
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

/*		$tahun1 = $this->input->post('tahun1');
		$tahun2	= $this->input->post('tahun2');
		
		if (empty($tahun1) and empty($tahun2)) {
			$tahun1 = date("Y")-1;
			$tahun2 = date("Y");
		}

		if ($tahun1 == $tahun2) {
			$this->_pesan2('warning', "Tahun tidak boleh sama");
			redirect('adminsiswa/dashboard');	
		}
		
		$rata = $this->m_siswa->GetRata($id_akun)->row_array();
		$jumlah_soal = $this->m_siswa->GetNilai("where id_akun = $id_akun")->num_rows();*/
		$jumlah_soal = $this->m_siswa->GetJumlahSoal($id_akun);	

		$data = array(
			'judul' 		=> 'Dashboard',
			'sub_judul'		=> 'dashboard anda',
			'tipe'			=> 'Admin Siswa', 
			'jumlah_kelas' 	=> $this->m_siswa->GetKelasSiswa("where id_akun = " . $ambil['id_akun'] . "")->num_rows(),
			'jumlah_soal'	=> $jumlah_soal,
			//'rata_rata'		=> mb_substr($rata['rata'], 0, 4),
			//'hasil_rata_per_bulan2' => $this->m_siswa->GetRataBulan($id_akun, $tahun2)->result_array(),
			//'tahun2'		=> $tahun2,
			'gelar'			=> $this->m_siswa->GetGelar($jumlah_soal)->row_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/dashboard', $data);
	}

	function kode_kelas()
	{
		$random_string = random_string('numeric', 8);
		$array_kelas = $this->m_siswa->GetKelas()->result_array();
		foreach ($array_kelas as $isi) {
			if ($isi['kode_kelas'] != $random_string) {
				return $random_string;
			}else{
				$this->kode_kelas();
			}		
		}
	}

	function kelas()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Manajemen Kelas',
			'sub_judul'	=> 'manajemen kelas anda',
			'tipe'	=> 'Manajemen Kelas', 
			'kelas' => $this->m_siswa->GetKelasDiterima("$id_akun")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/kelas', $data);
	}

	function ikutkelas()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		
		$kode_kelas = $this->input->post('kode_kelas');

		$cek = $this->m_siswa->GetKelas("where kode_kelas = '$kode_kelas'")->row_array();

		if ($cek) {
			$this->_pesan2('success', "Sukses, menuggu konfirmasi dari guru");

			$data = array(
				'id_kelas' => $cek['id_kelas'],
				'id_akun'	=> $ambil['id_akun'],
				'status'	=> 'belum_diterima', 
			);

			$this->m_siswa->insert('kelas_siswa', $data);
		} else {
			$this->_pesan2('warning', "Gagal, kode kelas tidak ada");
		}

		redirect('adminsiswa/kelas');
	}

	function hapuskelas($id_kelas)
	{
		$this->cek_session();
		$this->m_siswa->Delete('kelas', array('id_kelas' => $id_kelas));

		$this->_pesan2('success', 'Kelas berhasil dihapus... ');

		redirect("adminsiswa/kelas");
	}

	function detailkelas($id_kelas)
	{
		$this->cek_session();

		$ambil = $this->ambil_user();

		$data = array(
			'judul'	=> 'Detail Kelas',
			'sub_judul'	=> 'lihat detail kelas di sini',
			'tipe'	=> 'Detail Kelas',
			'kelas'	=> $this->m_siswa->GetKelas("JOIN akun ON akun.id_akun = kelas.id_akun where id_kelas = " . $id_kelas . "")->row_array(),
		);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/detailkelas', $data);
	}

	function kelas_belum_diterima()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Kelas Belum Diterima',
			'sub_judul'	=> 'manajemen kelas anda',
			'tipe'	=> 'Kelas Belum Diterima', 
			'kelas' => $this->m_siswa->GetKelasBelumDiterima("$id_akun")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/kelas', $data);
	}

	function kelas_ditolak()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Kelas Belum Diterima',
			'sub_judul'	=> 'manajemen kelas anda',
			'tipe'	=> 'Kelas Belum Diterima', 
			'kelas' => $this->m_siswa->GetKelasDitolak("$id_akun")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/kelas', $data);
	}

	function tugas_terlewat()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$query = $this->m_siswa->GetTugasTerlewat($id_akun);

		$data = array(
			'judul' 	=> 'Tugas Terlewatkan',
			'sub_judul'	=> 'manajemen tugas terlewatkan',
			'tipe'		=> 'Tugas Terlewatkan', 
			'tugas' 	=> $query->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/tugas_terlewat', $data);
	}

	function tugas_sudah_dikerjakan()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' 	=> 'Tugas Sudah Dikerjakan',
			'sub_judul'	=> 'manajemen tugas sudah dikerjakan',
			'tipe'		=> 'Tugas Sudah Dikerjakan', 
			'tugas' 	=> $this->m_siswa->GetTugasSudahDikerjakan($id_akun)->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/tugas_sudah_dikerjakan', $data);
	}

	function tugas()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Tugas Belum Dikerjakan',
			'sub_judul'	=> 'manajemen tugas belum dikerjakan',
			'tipe'	=> 'Tugas Belum Dikerjakan', 
			'tugas' => $this->m_siswa->GetTugasBelumDikerjakan($id_akun)->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/tugas', $data);
	}

	function kerjakan_tugas($id_soal)
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$nama = $ambil['nama']; 

		$pil_ganda = $this->m_siswa->GetPilGanda("where id_soal = " . $id_soal . "");

		$jumlah_soal 	= $pil_ganda->num_rows();
		$jumlah_hal		= $jumlah_soal/10;
		
		if ($ambil['id_paket']) {
			$iklan = $this->m_siswa->GetPaket("where id_paket = " . $ambil['id_paket'] . "")->row_array();
		}else{
			$iklan = array('iklan' => "yes");
		}

		$data = array(
			'nama' 		=> $nama,
			'soal'		=> $this->m_siswa->GetSoal2("LEFT JOIN template ON template.id_template = soal.id_template where id_soal = " . $id_soal . "")->row_array(),
			'setting'	=> $this->m_siswa->GetSetting()->row_array(),
			'iklan'		=> $iklan,
			'pil_ganda'	=> $pil_ganda->result_array(),
		);

		$this->load->view('siswa/kerjakan',$data);
	}

	function jawab_tugas()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();

		$id_akun = $ambil['id_akun']; 
 		
 		// proses input jawaban ke pil_siswa
 		$data = array();

		foreach ($this->input->post('id_pil_ganda') as $isi) {
			$data2['id_akun'] = $id_akun;
			$data2['id_pil_ganda'] = $isi;
			$data2['jawaban'] = $this->input->post($isi);

			$data[] = $data2;
		}
		$query = $this->m_siswa->insert_jawaban($data);

		// proses penilaian tugas



		if ($query) {
			$this->_pesan2('success', 'Soal sudah dikerjakan');
		} else {
			$this->_pesan2('warning', 'Soal gagal dikerjakan');
		}
		
		redirect('adminsiswa/tugas');

	}

	function nilai()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' 	=> 'Halaman Nilai',
			'sub_judul'	=> 'halaman nilai area',
			'tipe'		=> 'Halaman Nilai',
			'nilai'		=> $this->m_siswa->GetNilai($id_akun)->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/nilai', $data);

	}

	function lihat_nilai($id_soal, $id_akun)
	{
		$this->cek_session();
		$ambil = $this->ambil_user();


	}

	function setting($tab = 'biodata')
	{
		$this->cek_session();
		$ambil = $this->ambil_user();

		$data = array(
			'judul' 	=> 'Halaman Setting',
			'sub_judul'	=> 'halaman setting area',
			'tipe'		=> 'Halaman Setting',
			'biodata'	=> $this->m_siswa->GetUser("where id_akun = " . $ambil['id_akun'] . "")->row_array(),
			'paket'		=> $this->m_siswa->GetPaket('left join akun on akun.id_paket = paket.id_paket where id_akun = ' . $ambil['id_akun'] . '')->row_array(),
			'paketall'	=> $this->m_siswa->GetPaket("where tipe_paket = 'siswa'")->result_array(),
			'tab'		=> $tab,
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('siswa/setting', $data);
	}

	function insertbiodata()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();

		$foto = array(
			'upload_path' => './assets/image/siswa',
			'file_name'	=> $this->input->post('username'), 
			'allowed_types'	=> '*',
			'overwrite'	=> TRUE,
		);

		$this->load->library('upload', $foto);

		// pengecekan hasil upload
		if ($this->upload->do_upload('foto')) {
			$nama_gambar = $this->upload->data('file_name');

			$data = array(
				'username' => $this->input->post('username'), 
				'nama' => $this->input->post('nama'), 
				'jenis_kelamin'	=> $this->input->post('jenis_kelamin'), 
				'alamat' => $this->input->post('alamat'), 
				'no_hp' => $this->input->post('no_hp'), 
				'email' => $this->input->post('email'), 
				'foto' => $nama_gambar, 
			);

			// update akun siswa
			$query = $this->m_siswa->update('akun', $data, "id_akun = ".$ambil['id_akun']."");

			if ($query) {
				// menampilkan sukses
				$this->_pesan2('success', 'Biodata berhasil diupdate...');
			}else{
				$this->_pesan2('warning', 'Biodata gagal diupdate...');
			}
		}else{
			// gambar gagal di upload
			$this->_pesan2('warning', 'Gambar gagal diupload...');
		}	
		redirect('adminsiswa/setting/biodata');
	}

	function ajaxpaket()
	{
		$this->cek_session();
		$id_paket = $this->input->POST('id_paket');

		
		$isi[] = $this->m_siswa->GetPaket("where id_paket = '$id_paket'")->row_array();

		echo json_encode($isi);
	}

	function insertpaket()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();

		$id_akun = $ambil['id_akun'];
		$id_paket = $this->input->post('id_paket');



		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$batas_time = time() + 12441600;

		$mulai_paket = mdate($datestring, $time);
		$batas_paket = mdate($datestring, $batas_time);

		// penghitungan paket
		$harga_paket = $this->m_siswa->GetPaket("where id_paket = $id_paket")->row_array();
		$tahun = $this->input->post('tahun');
		$total = $harga_paket['harga_paket'] * $tahun;

		// pengecekan isi deposit dg total
		$deposit = $this->input->post('deposit');

		if ($deposit < $total) { // jika deposit kurang dari total

			// maka menampilkan pesan2 bahwa deposit kurang
			$this->_pesan2('warning', 'Deposit anda kurang, silahkan isi deposit... ');
		}else{

			// update paket dan pengurangan saldo deposit
			$pengurangan = $deposit - $total; // pengurangan deposit
			
			$this->m_siswa->Update('akun', array('id_paket' => $id_paket, 'mulai_paket' => $mulai_paket, 'batas_paket' => $batas_paket, 'deposit' => $pengurangan), array('id_akun' => $id_akun));

			// menampilkan pesan sukses
			$this->_pesan2('success', "Anda berhasil berlangganan " . $harga_paket['nama_paket'] ."");
		}
		redirect('adminsiswa/setting/paket');
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
			$isi = $this->m_siswa->GetUser("where id_akun = $id_akun")->row_array();
			if ($isi['password'] != $password_lama) {
				$this->_pesan2('warning', 'Password lama tidak cocok...');
			} else {

				$set = array(
					'username' 	=> $username,
					'password'	=> $password_baru,
				);

				$where = "id_akun = $id_akun";

				$this->m_siswa->update('akun', $set, $where);

				$this->_pesan2('success', 'Data berhasil diubah...');
			}
		}

		redirect('adminsiswa/setting/administrasi');
		
	}
}

 ?>