<?php 
/**
* Template Library
* By : Anandia Muhammad Yudhistira 
*/
class Template
{
	protected $ci;
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function tampil_web($template, $data=null)
	{
		$this->ci->load->view('web/header_web', $data);
		// $this->$ci->load->view('admin/sidebar_web', $data);
		$this->ci->load->view($template, $data);
		$this->ci->load->view('web/footer_web', $data);
	}

	function tampil_admin($template, $data=null)
	{
		$this->ci->load->view('admin/header_admin', $data);
		$this->ci->load->view('admin/sidebar_admin', $data);
		$this->ci->load->view($template, $data);
		$this->ci->load->view('admin/footer_admin', $data);
	}

}
 ?>