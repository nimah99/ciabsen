<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Jam_Kerja extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
        $this->load->view('home');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
    }
    public function index(){
        $this->load->model('kerja_model');
        $records=$this->kerja_model->getRecords();
        $this->load->view('jam_kerja',['records'=>$records]);
    }

    public function delete($id){
        $this->load->model('kerja_model');
        $record=$this->kerja_model->deleterecord($id);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
		redirect('jam_kerja'); 
    }
    public function update($id){
        $data=array(
            "mulai_masuk"=>$_POST['masuk'],
            "boleh_pulang"=>$_POST['pulang'],
            "lambat_masuk"=>$_POST['lambat_masuk'],
            "lambat_pulang"=>$_POST['lambat_pulang'] 
     );  
        $this->load->model('kerja_model');
        $record=$this->kerja_model->updaterecord($id,$data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
		redirect('jam_kerja');
    }

    public function insert(){
        $data=array(
            "mulai_masuk"=>$_POST['mulai_masuk'],
            "boleh_pulang"=>$_POST['boleh_pulang'],
            "lambat_masuk"=>$_POST['lambat_masuk'],
            "lambat_pulang"=>$_POST['lambat_pulang']
     );
             $this->load->model('kerja_model');
             $this->kerja_model->saveRecord($data);
             $this->session->set_flashdata('sukses','Record Saved Successfully');
            redirect('jam_kerja');        
}


}
?>