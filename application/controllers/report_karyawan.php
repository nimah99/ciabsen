<?php defined('BASEPATH') OR exit('No direct script access allowed');
class report_karyawan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }
     function index(){
        
$pdf=new FPDF('L','cm','A4');		
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
        $pdf->Image('assets/img/sclogo.png',3.6,1,2);
        $pdf->SetTextColor(0);
		$pdf->SetFont('Arial','B','12');
		$pdf->Cell(14,1,'SEBUAH CHANNEL',0,0,'C');
		$pdf->Ln($h=0.4);
		$pdf->SetFont('Arial','','9');
		$pdf->Cell(16.4,1,'Sistem Absensi Karyawan - Sebuah Channel',0,0,'C');
		$pdf->Ln($h=0.4);
		$pdf->Line(3.5,3.1,26.4,3.1);
		$pdf->SetLineWidth(0.1);
		$pdf->Line(3.5,3.1,26.4,3.1);
		$pdf->SetLineWidth(0);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','BU','14');
		$pdf->Cell(29,1,'Data Karyawan',0,0,'C');
		$pdf->Ln($h=1.5);
		$pdf->SetFont('Arial','B','9');
		$pdf->SetFillColor(255,0,0);
		$pdf->SetLineWidth(0.01);
		$pdf->SetDrawColor(255,0,0);
		$pdf->SetTextColor(255);
		$pdf->Cell(2.4);
		//$this->Cell(1,0.5,'No','LTB',0,'C',1);
		$pdf->Cell(2,0.5,'NIK','LTB',0,'C',1);		
		$pdf->Cell(3,0.5,'Nama','LTB',0,'C',1);
		$pdf->Cell(2.5,0.5,'Tempat L.','LTB',0,'C',1);
		$pdf->Cell(2,0.5,'Tgl. L.','LTB',0,'C',1);
		$pdf->Cell(1.5,0.5,'Gender','LTB',0,'C',1);
		$pdf->Cell(2,0.5,'Agama','LTB',0,'C',1);
		$pdf->Cell(2.5,0.5,'Kontak','LTB',0,'C',1);
		$pdf->Cell(2.5,0.5,'Jabatan','LRTB',0,'C',1);
		$pdf->Cell(5,0.5,'Alamat','LRTB',0,'C',1);
        $pdf->Ln();	
$pdf->SetFont('Arial','','8');
$pdf->SetTextColor(0);
//$pdf->SetFillColor(225,225,225);
$pdf->SetLineWidth(0.01);
$pdf->SetDrawColor(255,0,0);
$data=$this->db->query("SELECT profil.nik,profil.name,profil.tmpt_lahir,profil.tgl_lahir,profil.gender,profil.religion,profil.telp,profil.alamat,jabatan.jabatan FROM profil left join jabatan on profil.idlvl=jabatan.idlvl")->result();
foreach ($data as $row){
	$pdf->Cell(2.4);
	//$pdf->Cell(1,0.5,$j+1,'LB',0,'C', $fill);
	$pdf->Cell(2,0.5,$row->nik,'LB',0,'C');
	$pdf->Cell(3,0.5,$row->name,'LB',0,'L');
	$pdf->Cell(2.5,0.5,$row->tmpt_lahir,'LB',0,'C');
	$pdf->Cell(2,0.5,$row->tgl_lahir,'LB',0,'C');
	$pdf->Cell(1.5,0.5,$row->gender,'LB',0,'C');
	$pdf->Cell(2,0.5,$row->religion,'LB',0,'C');
	$pdf->Cell(2.5,0.5,$row->telp,'LB',0,'C');
	$pdf->Cell(2.5,0.5,$row->jabatan,'LRB',0,'C');
	$pdf->Cell(5,0.5,$row->alamat,'LRB',0,'L');
$pdf->Ln();
}
$pdf->Output($name='data-karyawan.pdf',$dest='I');
    } 
   
}
?>