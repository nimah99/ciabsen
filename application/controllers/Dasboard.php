<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dasboard extends CI_Controller{
     function __construct(){
		parent::__construct();
        $this->load->helper('url');
        if(  $this->session->userdata('user')!=TRUE){
            redirect('login');
        }
    }
    public function index(){
        $this->load->view('home');
        $this->load->model('dasboard_model');
        $records=$this->dasboard_model->getRecords();
        $this->load->view('dasboard',['records'=>$records]); 
    }
    public function masuk(){
        date_default_timezone_set('Asia/Jakarta');
        $data=$this->db->query("SELECT mulai_masuk,lambat_masuk FROM jam_kerja")->result();
        $waktu=array();
         foreach($data as $rs){
             $waktu[]=array(
                 "masuk"=>$rs->mulai_masuk,
                 "lambat"=>$rs->lambat_masuk
             );
         }
            $d1=$rs->mulai_masuk;
            $d2=date('H:i:s');
            $d3=$rs->lambat_masuk;
            list($hour,$minut,$detik)=explode(':',$d1);
            $startTimestamp=mktime($hour,$minut,$detik);
            list($hour,$minut,$detik)=explode(':',$d2);
            $endTimestamp=mktime($hour,$minut,$detik);
            $second=$endTimestamp-$startTimestamp;
            $minut=($second / 60 )% 3600;
                if ($minut>$d3){
                    $keterangan='Terlambat';
                }else{
                    $keterangan='Tepat';
                }
                  $tgl=Date('Ymd');
                $nik=$_POST['nik'];
          $data=array(
            "idabsen"=>$tgl.$nik,
            "tanggal"=>Date('Y-m-d'),
            "nik"=>$nik,
            "masuk"=>Date('Y-m-d H:i:s'),
            "keterangan"=>$keterangan,
            "lembur"=>'0',
            "status"=>'0'
        );
      $this->load->model('dasboard_model');
    $record=$this->dasboard_model->InsertMasuk($data);    
    if($record){
    $this->session->set_flashdata('sukses','Absensi Berhasil');
    redirect('dasboard'); 
    }else{
        $this->session->set_flashdata('error','Absensi Gagal');
        redirect('dasboard'); 
    }
}
    public function carijson(){
        require_once(APPPATH.'libraries/fungsi_indotgl.php');
        $id=$this->input->get('term');
    $this->load->model('dasboard_model');
    $record=$this->dasboard_model->getNIK($id);
    $staff=array();
         foreach($record as $rs){
             $staff[]=array(
                 "value"=>$rs->nik,
                 "nik"=>$rs->nik,
                 "name"=>$rs->name,
                 "tmpt_lahir"=>$rs->tmpt_lahir,
                 "tgl_lahir"=>tgl($rs->tgl_lahir),
                 "gender"=>gender($rs->gender),
                 "alamat"=>$rs->alamat,
                 "foto"=>$rs->foto,
                 "jabatan"=>$rs->jabatan,
                 "department"=>$rs->department
             );
         } 
         echo json_encode($staff);
    }

    public function selesaiKerja($idabsen){
        date_default_timezone_set('Asia/Jakarta');
        $data=$this->db->query("SELECT boleh_pulang,lambat_pulang FROM jam_kerja")->result();
        $waktu=array();
         foreach($data as $rs){
             $waktu[]=array(
                 "boleh"=>$rs->boleh_pulang,
                 "lambat_boleh"=>$rs->lambat_pulang
             );
         }
            $d1=$rs->lambat_pulang;
            $d2=date('H:i:s');
            $d3=$rs->boleh_pulang;
             list($hour,$minut,$detik)=explode(':',$d3);
            $startTimestamp=mktime($hour,$minut,$detik);
            list($hour,$minut,$detik)=explode(':',$d2);
            $endTimestamp=mktime($hour,$minut,$detik);
            $second=$endTimestamp-$startTimestamp;
            $minut=($second / 60 )% 3600;
            $itung=$minut-$d1;
            $lembur=($itung/60)% 3600;
            if ($lembur<0){
                $lembur='0';
            }
           $data=array(
            "pulang"=>Date('Y-m-d H:i:s'),
            "lembur"=>$lembur,
            "status"=>'1'
        );
      $this->load->model('dasboard_model');
    $this->dasboard_model->UpdateAbsensi($idabsen,$data);    
      redirect('dasboard'); 
}
}
?>