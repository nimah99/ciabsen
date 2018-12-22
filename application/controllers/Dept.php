<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dept extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
        $this->load->view('home');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
    }
    public function index(){
        $this->load->model('dept_model');
        $records=$this->dept_model->getRecords();
        $this->load->view('dept',['records'=>$records]);
    }

    public function delete($id){
        $this->load->model('dept_model');
        $record=$this->dept_model->deleterecord($id);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
		redirect('dept'); 
    }
    public function update($id){
        $data=array(
            "department"=>$_POST['department']
     );  
        $this->load->model('dept_model');
        $record=$this->dept_model->updaterecord($id,$data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
		redirect('dept');
    }

    public function insert(){
        $data=array(
            "department"=>$_POST['department']
     );  
             $this->load->model('dept_model');
             $this->dept_model->saveRecord($data);
             $this->session->set_flashdata('sukses','Record Saved Successfully');
            redirect('dept');        
}


}
?>