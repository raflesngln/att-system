<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MyLib{

    public function hello($nama){
        //$nama='raflesian a nignnolan';
        return $nama;
    }
    function rupiah($rp){
        return number_format($rp,0,'.','.');
    }
}

/* End of file Someclass.php */