<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tanggal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indonesia');
	}

	function index()
	{
		echo nama_hari('2010-11-23').' '. tgl_indo('2010-11-23');
		echo "<br>";
		echo hitung_mundur(strtotime('2010-11-23'));
	}
}
