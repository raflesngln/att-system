<?php
class Ab extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
		date_default_timezone_set("Asia/Jakarta"); 
    }	
	 

//------------delete data----------------------------------
function tracking(){
	
	
	$billcode 	= "888999999100";
	$keyAPI	= md5(date("Ymd")."YnTrackQuery".$billcode);
	$data = array(
		"billcode" 	=>$billcode,
		"lang"	=> "id",
		"pictype" 	=> "sj,yn,lc,qs",
		"sign"	=> $keyAPI,
	);
	
	$url='http://202.159.35.122:22230/jandt_track/trackToJson.action?billcode=888999999100&lang=id&pictype=sj,yn,lc,qs&sign='.$keyAPI;
	
				$jsonUrl = file_get_contents($url, False);
				$json_content = json_decode($jsonUrl, true);
				echo print_r($json_content);
	
	
 }


}


