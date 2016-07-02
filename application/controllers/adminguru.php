<?php if ( ! defined('BASEPATH')) exit('No direct script allowed') ;

/**
* Admin Controller
*/
class Adminguru extends CI_Controller
{
	function export_kelas()
	       {
	       		$this->cek_session();
	       		$ambil = $this->ambil_user();

	           //load librarynya terlebih dahulu
	           //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
	           $this->load->library("Excel/PHPExcel");
				$ambildata = $this->m_guru->GetKelas("where id_akun = " . $ambil['id_akun'] . "");
	           //membuat objek PHPExcel
	           $objPHPExcel = new PHPExcel();
				
	           $objPHPExcel->getProperties()
	                             ->setCreator("Anandia") //creator
	                               ->setTitle("Programmer");  //file title
	            
	                       $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
	                       $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
	            
	                       $objget->setTitle('Sample Sheet'); //sheet title
	                       //Warna header tabel
	                       $objget->getStyle("A1:C1")->applyFromArray(
	                           array(
	                               'fill' => array(
	                                   'type' => PHPExcel_Style_Fill::FILL_SOLID,
	                                   'color' => array('rgb' => '92d050')
	                               ),
	                               'font' => array(
	                                   'color' => array('rgb' => '000000')
	                               )
	                           )
	                       );

	           //table header
	                       $cols = array("A","B","C","D","E");
	                        
	                       $val = array("Kode Kelas","Nama Kelas","Deskripsi Kelas", "Jumlah Siswa", "Jumlah Soal");
	                        
	                       for ($a=0;$a<3; $a++) 
	                       {
	                           $objset->setCellValue($cols[$a].'1', $val[$a]);
	                            
	                           //Setting lebar cell
	                           $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
	                           $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // BENAR
	                           $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // SALAH
	                           $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // NILAI
	                           $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // NILAI
	                        
	                           $style = array(
	                               'alignment' => array(
	                                   'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	                               )
	                           );
	                           $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
	                       }



	           $baris  = 2;
	                       foreach ($ambildata as $frow){
	                            
	                          //pemanggilan sesuaikan dengan nama kolom tabel
	                           $objset->setCellValue("A".$baris, $frow->kode_kelas); //membaca data nama
	                           $objset->setCellValue("B".$baris, $frow->kelas); //membaca data benar
	                           $objset->setCellValue("C".$baris, $frow->deskripsi); //membaca data salah
	                           $objset->setCellValue("D".$baris, $frow->nilai); //membaca data nilai
	                           $objset->setCellValue("E".$baris, $frow->nilai); //membaca data nilai
	                            
	                           //Set number value
	                           $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
	                            
	                           $baris++;
	                       }
	                        
	                       $objPHPExcel->getActiveSheet()->setTitle('Data Export');
	
	           //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
	           $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$filename = "Data_Nilai_".date("Y-m-d H:i:s").".xlsx";

	           //sesuaikan headernya 
	           header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	           header("Cache-Control: no-store, no-cache, must-revalidate");
	           header("Cache-Control: post-check=0, pre-check=0", false);
	           header("Pragma: no-cache");
	           header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	           //ubah nama file saat diunduh
	           header('Content-Disposition: attachment;filename="'.$filename.'"');
	           //unduh file
	           $objWriter->save("php://output");
	
	           //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
	           // Folder Documentation dan Example
	           // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
	
	       }

	public function downloadExcel()
	        {
	            //load librarynya terlebih dahulu
	            //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
	            $this->load->library("Excel/PHPExcel");
	 			$ambildata = $this->m_guru->export_nilai();
	            //membuat objek PHPExcel
	            $objPHPExcel = new PHPExcel();
	 			
	            $objPHPExcel->getProperties()
	                              ->setCreator("Anandia") //creator
	                                ->setTitle("Programmer");  //file title
	             
	                        $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
	                        $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
	             
	                        $objget->setTitle('Sample Sheet'); //sheet title
	                        //Warna header tabel
	                        $objget->getStyle("A1:C1")->applyFromArray(
	                            array(
	                                'fill' => array(
	                                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
	                                    'color' => array('rgb' => '92d050')
	                                ),
	                                'font' => array(
	                                    'color' => array('rgb' => '000000')
	                                )
	                            )
	                        );

	            //table header
	                        $cols = array("A","B","C","D");
	                         
	                        $val = array("Nama","Benar","Salah", "Nilai");
	                         
	                        for ($a=0;$a<3; $a++) 
	                        {
	                            $objset->setCellValue($cols[$a].'1', $val[$a]);
	                             
	                            //Setting lebar cell
	                            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
	                            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // BENAR
	                            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // SALAH
	                            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // NILAI
	                         
	                            $style = array(
	                                'alignment' => array(
	                                    'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	                                )
	                            );
	                            $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
	                        }



	            $baris  = 2;
	                        foreach ($ambildata as $frow){
	                             
	                           //pemanggilan sesuaikan dengan nama kolom tabel
	                            $objset->setCellValue("A".$baris, $frow->nama); //membaca data nama
	                            $objset->setCellValue("B".$baris, $frow->benar); //membaca data benar
	                            $objset->setCellValue("C".$baris, $frow->salah); //membaca data salah
	                            $objset->setCellValue("D".$baris, $frow->nilai); //membaca data nilai
	                             
	                            //Set number value
	                            $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
	                             
	                            $baris++;
	                        }
	                         
	                        $objPHPExcel->getActiveSheet()->setTitle('Data Export');
	 
	            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
	            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	 			$filename = "Data_Nilai_".date("Y-m-d H:i:s").".xlsx";

	            //sesuaikan headernya 
	            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	            header("Cache-Control: no-store, no-cache, must-revalidate");
	            header("Cache-Control: post-check=0, pre-check=0", false);
	            header("Pragma: no-cache");
	            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	            //ubah nama file saat diunduh
	            header('Content-Disposition: attachment;filename="'.$filename.'"');
	            //unduh file
	            $objWriter->save("php://output");
	 
	            //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
	            // Folder Documentation dan Example
	            // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
	 
	        }

	function nilai_tugas($id_soal)
	{
		$this->cek_session();

		$ambil = $this->ambil_user();

		$data = array(
			'judul' => 'Nilai Tugas',
			'sub_judul'	=> 'manajemen nilai tugas siswa',
			'tipe'	=> 'Nilai Tugas', 
			'nilai' => $this->m_guru->GetNilaiTugas("$id_soal")->result_array(),
			'id_soal'	=> $id_soal,
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/nilai_tugas', $data);

	}

	function terimakelas($id_kelas_siswa, $id_kelas, $posisi)
	{
		$this->cek_session();

		$query = $this->m_guru->update('kelas_siswa',array('status'=>'diterima'),array('id_kelas_siswa'=>$id_kelas_siswa));

		if ($query) {
			$this->_pesan2('success', 'Berhasil diterima...');
		}else{
			$this->_pesan2('warning', 'Gagal diterima...');
		}

		redirect("adminguru/detailkelas/" . $id_kelas . "/".$posisi."");
	}

	function tolakkelas($id_kelas_siswa, $id_kelas, $posisi)
	{
		$this->cek_session();

		$query = $this->m_guru->update('kelas_siswa',array('status'=>'ditolak'),array('id_kelas_siswa'=>$id_kelas_siswa));

		if ($query) {
			$this->_pesan2('success', 'Berhasil ditolak...');
		}else{
			$this->_pesan2('warning', 'Gagal ditolak...');
		}

		redirect("adminguru/detailkelas/" . $id_kelas . "/".$posisi."");
	}

	function hapus_tugas($id_soal)
	{
		$this->cek_session();

		$query = $this->m_siswa->delete('soal', "id_soal=$id_soal");

		if ($query) {
			$this->_pesan2('success', 'Tugas berhasil dihapus');
		}else{
			$this->_pesan2('warning', 'Tugas gagal dihapus');
		}

		redirect('adminguru/published');
	}

	function hapus_tugas_un($id_soal)
	{
		$this->cek_session();

		$query = $this->m_siswa->delete('soal', "id_soal=$id_soal");

		if ($query) {
			$this->_pesan2('success', 'Tugas berhasil dihapus');
		}else{
			$this->_pesan2('warning', 'Tugas gagal dihapus');
		}

		redirect('adminguru/unpublished');
	}

	function hapus_pesan($posisi, $id_pesan)
	{
		$this->cek_session();

		$query = $this->m_guru->delete('pesan', "id_pesan=$id_pesan");

		if (!$query) {
			$this->_pesan2('warning', 'Pesan gagal dihapus');
			redirect('adminguru/' . $posisi . '');
		}

		$this->_pesan2('success', 'Pesan berhasil dihapus');
		redirect('adminguru/' . $posisi . '');
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
		
		if ( $session['jenis'] != 'guru') {
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
		
		$ambil = $this->m_guru->GetUser("where id_akun = " . $session['id_akun'] . "")->row_array();

		return $ambil;
	}

	function _header($id_akun)
	{
		$ambil = $this->ambil_user();
		$id_paket = $ambil['id_paket'];
		$id_akun	= $ambil['id_akun'];

		// cek batas akhir paket
		$cek_paket = $this->m_guru->CekPaket("$id_akun");
		if ($cek_paket == 'habis') {
			$this->m_guru->update('akun', array("id_paket"=>NULL, "batas_paket"=>NULL), "id_akun=$id_akun");
		}
		// cek batas akhir end

		$data = array(
			'nama'			=> $ambil['nama'],
			'foto'			=> $ambil['foto'],
			'jenis'			=> $ambil['jenis'],
			'tgl_gabung'	=> $ambil['tgl_gabung'],
			'jumlah_pesan'	=> $this->m_guru->GetPesan("where id_akun = " . $id_akun . "")->num_rows(),
			'isi_pesan'		=> $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $id_akun . " ORDER BY waktu_pesan DESC")->result_array(),
			'iklan'		=> $this->m_guru->GetIklan("$id_paket"),
		);

		return $data;
	}

	function semua_pesan()
	{
		$this->cek_session();
		$kode_kelas = $this->kode_kelas();

		$ambil = $this->ambil_user();

		$data = array(
			'judul' => 'Manajemen Pesan',
			'sub_judul'	=> 'manajemen pesan anda',
			'tipe'	=> 'Manajemen Pesan', 
			'pesan' => $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $ambil['id_akun'] . " ORDER BY status ASC")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/pesan', $data);
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

		redirect('adminguru/inbox');
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

		redirect('adminguru/setting/paket');
	}

	function inbox()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'subject'	=> $this->m_guru->GetTeman($id_akun)->result_array(), 
			'judul' => 'Manajemen Pesan Masuk',
			'sub_judul'	=> 'manajemen pesan masuk anda',
			'tipe'	=> 'Manajemen Pesan Masuk', 
			'pesan' => $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $ambil['id_akun'] . " ORDER BY waktu_pesan DESC")->result_array(),
			'jenis2'	=> 'inbox',
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/pesan', $data);
	}

	function outbox()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'subject'	=> $this->m_guru->GetTeman($id_akun)->result_array(), 
			'judul' => 'Manajemen Pesan Keluar',
			'sub_judul'	=> 'manajemen pesan keluar anda',
			'tipe'	=> 'Manajemen Pesan Keluar', 
			'pesan' => $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.dari = " . $ambil['id_akun'] . " ORDER BY status ASC")->result_array(),
			'jenis2'	=> 'outbox',
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/pesan', $data);
	}

