<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); 

function konversiBulan($angka)
{
	$bulan = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sept', 'Okt', 'Nov', 'Des');

	$index = $angka-1;

	return $bulan[$index];
}
?>