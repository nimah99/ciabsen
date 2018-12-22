<?php
class absensi_model extends CI_Model{
    public function getRecords(){
        $this->db->where('status','1');
        $qry=$this->db->get('absensi');
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
    public function cariRecord($data){
          $this->db->where('tanggal >=',$data["dari"]);
          $this->db->where('tanggal <=',$data["sampai"]);
        $qry= $this->db->get('absensi');
          if($qry->num_rows()>0){
             return $qry->result();
          } 
    }
  
    public function deleterecord($id){
        return $this->db->delete('absensi',array('idabsen'=>$id));
    }
}
?>