<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_login_model
 *
 * @author Tasfir
 */
class User_Login_Model extends CI_Model {

    //put your code here
    public function check_login_info($user_username, $user_password) {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('user_name', $user_username);
        $this->db->where('user_password', md5($user_password));
        $this->db->where('user_status', 1);
        $this->db->where('user_category', 'user');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function forget_password($email) {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('user_email_address', $email);
        $this->db->where('user_status', 1);
        $this->db->where('user_category', 'user');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

}

?>