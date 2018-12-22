<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
    }
    public function index(){
        $this->load->view('login');
    }
    public function logout(){
        $this->session->sess_destroy();
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        redirect('login' ,'refresh');
        exit;
    }

    public function masuk(){
        require_once(APPPATH.'libraries/password.php');
        $pwd=$_POST['password']; 
        $email=$_POST['email'];
         $this->load->model('login_model');
        $record=$this->login_model->getRecords($email);
        if($record>0){
           foreach($record as $rs){$password=$rs->password;  $lvl=$rs->level;}
           $key=password_verify($pwd,$password);
           if($key){
                $this->session->set_userdata('user',$email);
                $this->session->set_userdata('role',$lvl);
                redirect('dasboard'); 
            }else{
                $this->session->set_flashdata('error','Password tidak sesuai, Coba Lagi');
                redirect('login');}
        }else{
            $this->session->set_flashdata('error','Username tidak terdaftar');
            redirect('login');
        }      
    }
}
?>