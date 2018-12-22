<?php
class first_model extends CI_Model{
    public function getRecords(){
        $qry=$this->db->query("SELECT profil.*,jabatan.jabatan FROM profil left join jabatan on profil.idlvl=jabatan.idlvl");
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
    public function saveRecord($data){
      return $this->db->insert('profil', $data);
    }
    public function updaterecord($id,$data){
        return $this->db->where('nik',$id)->update('profil',$data);
    }
    public function deleterecord($id){
        return $this->db->delete('profil',array('nik'=>$id));
    }
}
?>