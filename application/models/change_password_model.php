<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of change_password_model
 *
 * @author suman0359
 */
class Change_Password_Model extends CI_Model {

    public function check_exist_password($admin_id, $old_password) {
        $this->db->select('*');
        $this->db->from('tbl_administrator_user');
        $this->db->where('admin_id', $admin_id);
        $this->db->where('admin_password', md5($old_password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function check_exist_user_password($user_id, $old_password) {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('user_id', $user_id);
        $this->db->where('user_password', md5($old_password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_password($admin_id, $new_password) {
        $this->db->set('admin_password', md5($new_password));
        $this->db->where('admin_id', $admin_id);
        $this->db->update('tbl_administrator_user');
    }
    
    public function update_user_password($user_id, $new_password) {
        $this->db->set('user_password', md5($new_password));
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_users');
    }

}
