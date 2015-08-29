<?php

session_start();

class Super_Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_admin_id = $this->session->userdata('admin_id');
        if ($user_admin_id == NULL) {
            $security_msg = array();
            $security_msg['message'] = "Please Login First";
            $this->session->set_userdata($security_msg);

            redirect('admin_login');
        }
    }

    public function index() {
        $main_data = array();
        $main_data['content'] = $this->load->view('admin/dashboard', '', true);
        $this->load->view('admin/admin_master', $main_data);
    }

    public function create_a_new_post() {
        $post_data = array();
        $post_data['view_category'] = $this->super_admin_model->show_all_category();
        $post_data['menu_info'] = $this->super_admin_model->show_all_menus_by_published();
        $post_data['content'] = $this->load->view('admin/includes_file/create_new_post', $post_data, TRUE);
        $this->load->view('admin/admin_master', $post_data);
    }

    public function view_all_article() {
        $view_article = array();
        $view_article['view_article'] = $this->super_admin_model->view_all_article();
        $view_article['content'] = $this->load->view("admin/includes_file/view_all_article", $view_article, True);

        $this->load->view('admin/admin_master', $view_article);
    }

    public function edit_blog_post($blog_id) {
        $post_data = array();
        $post_data['selected_post'] = $this->super_admin_model->selected_blog_post($blog_id);

        $post_data['view_category'] = $this->super_admin_model->show_all_category();
        $post_data['menu_info'] = $this->super_admin_model->show_all_menus_by_published();
        $post_data['content'] = $this->load->view('admin/includes_file/edit_blog_post', $post_data, TRUE);
        $this->load->view('admin/admin_master', $post_data);
    }

    public function change_blog_post_image($blog_id) {
        $post_data = array();
        $post_data['selected_blog_image'] = $this->super_admin_model->selected_blog_post_image($blog_id);

        $post_data['content'] = $this->load->view('admin/includes_file/change_blog_post_image', $post_data, TRUE);
        $this->load->view('admin/admin_master', $post_data);
    }

    public function create_new_user() {
        $main_data = array();
        $main_data['user_info'] = $this->super_admin_model->show_all_users();
        $main_data['content'] = $this->load->view('admin/includes_file/create_new_user', $main_data, true);
        $this->load->view('admin/admin_master', $main_data);
    }

    public function create_new_menu() {
        $main_data = array();
        $main_data['menu_info'] = $this->super_admin_model->show_all_menus();
        $main_data['view_category'] = $this->super_admin_model->show_all_category();
        $main_data['content'] = $this->load->view('admin/includes_file/create_new_menu', $main_data, true);
        $this->load->view('admin/admin_master', $main_data);
    }

    public function edit_menu_info() {
        $main_data = array();
        $main_data['menu_info'] = $this->super_admin_model->show_all_menus();
        $main_data['content'] = $this->load->view('admin/includes_file/edit_menu_info', '', true);
        $this->load->view('admin/admin_master', $main_data);
    }

    public function create_new_category() {
        $main_data = array();
        $main_data['category_info'] = $this->super_admin_model->show_all_category();
        $main_data['content'] = $this->load->view('admin/includes_file/create_new_category', $main_data, true);
        $this->load->view('admin/admin_master', $main_data);
    }
    
    public function change_password() {
        $data = array();

        $data['content'] = $this->load->view('admin/change_password', '', TRUE);

        $this->load->view('admin/admin_master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');

        $logout_msg = array();
        $logout_msg['message'] = "You are Successfully Loged out";
        $this->session->set_userdata($logout_msg);
        redirect('admin_login', 'refresh');
    }

}

?>