<?php
class user_model extends CI_Model{
    public function getRecords(){
        $qry=$this->db->get('u');
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
    public function saveRecord($data){
      return $this->db->insert('u', $data);
    }
    public function updaterecord($id,$data){
        return $this->db->where('email',$id)->update('u',$data);
    }
    public function deleterecord($id){
        return $this->db->delete('u',array('email'=>$id));
    }
}
?>