<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Absensi extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
        $this->load->view('home');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
        
    }
    public function index(){
        $this->load->model('absensi_model');
        $records=$this->absensi_model->getRecords();
        $this->load->view('absensi',['records'=>$records]);
    }
    public function delete($id){
        $this->load->model('absensi_model');
        $this->absensi_model->deleterecord($id);
        $this->session->set_flashdata('sukses', 'Data Absensi Berhasil Dihapus');
		redirect('absensi'); 
    }

    public function cari(){
                $data=array(
                    "dari"=>$_POST['dari'],
                    "sampai"=>$_POST['sampai']
                );
              $this->load->model('absensi_model');
             $records=$this->absensi_model->cariRecord($data);
            $this->load->view('absensi',['records'=>$records]);    
}

}
?>