	function terbaca()
	{
		$this->cek_session();
		$kode_kelas = $this->kode_kelas();

		$ambil = $this->ambil_user();

		$data = array(
			'judul' => 'Manajemen Pesan',
			'sub_judul'	=> 'manajemen pesan anda',
			'tipe'	=> 'Manajemen Pesan', 
			'pesan' => $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $ambil['id_akun'] . " AND status = 'terbaca'")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/pesan_terbaca', $data);
	}

	function belum_terbaca()
	{
		$this->cek_session();
		$kode_kelas = $this->kode_kelas();

		$ambil = $this->ambil_user();

		$data = array(
			'judul' => 'Manajemen Pesan',
			'sub_judul'	=> 'manajemen pesan anda',
			'tipe'	=> 'Manajemen Pesan', 
			'pesan' => $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where pesan.id_akun = " . $ambil['id_akun'] . " AND status = 'belum_terbaca'")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/pesan_belum_terbaca', $data);
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
			'pesan' => $this->m_guru->GetPesan("JOIN akun ON akun.id_akun = pesan.dari where id_pesan = '$id_pesan'")->row_array(),

			// dari => tujuan
			// id_akun => dari
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/baca_pesan', $data);
	}

	function dashboard()
	{
		$this->cek_session();
		
		$ambil = $this->ambil_user();

		$data = array(
			'judul' 		=> 'Dashboard',
			'sub_judul'		=> 'dashboard anda',
			'tipe'			=> 'Admin Guru', 
			'jumlah_kelas' 	=> $this->m_guru->GetKelas("where id_akun = " . $ambil['id_akun'] . "")->num_rows(),
			'jumlah_siswa'	=> $this->m_guru->GetKelasSiswa("JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas WHERE kelas.id_akun = " . $ambil['id_akun'] . "")->num_rows(),
			'jumlah_soal'	=> $this->m_guru->GetSoal("where id_akun = " . $ambil['id_akun'] . "")->num_rows(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/dashboard', $data);
	}

	function kode_kelas()
	{
		$random_string = random_string('numeric', 8);
		$array_kelas = $this->m_guru->GetKelas()->result_array();
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
		$kode_kelas = $this->kode_kelas();

		$ambil = $this->ambil_user();

		$data = array(
			'judul' => 'Manajemen Kelas',
			'sub_judul'	=> 'manajemen kelas anda',
			'tipe'	=> 'Manajemen Kelas', 
			'kelas' => $this->m_guru->GetKelas("where id_akun = " . $ambil['id_akun'] . "")->result_array(),
			'kode_kelas' => $kode_kelas,
			'siswa'	=> $this->m_guru->GetUser("where jenis='siswa'")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/kelas', $data);
	}

	function insertkelas()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		// cek jatah kelas
		$jatah = $this->m_guru->CekJatahKelas("$id_akun");
/*		echo($jatah);
		exit();*/

		if ($jatah == "habis") {
			$this->_pesan2('warning', "Maaf, batas membuat kelas sudah habis");
			redirect('adminguru/kelas');
		}

		$logo = array(
			'upload_path' => './assets/image/kelas',
			'file_name'	=> $this->input->post('kode_kelas'), 
			'allowed_types'	=> '*',
			'overwrite'	=> TRUE,
		);

		$this->load->library('upload', $logo);

		// pengecekan hasil upload
		if ($this->upload->do_upload('logo')) {
			$nama_gambar = $this->upload->data('file_name');

			$data = array(
				'id_akun' => $ambil['id_akun'], 
				'kelas' => $this->input->post('kelas'), 
				'deskripsi' => $this->input->post('deskripsi'), 
				'kode_kelas' => $this->input->post('kode_kelas'), 
				'logo' => $nama_gambar, 
			);

			// insert kelas
			$query = $this->m_guru->insert('kelas', $data);

			if ($query) {
				// menampilkan sukses
				$this->_pesan2('success', 'Kelas berhasil ditambah...');
			}else{
				$this->_pesan2('warning', 'Kelas gagal ditambah...');
			}
		}else{
			// gambar gagal di upload
			$this->_pesan2('warning', 'Gambar gagal diupload...');
		}	

		if ($value == 2) {
			redirect('adminguru/buat_tugas');
		} else {
			redirect('adminguru/kelas');
		}
		
		
	}

	function hapuskelas($id_kelas)
	{
		$this->cek_session();


		$this->m_guru->Delete('kelas', array('id_kelas' => $id_kelas));

		$this->_pesan2('success', 'Kelas berhasil dihapus... ');

		redirect("adminguru/kelas");
	}

	function detailkelas($id_kelas, $status)
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'id_kelas'	=> $id_kelas,
			'judul'	=> 'Detail Kelas',
			'sub_judul'	=> 'lihat detail kelas di sini',
			'tipe'	=> 'Detail Kelas',
			/*'isi' => $this->m_guru->GetKelas("where id_kelas = " . $id_kelas . "")->row_array(), */
			'siswa'	=> $this->m_guru->GetSiswaPerKelas($id_kelas, $status),
		);

		$data2 = $this->_header($id_akun);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin("guru/kelas_$status", $data);
	}

	function siswa($status='diterima')
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Manajemen Siswa',
			'sub_judul'	=> 'manajemen siswa area',
			'tipe'	=> 'Manajemen Siswa', 
			'siswa' => $this->m_guru->GetUser("JOIN paket p ON p.id_paket = akun.id_paket JOIN kelas_siswa ks ON ks.id_akun = akun.id_akun JOIN kelas k ON k.id_kelas = ks.id_kelas WHERE k.id_akun = $id_akun AND ks.status = '$status'")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		switch ($status) {
			case 'diterima':
				$this->template->tampil_admin('guru/siswa', $data);
				break;

			case 'belum_diterima':
				$this->template->tampil_admin('guru/siswa_belum_diterima', $data);
				break;
			
			default:
				$this->template->tampil_admin('guru/siswa_ditolak', $data);
				break;
		}
	}

