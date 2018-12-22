<?php
class dept_model extends CI_Model{
    public function getRecords(){
        $qry=$this->db->get('dept');
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
    public function saveRecord($data){
      return $this->db->insert('dept', $data);
    }
    public function updaterecord($id,$data){
        return $this->db->where('iddept',$id)->update('dept',$data);
    }
    public function deleterecord($id){
        return $this->db->delete('dept',array('iddept'=>$id));
    }
}
?>