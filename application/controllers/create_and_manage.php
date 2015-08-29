<?php

class Create_And_Manage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_admin_id = $this->session->userdata('admin_id');
        $user_id=$this->session->userdata('user_id');
        if ($user_admin_id == NULL && $user_id == NULL) {
            $security_msg = array();
            $security_msg['message'] = "Please Login First";
            $this->session->set_userdata($security_msg);

            redirect('admin_login');
        }
    }

    public function create_new_menu() {
        $data = array();
        
        $menu_id = $this->input->post('menu_id', TRUE);
        
        $word = $data['menu_name'] = $this->input->post('menu_name', true);
        $data['menu_link'] = underscore($word);
        $data['menu_dropdown'] = $this->input->post('menu_dropdown', true);
        $data['menu_widget_order'] = $this->input->post('menu_widget_order', true);
        $data['menu_category'] = $this->input->post('menu_category', true);
        $data['menu_serial'] = $this->input->post('menu_serial', TRUE);
        $data['menu_status'] = $this->input->post('menu_status', true);

        $this->super_admin_model->show_all_category();

        $this->create_and_manage_model->save_menu_info($data);

        $sdata = array();
        $sdata['successfull'] = "Successfully Create a New Menu";
        $this->session->set_userdata($sdata);
        
        redirect($url);
    }

    public function edit_menu_info($menu_id) {
        $edit_menu = array();
        $edit_menu['menu_info'] = $this->create_and_manage_model->edit_menu_info($menu_id);
        $edit_menu['view_menus'] = $this->super_admin_model->show_all_menus();
        $edit_menu['view_category'] = $this->super_admin_model->show_all_category();
        $edit_menu['content'] = $this->load->view('admin/includes_file/edit_menu_info', $edit_menu, true);

        $this->session->set_userdata($menu_id);

        $this->load->view('admin/admin_master', $edit_menu);
    }

    public function update_menu_info() {
        $data = array();
        $menu_id = $this->input->post('menu_id', TRUE);
        $word = $data['menu_name'] = $this->input->post('menu_name', true);
        $data['menu_link'] = underscore($word);
        $data['menu_dropdown'] = $this->input->post('menu_dropdown', true);
        $data['menu_widget_order'] = $this->input->post('menu_widget_order', true);
        $data['menu_category'] = $this->input->post('menu_category', true);
        $data['menu_serial'] = $this->input->post('menu_serial', TRUE);
        $data['menu_status'] = $this->input->post('menu_status', true);

        $this->create_and_manage_model->update_menu_info($data, $menu_id);

        $message_data = array();
        $message_data['successfull'] = "Updated This User Info Successfully!";
        $this->session->set_userdata($message_data);
        redirect('super_admin/create_new_menu');
    }

    public function published_menu_status($menu_id) {
        $this->create_and_manage_model->published_menu_status_by_menu_id($menu_id);
        redirect('super_admin/create_new_menu');
    }

    public function unpublished_menu_status($menu_id) {
        $this->create_and_manage_model->unpublished_menu_status_by_menu_id($menu_id);
        redirect('super_admin/create_new_menu');
    }

    public function delete_menu_info($menu_id) {
        $this->create_and_manage_model->delete_menu_info($menu_id);
        redirect('super_admin/create_new_menu');
    }

    public function save_category() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['category_status'] = $this->input->post('category_status', true);
        //$data['create_date_time']=$this->input->post(date_default_timezone_set($timezone_identifier));
        $data['create_user_name'] = $this->input->post('creator_name', true);
        $this->create_and_manage_model->save_category_info($data);
        $sdata = array();
        $sdata['message'] = 'Save category Information Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/create_new_category');
    }

    public function edit_category_info($category_id) {
        $edit_category = array();
        $edit_category['category_info'] = $this->create_and_manage_model->edit_category_info($category_id);
        $edit_category['content'] = $this->load->view('admin/includes_file/edit_category_info', $edit_category, true);

        $this->session->set_userdata($category_id);

        $this->load->view('admin/admin_master', $edit_category);
    }

    public function update_category_info() {
        $data = array();
        $category_id = $this->input->post('category_id', TRUE);
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['category_status'] = $this->input->post('category_status', true);
        $data['create_user_name'] = $this->input->post('creator_name', true);

        $this->create_and_manage_model->update_category_info($data, $category_id);

        $message_data = array();
        $message_data['successfull'] = "Updated This Category Info Successfully!";
        $this->session->set_userdata($message_data);
        redirect('super_admin/create_new_category');
    }

    public function save_blog_post() {
        $data = array();
        
        $url=$this->input->post('this_url_link', TRUE);
        
        $data['blog_title'] = $this->input->post('blog_title', TRUE);
        $data['blog_description'] = $this->input->post('blog_description', TRUE);
        $data['blog_category_id'] = $this->input->post('blog_category_id', TRUE);
        $data['blog_menu_link'] = $this->input->post('blog_menu_link', TRUE);
        $data['blog_picture'] = $this->input->post('blog_picture', TRUE);
        $data['blog_creator_user_id'] = $this->input->post('blog_creator_user_id', TRUE);
        $data['blog_publication_status'] = $this->input->post('blog_publication_status', TRUE);

        /*
         * -------Start Profile Image Upload-------------
         */

        $config['upload_path'] = 'images/post_picture/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('blog_picture')) {
            $error = $this->upload->display_errors();
        } else {
            $fdata = $this->upload->data();

            $data['blog_picture'] = $config['upload_path'] . $fdata['file_name'];
        }

        /*
         * --------End Profile Image Upload----------------
         */


        $this->create_and_manage_model->save_blog_post($data);

        $message_data = array();
        $message_data['successfull'] = 'Save a New Blog Post Successfully !';
        $this->session->set_userdata($message_data);
        redirect($url);
    }

    public function update_blog_post() {
        $data = array();
        $blog_id = $this->input->post('blog_id', TRUE);

        $data['blog_title'] = $this->input->post('blog_title', TRUE);
        $data['blog_description'] = $this->input->post('blog_description', TRUE);
        $data['blog_menu_link'] = $this->input->post('blog_menu_link', TRUE);
        $data['blog_category_id'] = $this->input->post('blog_category_id', TRUE);
        //$data['blog_picture']=$this->input->post('blog_picture', TRUE);
        $data['blog_creator_user_id'] = $this->input->post('blog_creator_user_id', TRUE);
        $data['blog_publication_status'] = $this->input->post('blog_publication_status', TRUE);

        //$data['content']=$this->load->view('admin/includes_file/edit_blog_post', $data, TRUE);

        /*
         * -------Start Profile Image Upload-------------
         */

//         echo '<pre>';
//          print_r($_POST);
//          echo '<pre>';
//          print_r($_FILES);
//
//          exit(); 

        $config['upload_path'] = 'images/post_picture/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('blog_picture')) {
            $error = $this->upload->display_errors();
            /* echo '<pre>';
              print_r($error);
              exit(); */
        } else {
            $fdata = $this->upload->data();
            /* echo '<pre>';
              print_r($fdata);
              exit(); */
            $data['blog_picture'] = $config['upload_path'] . $fdata['file_name'];
        }
