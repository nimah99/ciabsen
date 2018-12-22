<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->view('home');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
    }
    public function index(){
        $this->load->model('user_model');
        $records=$this->user_model->getRecords();
        $this->load->view('users',['records'=>$records]);
    }
    public function delete($id){
        $this->load->model('user_model');
        $record=$this->user_model->deleterecord($id);
        $this->session->set_flashdata('sukses', 'Data User Berhasil Dihapus');
		redirect('users'); 
    }
    public function update($id){
        require_once(APPPATH.'libraries/password.php');
        $pwd=$_POST['password'];
$password=password_hash($pwd, PASSWORD_DEFAULT,['cost'=>12]);
            if ($password){
                $data=array(
                    "password"=>$password
                );
        $this->load->model('user_model');
        $record=$this->user_model->updaterecord($id,$data);
        $this->session->set_flashdata('sukses', 'Data User Berhasil Diubah');
        redirect('users');
            }else{
                $this->session->set_flashdata('error','Gagal Edit Password');
            }
    }

    public function add(){
        require_once(APPPATH.'libraries/password.php');
        $pwd=$_POST['password'];
$password=password_hash($pwd, PASSWORD_DEFAULT,['cost'=>12]);
            if ($password){

                $data=array(
                    "email"=>$_POST['email'],
                    "password"=>$password,
                    "level"=>$_POST['level'],
                    "created"=> Date('Y-m-d'),
                    "status"=> 1
             );  
             $this->load->model('user_model');
             $this->user_model->saveRecord($data);
             $this->session->set_flashdata('sukses','Record Saved Successfully');
            redirect('users');        
        }else{
            $this->session->set_flashdata('error','Error');
        }
}


}
?>