	function tolaksiswa($jenis, $id_kelas_siswa)
	{
		$this->cek_session();

		$query = $this->m_guru->update('kelas_siswa', array('status'=>'ditolak'), array('id_kelas_siswa'=>$id_kelas_siswa));
		
		if ($query) {
			$this->_pesan2('success', 'Siswa berhasil ditolak');
		}else{
			$this->_pesan2('warning', 'Siswa gagal ditolak');
		}

		if ($jenis == 'diterima') {
			redirect('adminguru/siswa');
		}elseif ($jenis == 'belum_diterima'){
			redirect('adminguru/siswa/belum_diterima');
		}
	}

	function terimasiswa($jenis, $id_kelas_siswa)
	{
		$this->cek_session();

		$query = $this->m_guru->update('kelas_siswa', array('status'=>'diterima'), array('id_kelas_siswa'=>$id_kelas_siswa));
		
		if ($query) {
			$this->_pesan2('success', 'Siswa berhasil diterima');
		}else{
			$this->_pesan2('warning', 'Siswa gagal diterima');
		}

		if ($jenis == 'ditolak') {
			redirect('adminguru/siswa/ditolak');
		}elseif ($jenis == 'belum_diterima'){
			redirect('adminguru/siswa/belum_diterima');
		}
	}

