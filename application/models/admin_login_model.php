<?php
class Admin_Login_Model extends CI_Model {
        public function check_login_info($user_admin_username, $user_admin_password){
        $this->db->select('*');
        $this->db->from('tbl_administrator_user');
        $this->db->where('admin_user_name', $user_admin_username);
        $this->db->where('admin_password', md5($user_admin_password));
        $this->db->where('admin_users_status', 1);
        $query_result= $this->db->get();
        $result=$query_result->row();
        return $result;
}
}
