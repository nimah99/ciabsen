<?php
	date_default_timezone_set('Asia/Jakarta');

function tgl($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getBulan($bln){
	switch ($bln){
		case 1: return "Januari";break;
		case 2: return "Februari";break;
		case 3: return "Maret";break;
		case 4: return "April";break;
		case 5: return "Mei";break;
		case 6: return "Juni";break;
		case 7: return "Juli";break;
		case 8: return "Agustus";break;
		case 9: return "September";break;
		case 10: return "Oktober";break;
		case 11: return "Nopember";break;
		case 12: return "Desember";break;
	}
}
function gender($gender){
	switch ($gender){
		case '1': return "Wanita";break;
		case '2': return "Pria";break;
	}
}
function religion($religion){
	switch ($religion){
		case '1': return "Budha";break;
		case '2': return "Hindu";break;
		case '3': return "Islam";break;
		case '4': return "Katholik";break;
		case '5': return "Kristen";break;
	}
}


$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

?>