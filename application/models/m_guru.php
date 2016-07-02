<?php 
/**
* 
*/
class M_guru extends CI_Model
{
	function export_nilai(){
		
		$query = $this->db->query("SELECT nama, COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)) AS salah, COUNT(IF(pg.kunci = ps.jawaban, 1, NULL)) AS benar, (COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))/(COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))+COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)))*100) AS nilai FROM pil_siswa ps JOIN akun a ON a.id_akun = ps.id_akun JOIN pil_ganda pg ON pg.id_pil_ganda = ps.id_pil_ganda JOIN soal s ON pg.id_soal = s.id_soal WHERE pg.id_soal = 5 GROUP BY pg.id_soal");

		if($query->num_rows() > 0){
			foreach($query->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function GetNilaiTugas($id_soal)
	{
		return $this->db->query("SELECT nama, COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)) AS salah, COUNT(IF(pg.kunci = ps.jawaban, 1, NULL)) AS benar, (COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))/(COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))+COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)))*100) AS nilai FROM pil_siswa ps JOIN akun a ON a.id_akun = ps.id_akun JOIN pil_ganda pg ON pg.id_pil_ganda = ps.id_pil_ganda JOIN soal s ON pg.id_soal = s.id_soal WHERE pg.id_soal = $id_soal GROUP BY pg.id_soal");
		
	}
	function GetFiturPaket($id_akun)
	{
		$query = $this->db->query("SELECT p.* FROM paket p JOIN akun a ON p.id_paket = a.id_paket WHERE id_akun = $id_akun");
		return $query->row_array();
	}

	function GetUser($where = '')
	{
		return $this->db->query("SELECT * FROM akun $where");
	}

	function GetKelas($where='')
	{
		return $this->db->query("SELECT * FROM kelas $where");
	}

	function GetKelasSiswa($where='')
	{
		return $this->db->query("SELECT * FROM kelas_siswa $where");
	}

	function GetKelasSoal($where='')
	{
		return $this->db->query("SELECT * FROM kelas_soal $where");
	}

	function GetSoal($where='')
	{
		return $this->db->query("SELECT * FROM soal $where");
	}

	function GetKetPilSiswa($where='')
	{
		return $this->db->query("SELECT * FROM ket_pil_siswa $where");
	}

	function GetPesan($where='')
	{
		return $this->db->query("SELECT * FROM pesan $where");
	}

	function GetVisitor($where='')
	{
		return $this->db->query("SELECT * FROM visitor $where");
	}

	function GetPaket($where='')
	{
		return $this->db->query("SELECT * FROM paket $where");
	}

	function GetTemplate($where='')
	{
		return $this->db->query("SELECT * FROM template $where");
	}

	function GetSetting($where='')
	{
		return $this->db->query("SELECT * FROM setting $where");
	}

	function GetTeman($id_akun)
	{
		$query = $this->db->query("SELECT a.* FROM akun a JOIN kelas_siswa ks ON ks.id_akun = a.id_akun JOIN kelas k ON k.id_kelas = ks.id_kelas WHERE k.id_akun = $id_akun GROUP BY a.id_akun");

		return $query;
	}

	function ubah_terbaca($id_pesan)
	{
		return $this->db->update('pesan', array('status' => 'terbaca'), "id_pesan=$id_pesan");
	}

	function Insert($tabel='', $data='')
	{
		return $this->db->insert($tabel, $data);
	}

	function Delete($tabel, $where)
	{
		return $this->db->delete($tabel, $where);
	}

	function Update($tabel, $set, $where)
	{
		return $this->db->update($tabel, $set, $where);
	}

	function GetRataNilaiPerBulan($id_akun, $bulan, $tahun)
	{
		$kelas = $this->db->get_where('kelas', array('id_akun' => $id_akun))->result_array();


		$array_bulan = $this->db->query("SELECT (benar/(benar+salah))*100 as nilai FROM nilai WHERE id_akun = $id_akun and month(tgl_dikerjakan) = $bulan and year(tgl_dikerjakan) = $tahun")->row_array();

		$bulan2 = $array_bulan['nilai'];
		
		return "$bulan2";
	}

	function GetNilaiPerBulan($id_soal, $bulan)
	{
		$this->db->select_sum('nilai');
		$this->db->get_where('nilai', array('id_soal' => $id_soal, 'MONTH(soal.mulai)' => $bulan));
	}

	function publish_tugas($id_soal)
	{
		return $this->db->update('soal', array('status' => 'published'), "id_soal = '$id_soal'");
	}

	function insert_tugas($data)
	{
		$this->db->insert('soal', $data);

		return $this->db->insert_id();
	}

	function insert_pilihan($data4)
	{
		return $this->db->insert_batch('pil_ganda', $data4);
	}

	function GetSiswaPerKelas($id_kelas, $status)
	{
		$query = $this->db->query("SELECT * FROM kelas_siswa ks JOIN akun a ON a.id_akun = ks.id_akun JOIN kelas k ON k.id_kelas = ks.id_kelas LEFT JOIN paket p ON p.id_paket = a.id_paket WHERE k.id_kelas = $id_kelas AND ks.status = '$status'");
		return $query->result_array();
	}

	function GetIklan($id_paket)
	{	
		if ($id_paket) {
			$this->db->select('iklan');
			$query = $this->db->get_where('paket', "id_paket=$id_paket")->row_array();
			return $query['iklan'];
		}else{
			return "yes";
		}
	}

	function CekPaket($id_akun)
	{
		$this->db->select('batas_paket');
		$query = $this->db->get_where('akun', "id_akun=$id_akun")->row_array();

		if ($query['batas_paket'] < date("Y-m-d H:i:s")) {
			return "habis";
		}else{
			return "masih";
		}
	}

	function CekJatahKelas($id_akun)
	{
		$kelas_dibuat = $this->db->query("SELECT COUNT(*) as total FROM kelas WHERE id_akun=$id_akun")->row_array();
		$jatah_kelas = $this->db->query("SELECT jumlah_kelas FROM paket p JOIN akun a ON a.id_paket = p.id_paket WHERE a.id_akun = $id_akun")->row_array();

		if ($kelas_dibuat['total'] >= $jatah_kelas['jumlah_kelas']) {
			return "habis";
		}else{
			return "masih";
		}
	}

	function CekJatahSoal($id_akun)
	{
		$soal_dibuat = $this->db->query("SELECT COUNT(*) as total FROM soal WHERE id_akun=$id_akun")->row_array();
		$jatah_soal = $this->db->query("SELECT jumlah_soal FROM paket p JOIN akun a ON a.id_paket = p.id_paket WHERE a.id_akun = $id_akun")->row_array();

		if ($soal_dibuat['total'] >= $jatah_soal['jumlah_soal']) {
			return "habis";
		}else{
			return "masih";
		}
	}

}
 ?>