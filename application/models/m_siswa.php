<?php 
/**
* 
*/
class M_siswa extends CI_Model
{
	function GetTeman($id_akun)
	{
		$query = $this->db->query("SELECT a.* FROM akun a JOIN kelas k ON k.id_akun = a.id_akun JOIN kelas_siswa ks ON ks.id_kelas = k.id_kelas WHERE ks.id_akun = $id_akun AND ks.status='diterima'");

		return $query;
	}

	function ubah_terbaca($id_pesan)
	{
		return $this->db->update('pesan', array('status' => 'terbaca'), "id_pesan=$id_pesan");
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

	function GetSoal2($where='')
	{
		return $this->db->query("SELECT *, soal.deskripsi as deskripsi_soal FROM soal $where");
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

	function GetPilGanda($where='')
	{
		return $this->db->query("SELECT * FROM pil_ganda $where");	
	}

	function GetSetting($where='')
	{
		return $this->db->query("SELECT * FROM setting $where");
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

/*	function GetRataNilaiPerBulan($id_akun, $bulan, $tahun)
	{
		$array_bulan = $this->db->query("SELECT (benar/(benar+salah))*100 as nilai FROM nilai WHERE id_akun = $id_akun and month(tgl_dikerjakan) = $bulan and year(tgl_dikerjakan) = $tahun")->row_array();

		$bulan2 = $array_bulan['nilai'];
		
		return "$bulan2";
	}*/

	function insert_jawaban($data)
	{
		return $this->db->insert_batch('pil_siswa', $data);
	}

	function GetRata($id_akun)
	{
		return $this->db->query("SELECT AVG((benar/(benar+salah))*100) AS rata FROM nilai WHERE id_akun = $id_akun");
	}

	function GetRataBulan($id_akun, $tahun)
	{
/*		return $this->db->query("SELECT MONTH(tgl_dikerjakan) AS bulan, AVG((benar/(benar+salah))*100) AS rata FROM nilai WHERE id_akun = $id_akun AND YEAR(tgl_dikerjakan) = $tahun GROUP BY bulan ASC ");*/
	}

	function GetGelar($poin)
	{
		return $this->db->query("SELECT * FROM gelar WHERE poin IN (SELECT MAX(poin) AS poin FROM gelar WHERE poin <= $poin)");
	}

	function GetKelasDiterima($id_akun)
	{
		return $this->db->query("SELECT * FROM kelas_siswa join kelas on kelas.id_kelas = kelas_siswa.id_kelas where kelas_siswa.id_akun = $id_akun and status='diterima'");
	}

	function GetKelasBelumDiterima($id_akun)
	{
		return $this->db->query("SELECT * FROM kelas_siswa join kelas on kelas.id_kelas = kelas_siswa.id_kelas where kelas_siswa.id_akun = $id_akun and status='belum_diterima'");
	}

	function GetKelasDitolak($id_akun)
	{
		return $this->db->query("SELECT * FROM kelas_siswa join kelas on kelas.id_kelas = kelas_siswa.id_kelas where kelas_siswa.id_akun = $id_akun and status='ditolak'");
	}

	function GetTugasBelumDikerjakan($id_akun)
	{
		return $this->db->query("SELECT s.* FROM SOAL s JOIN kelas_soal ko ON ko.id_soal = s.id_soal JOIN kelas_siswa ks ON ks.id_kelas = ko.id_kelas LEFT JOIN ket_pil_siswa n ON n.id_soal = s.id_soal WHERE ks.id_akun = $id_akun AND n.id_soal IS NULL AND s.berhenti > NOW()");
	}

	function GetTugasSudahDikerjakan($id_akun)
	{
		return $this->db->query("SELECT s.* FROM SOAL s JOIN ket_pil_siswa n ON n.id_soal = s.id_soal WHERE n.id_akun = $id_akun");
	}

	function GetTugasTerlewat($id_akun){
		$query = "SELECT s.* FROM SOAL s JOIN kelas_soal ko ON ko.id_soal = s.id_soal JOIN kelas_siswa ks ON ks.id_kelas = ko.id_kelas LEFT JOIN ket_pil_siswa n ON n.id_soal = s.id_soal WHERE ks.id_akun = $id_akun AND n.id_soal IS NULL AND s.berhenti < NOW()";

		return $this->db->query($query);
	}

	function GetNilai($id_akun)
	{
		return $this->db->query("SELECT s.judul, COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)) AS salah, COUNT(IF(pg.kunci = ps.jawaban, 1, NULL)) AS benar, (COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))/(COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))+COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)))*100) AS nilai FROM pil_siswa ps JOIN pil_ganda pg ON pg.id_pil_ganda = ps.id_pil_ganda JOIN soal s ON pg.id_soal = s.id_soal WHERE ps.id_akun = 7 GROUP BY pg.id_soal");
	}

	function GetNilaiPerAkun($id_akun, $id_soal)
	{
		return $this->db->query("SELECT pg.id_soal, COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)) AS salah, COUNT(IF(pg.kunci = ps.jawaban, 1, NULL)) AS benar, (COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))/(COUNT(IF(pg.kunci = ps.jawaban, 1, NULL))+COUNT(IF(pg.kunci <> ps.jawaban, 1, NULL)))*100) AS nilai FROM pil_siswa ps JOIN pil_ganda pg ON pg.id_pil_ganda = ps.id_pil_ganda WHERE ps.id_akun = $id_akun AND pg.id_soal = $id_soal GROUP BY pg.id_soal");
	}

	function GetJumlahSoal($id_akun)
	{
		$query = $this->db->query("SELECT COUNT(*) as jumlah FROM kelas_soal ko JOIN kelas_siswa ks ON ks.id_kelas = ko.id_kelas WHERE ks.id_akun = $id_akun AND ks.status = 'diterima'")->row_array();
		return $query['jumlah'];
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
}
 ?>