<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
    }
    public function index(){
        $this->load->view('home');
    }
}
?>