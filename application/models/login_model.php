<?php
class login_model extends CI_Model{
    public function getRecords($data){
        $this->db->where('email', $data);
        $qry= $this->db->get('u');
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }

    public function isLoggedIn() {
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $is_logged_in = $this->session->userdata('user');

        if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
            redirect('login');
            exit;
        }
    }
}
?>