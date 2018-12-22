<?php
class kerja_model extends CI_Model{
    public function getRecords(){
        $qry=$this->db->get('jam_kerja');
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
    public function saveRecord($data){
      return $this->db->insert('jam_kerja', $data);
    }
    public function updaterecord($id,$data){
        return $this->db->where('idkerja',$id)->update('jam_kerja',$data);
    }
    public function deleterecord($id){
        return $this->db->delete('jam_kerja',array('idkerja'=>$id));
    }
}
?>