//
//        /*
//         * --------End Profile Image Upload----------------
//         */


        $this->create_and_manage_model->update_blog_post($data, $blog_id);

        $message_data = array();
        $message_data['successfull'] = 'Update The Selected Blog Post Successfully !';
        $this->session->set_userdata($message_data);
        redirect('super_admin/view_all_article');
    }

    public function update_blog_image() {
        $data = array();

        $blog_id = $data['blog_id'] = $this->input->post('blog_id', TRUE);
        $data['blog_picture'] = $this->input->post('blog_picture', TRUE);
        //$data['blog_thumbs_picture']=$this->input->post('blog_picture', TRUE);


        /*
         * -------Start Profile Image Upload-------------
         */

        $config['upload_path'] = 'images/post_picture/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'images/post_picture/thumbs.jpg';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 75;
        $config['height'] = 50;
        //$config['file_name'] = time();

        $filename = $_FILES['blog_picture'];

//        echo '<pre>';
//        print_r($data);
//        print_r($filename['name']);
//        exit();

        $error = array();
        $fdata = array();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('blog_picture')) {
            $error = $this->upload->display_errors();
        } else {

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
            $fdata = $this->upload->data();

            $data['blog_picture'] = $config['upload_path'] . $fdata['file_name'];
        }
//
//        /*
//         * --------End Profile Image Upload----------------
//         */



        $this->create_and_manage_model->update_blog_post($data, $blog_id);

        $message_data = array();
        $message_data['successfull'] = 'Update The Selected Blog Post Successfully !';
        $this->session->set_userdata($message_data);
        redirect('super_admin/view_all_article');
    }

    public function delete_blog_post($blog_id) {
    	//$image_link=$this->create_and_manage_model->get_blog_picture_link($blog_id);
	//@$link=$image_link->blog_picture;
	
	//@unlink('/home/physiohe/public_html/'.$link);
	
        $this->create_and_manage_model->delete_blog_post($blog_id);
        redirect('super_admin/view_all_article');
    }

    public function published_blog_post_by_blog_id($blog_id) {
        $this->create_and_manage_model->published_blog_post_by_blog_id($blog_id);
        redirect('super_admin/view_all_article');
    }

    public function unpublished_blog_post_by_blog_id($blog_id) {
        $this->create_and_manage_model->unpublished_blog_post_by_blog_id($blog_id);
        redirect('super_admin/view_all_article');
    }

    public function slide_yes_by_blog_id($blog_id) {
        $this->create_and_manage_model->slide_yes_by_blog_id($blog_id);
        redirect('super_admin/view_all_article');
    }

    public function slide_no_by_blog_id($blog_id) {
        $this->create_and_manage_model->slide_no_by_blog_id($blog_id);
        redirect('super_admin/view_all_article');
    }

    public function create_new_user() {
        $data = array();
        $data['admin_user_name'] = $this->input->post('admin_user_name', TRUE);
        $data['admin_first_name'] = $this->input->post('admin_first_name', TRUE);
        $data['admin_last_name'] = $this->input->post('admin_last_name', TRUE);
        $data['admin_email_address'] = $this->input->post('admin_email_address', TRUE);
        $data['admin_password'] = md5($this->input->post('admin_password', TRUE));
        $data['admin_mobile_no'] = $this->input->post('mobile_no', TRUE);
        $data['admin_date_of_birth'] = $this->input->post('user_date_of_birth', TRUE);
        $data['admin_gender'] = $this->input->post('admin_gender', TRUE);
        $data['admin_mailing_address'] = $this->input->post('admin_mailing_address', TRUE);
        $data['admin_category'] = $this->input->post('admin_category', TRUE);
        $data['admin_country'] = $this->input->post('admin_country', TRUE);
        $data['profile_image'] = $this->input->post('profile_image', TRUE);
        //$data['admin_create_date_and_time']=$this->input->post('', TRUE);
        $data['admin_users_status'] = $this->input->post('admin_users_status', TRUE);

        /*
         * -------Start Profile Image Upload-------------
         */

        /* echo '<pre>';
          print_r($_POST);
          echo '<pre>';
          print_r($_FILES);

          exit(); */

        $config['upload_path'] = 'images/profile_picture/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = $this->upload->display_errors();
            /* echo '<pre>';
              print_r($error);
              exit(); */
        } else {
            $fdata = $this->upload->data();
            /* echo '<pre>';
              print_r($fdata);
              exit(); */
            $data['profile_image'] = $config['upload_path'] . $fdata['file_name'];
        }

        /*
         * --------End Profile Image Upload----------------
         */

        $this->create_and_manage_model->create_new_user_info($data);

        $message_data = array();
        $message_data['successfull'] = "Create a New User Successfully";
        $this->session->set_userdata($message_data);
        redirect('super_admin/create_new_user');
    }

    public function edit_user_info($admin_id) {
        $edit_user = array();
        $edit_user['user_info'] = $this->create_and_manage_model->edit_user_info($admin_id);
        $edit_user['content'] = $this->load->view('admin/includes_file/edit_user_info', $edit_user, true);

        $this->session->set_userdata($admin_id);

        $this->load->view('admin/admin_master', $edit_user);
    }

    public function update_user_info() {
        /* echo '<pre>';
          print_r($_POST);
          echo '<pre>';
          print_r($_FILES);

          exit(); */
        $data = array();
        $admin_id = $this->input->post('admin_id', TRUE);
        $data['admin_user_name'] = $this->input->post('admin_user_name', TRUE);
        $data['admin_first_name'] = $this->input->post('admin_first_name', TRUE);
        $data['admin_last_name'] = $this->input->post('admin_last_name', TRUE);
        $data['admin_email_address'] = $this->input->post('admin_email_address', TRUE);
        $data['admin_password'] = md5($this->input->post('admin_password', TRUE));
        $data['admin_mobile_no'] = $this->input->post('mobile_no', TRUE);
        $data['admin_date_of_birth'] = $this->input->post('user_date_of_birth', TRUE);
        $data['admin_gender'] = $this->input->post('admin_gender', TRUE);
        $data['admin_mailing_address'] = $this->input->post('admin_mailing_address', TRUE);
        $data['admin_category'] = $this->input->post('admin_category', TRUE);
        $data['admin_country'] = $this->input->post('admin_country', TRUE);
        $data['profile_image'] = $this->input->post('profile_image', TRUE);
        //$data['admin_create_date_and_time']=$this->input->post('', TRUE);
        $data['admin_users_status'] = $this->input->post('admin_users_status', TRUE);

        $this->create_and_manage_model->update_user_info($data, $admin_id);

        $message_data = array();
        $message_data['successfull'] = "Updated This Menu Info Successfully!";
        $this->session->set_userdata($message_data);
        redirect('super_admin/create_new_menu');
    }

    public function delete_user_info($admin_id) {
        $this->create_and_manage_model->delete_user_info($admin_id);
        redirect('super_admin/create_new_user');
    }

    public function published_user_status($admin_id) {
        $this->create_and_manage_model->published_user_status_by_admin_id($admin_id);
        redirect('super_admin/create_new_user');
    }

    public function unpublished_user_status($admin_id) {
        $this->create_and_manage_model->unpublished_user_status_by_admin_id($admin_id);
        redirect('super_admin/create_new_user');
    }

}