<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Karyawan extends CI_Controller{
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
        $this->load->model('first_model');
        $records=$this->first_model->getRecords();
        $this->load->view('karyawan',['records'=>$records]);
    }
    public function add(){

        $config['upload_path'] = './gambar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
 
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./gambar/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './gambar/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];

                $data=array(
                    "nik"=>$_POST['nik'],
                    "name"=>$_POST['name'],
                    "gender"=>$_POST['gender'],
                    "religion"=>$_POST['religion'],
                    "foto"=>'../gambar/'.$gambar,
                    "idlvl"=>$_POST['idlvl'],
                    "alamat"=>$_POST['alamat'],
                    "tmpt_lahir"=>$_POST['tmpt'],
                    "tgl_lahir"=>$_POST['tgl'],
                    "telp"=>$_POST['telp']
             );  
             $this->load->model('first_model');
             $this->first_model->saveRecord($data);
             $this->session->set_flashdata('sukses','Record Saved Successfully');
            }
            redirect('karyawan');        
        }else{
            $this->session->set_flashdata('error','Error');
        }
}

    public function delete($id){
        $this->load->model('first_model');
        $record=$this->first_model->deleterecord($id);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
		redirect('karyawan'); 
    }
    public function update($id){
        $data=array(
			"name"=>$_POST['name'],
			"gender"=>$_POST['gender'],
			"religion"=>$_POST['religion'],
            "idlvl"=>$_POST['idlvl'],
            "alamat"=>$_POST['alamat'],
            "telp"=>$_POST['telp']
		);
        $this->load->model('first_model');
        $record=$this->first_model->updaterecord($id,$data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
		redirect('karyawan');
    }

    public function insertuser(){
        require_once(APPPATH.'libraries/password.php');
        $pwd=$_POST['password'];
$password=password_hash($pwd, PASSWORD_DEFAULT,['cost'=>12]);
            if ($password){

                $data=array(
                    "email"=>$_POST['email'],
                    "password"=>$password
             );  
             $this->load->model('first_model');
             $this->first_model->saveRecord($data);
             $this->session->set_flashdata('sukses','Record Saved Successfully');
            redirect('karyawan');        
        }else{
            $this->session->set_flashdata('error','Error');
        }
}


}
?>