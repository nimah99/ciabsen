<?php
class lvl_model extends CI_Model{
    public function getRecords(){
        $qry=$this->db->get('jabatan');
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
    public function saveRecord($data){
      return $this->db->insert('jabatan', $data);
    }
    public function updaterecord($id,$data){
        return $this->db->where('idlvl',$id)->update('jabatan',$data);
    }
    public function deleterecord($id){
        return $this->db->delete('jabatan',array('idlvl'=>$id));
    }
}
?>