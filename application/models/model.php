<?php 
/**
* 
*/
class Model extends CI_Model
{
	
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

	function GetNilai($where='')
	{
		return $this->db->query("SELECT * FROM nilai $where");
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
}
 ?>