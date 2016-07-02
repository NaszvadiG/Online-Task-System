<?php if ( ! defined('BASEPATH')) exit('No direct script allowed') ;

	/**
	* 
	*/
	class Web_con extends CI_Controller
	{
		function _pesan2($jenis, $isi)
		{
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

		function cek_cookies()
		{
			$this->load->helper('cookie');

			$ambil = $this->model->GetUser("where not(jenis = 'admin')")->result_array();
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

						if ($array['jenis'] == 'guru') {
							redirect('adminguru');
						} elseif ($array['jenis'] == 'siswa') {
							redirect('adminsiswa');
						}
						
						
						//header('location:'.site_url('admin'));
					}
				}
			}
		}
		
		function index() //halaman login
		{	
			$time = time();
			$tanggal = mdate('%Y-%m-%d %h:%i:%s', $time);

			$data = array(
				'ip' => $this->input->ip_address(), 
				'os'	=> $this->agent->platform(),
				'browser'	=> $this->agent->browser(),
				'tanggal'	=> $tanggal,
			);

			$this->model->insert('visitor', $data);

			$this->cek_cookies();

			$cap = $this->buat_captcha();

			$data = array(
				'cap_image'	=> $cap['image'],
				'cap_text'	=> $cap['word'],
				'tema'	=> $this->model->GetSetting()->row_array(),
				);

			$this->load->view('login', $data);
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

		function register()
		{
			$data = array(
				'username' 	=> $this->input->post('username'),
				'nama'		=> $this->input->post('fullname'),
				'email'		=> $this->input->post('email'),
				'password'	=> md5($this->input->post('password')),
				'jenis'		=> $this->input->post('jenis'), 
			);
			$query = $this->model->insert('akun', $data);
			if ($query) {
				$this->_pesan2('success', 'Pendaftaran berhasil... ');
			}else{
				$this->_pesan2('warning', 'Pendaftaran gagal... ');
			}

			redirect('web_con');
		}

		function proseslogin()
		{
			if ($_POST) {
				$this->load->helper('cookie');

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$captcha 	= $this->input->post('captcha');

				$cookie = $this->input->post('cookie');


				/* Buat Cookies */
				if ($cookie) {
					$this->input->set_cookie('login[username]', $username, 86400);
					$this->input->set_cookie('login[password]', $password, 86400);
				}

				$ambil = $this->model->GetUser("where username = '$username' and password = '$password' and not(jenis = 'admin')")->row_array();
				
				if ($this->cek_captcha($captcha) == TRUE) {
					if ($ambil != NULL) {
						$array = array(
							'id_akun' => $ambil['id_akun'],
							'username'	=> $ambil['username'],
							'nama'	=> $ambil['nama'],
							'jenis'	=> $ambil['jenis'],
							'foto'	=> $ambil['foto'],
						);
						
						$this->session->set_userdata( 'login',$array );
						
						//$this->session->set_flashdata('pesan', "<script>alert('SELAMAT, ANDA SUDAH LOGIN');</script>");

						switch ($ambil['jenis']) {
							case 'guru':
								redirect('adminguru');
								break;

							case 'siswa':
								redirect('adminsiswa');
								break;
						}
						
					}else{
						/* Info Login Gagal */
						$this->session->set_flashdata('pesan', "<script>alert('Password yang anda masukkan salah');</script>");
						redirect('web_con');
					}
				}else{
					/* Capctha Salah */
					$this->_pesan2('warning', 'Captha salah, silahkan ulangi lagi.');

					redirect('web_con');
					//header('location:'.site_url('web_con/index/5'));
				}

			}else{
				echo "anda tidak dapat mengakses halaman ini";
			}
		}

	}

 ?>