<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Jabatan extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
        $this->load->view('home');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
    }
    public function index(){
        $this->load->model('lvl_model');
        $records=$this->lvl_model->getRecords();
        $this->load->view('jabatan',['records'=>$records]);
    }

    public function delete($id){
        $this->load->model('lvl_model');
        $record=$this->lvl_model->deleterecord($id);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
		redirect('jabatan'); 
    }
    public function update($id){
        $data=array(
            "jabatan"=>$_POST['jabatan'],
            "gapok"=>$_POST['gapok'],
            "makan"=>$_POST['makan'],
            "transport"=>$_POST['transport'],
            "kesehatan"=>$_POST['kesehatan'],
            "tunj_jabatan"=>$_POST['tunj_jabatan'],
            "lembur"=>$_POST['lembur']
     );  
        $this->load->model('lvl_model');
        $record=$this->lvl_model->updaterecord($id,$data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
		redirect('jabatan');
    }

    public function insert(){
                $data=array(
                    "jabatan"=>$_POST['jabatan'],
                    "gapok"=>$_POST['gapok'],
                    "makan"=>$_POST['makan'],
                    "transport"=>$_POST['transport'],
                    "kesehatan"=>$_POST['kesehatan'],
                    "tunj_jabatan"=>$_POST['tunj_jabatan'],
                    "lembur"=>$_POST['lembur'],
                    "iddept"=>$_POST['iddept']
             );  
             $this->load->model('lvl_model');
             $this->lvl_model->saveRecord($data);
             $this->session->set_flashdata('sukses','Record Saved Successfully');
            redirect('jabatan');        
}

}
?>