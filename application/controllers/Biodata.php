<?php
class Biodata extends CI_Controller{
    function __construct(){
        parent::__construct();
    }	

function index(){  

		echo "haiiiii";
	}

function bio(){
	$keyword='jakarta barat';
	$this->load->library('profil');
	$a=$this->profil->dataku();
	echo $a;
}

}


