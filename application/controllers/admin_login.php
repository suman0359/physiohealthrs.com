<?php
session_start();
class Admin_Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $user_admin_id=$this->session->userdata('admin_id');
        if($user_admin_id!=NULL){
            redirect('super_admin', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('admin/login');
    }
    public function check_admin_login(){
        $user_admin_username=  $this->input->post('user_admin_username',true);
        $user_admin_password= $this->input->post('user_admin_password',true);
        $result=$this->admin_login_model->check_login_info($user_admin_username, $user_admin_password);
        $login_msg=array();
        if($result){
            $login_msg['admin_id']=$result->admin_id;
            $login_msg['admin_username']=$result->admin_user_name;
            $this->session->set_userdata($login_msg);
            redirect('super_admin');
        }else{
            $login_msg['message']="You Enter Wrong Username Or Password";
            $this->session->set_userdata($login_msg);
            redirect('admin_login');
        }
    }

}
?>