	function hapus_kelas_siswa($id_kelas_siswa)
	{
		$this->cek_session();

		$query = $this->m_guru->delete('kelas_siswa', array('id_kelas_siswa'=>$id_kelas_siswa));

		if ($query) {
			$this->_pesan2('success', 'Siswa berhasil dihapus');
		}else{
			$this->_pesan2('warning', 'Siswa gagal dihapus');
		}

		redirect('adminguru/siswa/ditolak');
	}

	function tugas()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Manajemen Tugas',
			'sub_judul'	=> 'manajemen tugas area',
			'tipe'	=> 'Manajemen Tugas', 
			'tugas' => $this->m_guru->GetSoal("where id_akun = " . $id_akun . "")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/tugas', $data);
	}

	function buat_tugas()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$kode_kelas = $this->kode_kelas();

		$data = array(
			'judul' => 'Buat Tugas',
			'sub_judul'	=> 'buat tugas area',
			'tipe'	=> 'Buat Tugas',
			'kelas'	=> $this->m_guru->GetKelas("where id_akun = " . $id_akun ."")->result_array(),
			'kode_kelas' => $kode_kelas,
			'template' =>	$this->m_guru->GetTemplate()->result_array(),
			'fitur'		=> $this->m_guru->GetFiturPaket($id_akun),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/buat_tugas', $data);
	}

	function insert_tugas()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		// cek jatah soal
		$jatah = $this->m_guru->CekJatahSoal("$id_akun");

		if ($jatah == "habis") {
			$this->_pesan2('warning', "Batas membuat soal anda sudah habis");
			redirect('adminguru/buat_tugas');
		}

		$paket = $this->m_guru->GetFiturPaket($id_akun);

		if ($paket['template_soal'] == 'yes') {
			$id_template = $this->input->post('id_template');	
		}else{
			$id_template = NULL;
		}
		

		$data = array(
			'id_akun' 		=> $id_akun,
			'judul' 		=> $this->input->post('judul'),
			'mulai'			=> date("Y-m-d H:i:s"),
			'berhenti'		=> nice_date($this->input->post('berhenti'), 'Y-m-d H:i:s'),
			'deskripsi'		=> $this->input->post('deskripsi'),
			'pesan'			=> $this->input->post('pesan'),
			'status'		=> $this->input->post('submit'),
			'id_template'	=> $id_template,
		);

		$id_soal = $this->m_guru->insert_tugas($data); // insert soal

		if (!$id_soal) {
			$this->_pesan2('warning', 'Gagal buat tugas');
			redirect('adminguru/buat_tugas');
		}

		foreach ($this->input->post('id_kelas') as $isi) {
			$data2 = array(
				'id_kelas' 	=> $isi['id_kelas'],
				'id_soal'	=> $id_soal,
			);
			$result = $this->m_guru->insert('kelas_soal', $data2);
		}
		
		// array untuk insert batch
		$data4 = array();

		for ($i=0; $i < $this->input->post('jumlah-soal'); $i++) { 
			$data3 = array(
				'id_soal' 	=> $id_soal,
				'soal'		=> $this->input->post("soal[$i]"),
				'pilihan_a'		=> $this->input->post("pilihan_a[$i]"),
				'pilihan_b'		=> $this->input->post("pilihan_b[$i]"),
				'pilihan_c'		=> $this->input->post("pilihan_c[$i]"),
				'pilihan_d'		=> $this->input->post("pilihan_d[$i]"),
				'kunci'			=> $this->input->post("kunci[$i]"),
			);
			$data4[$i] = $data3;
		}
		
		$pil_ganda = $this->m_guru->insert_pilihan($data4);

		if (isset($id_soal) && isset($result)) {
			$this->_pesan2('success', "Tugas berhasil dibuat");
		} else {
			$this->_pesan2('warning', "Tugas gagal dibuat");
		}
		
		redirect('adminguru/buat_tugas');
	}

	function published()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Manajemen Tugas Ter-Publish',
			'sub_judul'	=> 'manajemen tugas ter-publish',
			'tipe'	=> 'Manajemen Tugas Ter-Publish', 
			'tugas' => $this->m_guru->GetSoal("where id_akun = " . $id_akun . " and status='published'")->result_array(),
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/tugas_published', $data);
	}

	function unpublished()
	{
		$this->cek_session();

		$ambil = $this->ambil_user();
		$id_akun = $ambil['id_akun'];

		$data = array(
			'judul' => 'Manajemen Tugas Belum Dipublish',
			'sub_judul'	=> 'manajemen tugas belum dipublish',
			'tipe'	=> 'Manajemen Tugas Belum Dipublish', 
			'tugas' => $this->m_guru->GetSoal("where id_akun = " . $id_akun . " and status='unpublished'")->result_array(),

			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/tugas_unpublished', $data);
	}

	function publish_tugas($id_soal)
	{
		$return = $this->m_guru->publish_tugas($id_soal);
		if ($return) {
			$this->_pesan2('success', 'Tugas berhasil di publish...');
			$this->unpublished();
		} else {
			$this->_pesan2('warning', 'Tugas gagal di publish...');
			$this->unpublished();
		}
		
	}

	function setting($tab = 'biodata')
	{
		$this->cek_session();
		$ambil = $this->ambil_user();

		$data = array(
			'judul' 	=> 'Halaman Setting',
			'sub_judul'	=> 'halaman setting area',
			'tipe'		=> 'Halaman Setting',
			'biodata'	=> $this->m_guru->GetUser("where id_akun = " . $ambil['id_akun'] . "")->row_array(),
			'paket'		=> $this->m_guru->GetPaket('left join akun on akun.id_paket = paket.id_paket where id_akun = ' . $ambil['id_akun'] . '')->row_array(),
			'paketall'	=> $this->m_guru->GetPaket("where tipe_paket = 'guru'")->result_array(),
			'tab'		=> $tab,
			);

		$data2 = $this->_header($ambil['id_akun']);

		$data = array_merge($data, $data2);

		$this->template->tampil_admin('guru/setting', $data);
	}

	function insertbiodata()
	{
		$this->cek_session();
		$ambil = $this->ambil_user();

		$foto = array(
			'upload_path' => './assets/image/guru',
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
				'alamat' => $this->input->post('alamat'), 
				'no_hp' => $this->input->post('no_hp'), 
				'email' => $this->input->post('email'), 
				'foto' => $nama_gambar, 
			);

			// update akun guru
			$query = $this->m_guru->update('akun', $data, "id_akun = ".$ambil['id_akun']."");

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
		redirect('adminguru/setting/biodata');
	}

	function ajaxpaket()
	{
		$this->cek_session();
		$id_paket = $this->input->POST('id_paket');

		
		$isi[] = $this->m_guru->GetPaket("where id_paket = '$id_paket'")->row_array();

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
		$harga_paket = $this->m_guru->GetPaket("where id_paket = $id_paket")->row_array();
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
			
			$this->m_guru->Update('akun', array('id_paket' => $id_paket, 'mulai_paket' => $mulai_paket, 'batas_paket' => $batas_paket, 'deposit' => $pengurangan), array('id_akun' => $id_akun));

			// menampilkan pesan sukses
			$this->_pesan2('success', "Anda berhasil berlangganan " . $harga_paket['nama_paket'] ."");
		}
		redirect('adminguru/setting/paket');
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
			$isi = $this->m_guru->GetUser("where id_akun = $id_akun")->row_array();
			if ($isi['password'] != $password_lama) {
				$this->_pesan2('warning', 'Password lama tidak cocok...');
			} else {

				$set = array(
					'username' 	=> $username,
					'password'	=> $password_baru,
				);

				$where = "id_akun = $id_akun";

				$this->m_guru->update('akun', $set, $where);

				$this->_pesan2('success', 'Data berhasil diubah...');
			}
		}

		redirect('adminguru/setting/administrasi');
	}
}

 ?>