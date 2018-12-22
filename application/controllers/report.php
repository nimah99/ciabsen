<?php defined('BASEPATH') OR exit('No direct script access allowed');
class report extends CI_Controller{
    function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->view('home');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
    }
    public function index(){
        $this->load->view('report');
    } 
}
?>