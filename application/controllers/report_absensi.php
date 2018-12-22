<?php defined('BASEPATH') OR exit('No direct script access allowed');
class report_absensi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }
     function index(){
        
$pdf=new FPDF('P','cm','A4');		
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
        $pdf->Image('assets/img/sclogo.png',3,1,2);
        $pdf->SetTextColor(0);
		$pdf->SetFont('Arial','B','12');
		$pdf->Cell(13.4,1,'SEBUAH CHANNEL',0,0,'C');
		$pdf->Ln($h=0.4);
		$pdf->SetFont('Arial','','9');
		$pdf->Cell(15.8,1,'Sistem Absensi Karyawan - Sebuah Channel',0,0,'C');
		$pdf->Ln($h=0.4);
		$pdf->Line(3,3.1,18.3,3.1);
		$pdf->SetLineWidth(0.1);
		$pdf->Line(3,3.1,18.3,3.1);
		$pdf->SetLineWidth(0);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','BU','14');
		$pdf->Cell(19,1,'Data Absensi',0,0,'C');
		$pdf->Ln($h=1.5);
		$pdf->SetFont('Arial','B','9');
		$pdf->SetFillColor(255,0,0);
		$pdf->SetLineWidth(0.01);
		$pdf->SetDrawColor(255,0,0);
		$pdf->SetTextColor(255);
		$pdf->Cell(1.8);
		//$this->Cell(1,0.5,'No','LTB',0,'C',1);
		$pdf->Cell(2,0.5,'NIK','LTB',0,'C',1);		
		$pdf->Cell(3,0.5,'Nama','LTB',0,'C',1);
		$pdf->Cell(3,0.5,'Masuk','LTB',0,'C',1);
		$pdf->Cell(3,0.5,'Pulang','LTB',0,'C',1);
		$pdf->Cell(1.5,0.5,'Lembur','LTB',0,'C',1);
		$pdf->Cell(3,0.5,'Keterangan','LRTB',0,'C',1);
        $pdf->Ln();	
$pdf->SetFont('Arial','','8');
$pdf->SetTextColor(0);
//$pdf->SetFillColor(225,225,225);
$pdf->SetLineWidth(0.01);
$pdf->SetDrawColor(255,0,0);
$data=$this->db->query("SELECT absensi.nik,profil.name,absensi.masuk,absensi.pulang,absensi.lembur,absensi.keterangan FROM absensi left join profil on absensi.nik=profil.nik WHERE absensi.status='1'")->result();
foreach ($data as $row){
	$pdf->Cell(1.8);
	//$pdf->Cell(1,0.5,$j+1,'LB',0,'C', $fill);
	$pdf->Cell(2,0.5,$row->nik,'LB',0,'C');
	$pdf->Cell(3,0.5,$row->name,'LB',0,'L');
	$pdf->Cell(3,0.5,$row->masuk,'LB',0,'C');
	$pdf->Cell(3,0.5,$row->pulang,'LB',0,'C');
	$pdf->Cell(1.5,0.5,$row->lembur,'LB',0,'C');
	$pdf->Cell(3,0.5,$row->keterangan,'LRB',0,'L');
$pdf->Ln();
}
$pdf->Output($name='data-absensi.pdf',$dest='I');
    } 
   
}
?>