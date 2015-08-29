<?php
class User_Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('change_password_model');
    }
    
    public function check_user_login(){
        $user_username= $this->input->post('user_username',true);
        $user_password= $this->input->post('user_password',true);
        
        $result=$this->user_login_model->check_login_info($user_username, $user_password);
        $login_msg=array();
         if($result){
            $login_msg['user_id']=$result->user_id;
            $login_msg['user_username']=$result->user_name;
            $login_msg['user_first_name']=$result->user_first_name;
            $login_msg['user_last_name']=$result->user_last_name;
            $this->session->set_userdata($login_msg);
            redirect('welcome');
        }else{
            $login_msg['message']="You Enter Wrong Username Or Password";
            $this->session->set_userdata($login_msg);
            redirect('welcome');
        }
    }
    
    public function create_new_user(){
        $data=array();
        $data['user_name']=$this->input->post('user_name', TRUE);
        $data['user_first_name']=$this->input->post('user_first_name', TRUE);
        $data['user_last_name']=$this->input->post('user_last_name', TRUE);
        $data['user_email_address']=$this->input->post('user_email_address', TRUE);
        $data['user_password']=  md5($this->input->post('user_password', TRUE));
        $data['user_gender']=$this->input->post('user_gender', TRUE);
        $data['user_date_of_birth']=$this->input->post('user_date_of_birth', TRUE);
        $data['user_country']=$this->input->post('user_country', TRUE);
        $data['user_mailing_address']=$this->input->post('user_mailing_address', TRUE);
        //$data['user_profile_image']=$this->input->post('user_profile_image', TRUE);
        
        $this->create_and_manage_model->create_new_user($data);
        
        $message_data = array();
        $message_data['successfull'] = "Create a New User Successfully";
        $this->session->set_userdata($message_data);
        redirect('welcome');
    }
    
    public function update_password() {
        $data = array();
        $user_id = $this->input->post('user_id', TRUE);
        $old_password = $this->input->post('old_password', true);
        $new_password = $this->input->post('new_password', true);
        $confirm_password = $this->input->post('confirm_password', true);

        $check_password = $this->change_password_model->check_exist_user_password($user_id, $old_password);

        $pass_msg = array();
        if ($check_password != NULL) {
            
            if ($new_password == $confirm_password && $new_password!=NULL) {
                $this->change_password_model->update_user_password($user_id, $new_password);
            } else {
                $login_msg['message'] = "Your NEW And OLD Password Doesn't Match";
                $this->session->set_userdata($login_msg);
                redirect('user_dashboard/change_password');
            }
            $login_msg['message'] = "Your New Password is Successfully Changed";
            $this->session->set_userdata($login_msg);
            redirect('user_dashboard/change_password');
        } else {
            $login_msg['message'] = "your Old Password Doesn't Match";
            $this->session->set_userdata($login_msg);
            redirect('user_dashboard/change_password');
        }

    }
    
    public function forget_password() {

        $email = $this->input->post('user_email_address', TRUE);

        $result = $this->user_login_model->forget_password($email);
        if ($result != NULL) {
            
            $user_email_address= $this->input->post('user_email_address', TRUE);
            $message_data = array();
            $message_data['message'] ="Please check inbox your Email Address or Spam folder";

            $this->load->library("email");
            $this->email->from("admin@physiohealthrs.com");
            $this->email->to($user_email_address);
            $this->email->subject("Just For Test  Email");
            $this->email->message($result->user_password);

            $this->email->send();
            //echo $this->email->print_debugger();

            $this->session->set_userdata($message_data);
            redirect('welcome');
        } else {
            $message_data = array();
            $message_data['message'] = "Your Email Address Not Found";
            $this->session->set_userdata($message_data);
            redirect('welcome');
        }
    }
    
     public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_username');
        $this->session->unset_userdata('user_first_name');
        $this->session->unset_userdata('user_last_name');
        $logout_msg = array();
        $logout_msg['message'] = "You are Successfully Loged out";
        $this->session->set_userdata($logout_msg);
        redirect('welcome', 'refresh');
    }
    
}
?>