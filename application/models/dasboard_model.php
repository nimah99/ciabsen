<?php
class dasboard_model extends CI_Model{
    public function getNIK($id){
         $data=$this->db->query("SELECT profil.nik as value,profil.nik,profil.name,profil.tmpt_lahir,profil.tgl_lahir,profil.gender,profil.alamat,profil.foto,jabatan.jabatan,dept.department FROM profil left join jabatan on profil.idlvl=jabatan.idlvl left join dept on jabatan.iddept=dept.iddept WHERE profil.nik LIKE '%" .$id. "%'")->result();
         return $data;
    }
    public function InsertMasuk($data){
        return $this->db->insert('absensi', $data);
      }
      public function UpdateAbsensi($idabsen,$data){
        return $this->db->where('idabsen',$idabsen)->update('absensi',$data);
    }
    public function getRecords(){
        $qry=$this->db->query("SELECT absensi.idabsen,profil.nik,profil.name,absensi.masuk,profil.foto FROM profil left join absensi on profil.nik=absensi.nik WHERE absensi.status='0'");
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
}
?>