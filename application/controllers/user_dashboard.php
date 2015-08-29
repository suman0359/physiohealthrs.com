<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_dashboard
 *
 * @author suman0359
 */
class User_Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            $security_msg = array();
            $security_msg['message'] = "Please Login First";
            $this->session->set_userdata($security_msg);

            redirect('welcome');
        }
    }
    
    public function index() {
        $data = array();
        $data['content'] = $this->load->view('user_dashboard/dashboard_content', '', true);
        $this->load->view('user_dashboard/user_dashboard', $data);
    }
    
    public function create_article(){
        $data = array();
        $data['view_category'] = $this->super_admin_model->show_all_category();
        $data['content'] = $this->load->view('user_dashboard/create_article_form', $data, true);
        $this->load->view('user_dashboard/user_dashboard', $data);
    }
    
    public function view_all_article($user_id) {
        $view_article = array();
        $view_article['view_article'] = $this->super_admin_model->view_all_article_for_open_voice($user_id);
        $view_article['content'] = $this->load->view("user_dashboard/view_all_article", $view_article, True);

        $this->load->view('user_dashboard/user_dashboard', $view_article);
    }
    
    public function change_password() {
        $data = array();

        $data['content'] = $this->load->view('user_dashboard/change_password', '', TRUE);

        $this->load->view('user_dashboard/user_dashboard', $data);
    }
}
