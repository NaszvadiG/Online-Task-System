<?php 
/**
* 
*/
class M_admin extends CI_Model
{
	function GetTeman($id_akun)
	{
		$query = $this->db->query("SELECT * FROM akun WHERE NOT(id_akun) = 1");
		return $query;
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

	function GetTemplate($where='')
	{
		return $this->db->query("SELECT * FROM template $where");
	}

	function Insert($tabel='', $data='')
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();;
	}

	function Delete($tabel, $where)
	{
		return $this->db->delete($tabel, $where);
	}

	function Update($tabel, $set, $where)
	{
		return $this->db->update($tabel, $set, $where);
	}

	function GetCountBrowser()
	{
		return $this->db->query("SELECT browser, COUNT(browser) AS total FROM visitor GROUP BY browser ORDER BY total DESC LIMIT 0,5");
	}

	function GetCountOs()
	{
		return $this->db->query("SELECT os, COUNT(os) AS total FROM visitor GROUP BY os ORDER BY total DESC LIMIT 0,5");
	}

	function GetCountVisitor()
	{
		return $this->db->query("SELECT MONTH(tanggal) AS bulan, COUNT(tanggal) as total FROM visitor GROUP BY bulan ORDER BY bulan ASC");
	}

	function GetCountMember()
	{
		return $this->db->query("SELECT jenis, COUNT(jenis) AS total FROM akun GROUP BY jenis HAVING jenis != 'admin'");
	}

	function LastIdTemplate()
	{
		$query = $this->db->query('SELECT MAX(id_template) as id_template FROM template')->row_array();
		
		return $query['id_template']+1;
	}

	function delete_template($id_template)
	{
		$this->db->select('isi, thumbnail');
		$query2 = $this->db->get_where('template', array('id_template' => $id_template));
		
		$this->db->delete('template',"id_template=$id_template");

		return $query2;
	}

}
 ?>