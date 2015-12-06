<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Email extends CI_Controller {
 
    function __construct() {
        parent::__construct();
//            jika belum login redirect ke login
              
    }
 
    function index() {
 $this->load->library('email');

$this->email->from('raflesgholand@gmail.com', 'raflesia');
$this->email->to('raflesngln@gmail.com'); 
$this->email->cc('davitirawanjap@gmail.com'); 
$this->email->bcc('raflesngln@gmail.com'); 

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');	

$this->email->send();

echo $this->email->print_debugger();
    }
 
}