<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data = array();

        $this->load->library('pagination');  /* Start Pagination from Here */

        $config['base_url'] = base_url() . 'welcome/index';
        $config['total_rows'] = $this->db->count_all('tbl_news_blog');
        $config['display_pages'] = TRUE;
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);  /* End Pagination from Here */


        $data['menu'] = $this->welcome_model->show_dropdown_menu();
        $data['show_post'] = $this->welcome_model->show_all_post_heading($config['per_page'], $this->uri->segment(3));

        /*
         * User Login Information
         */

        $user_id = $this->session->userdata('user_id');
        if ($user_id != NULL) {
            //redirect('super_admin', 'refresh');
            $data['test_value'] = 'You are successfully Login';
            $data['user_id'] = $user_id;
            $data['user_username'] = $this->session->userdata('user_username');
            $data['user_first_name'] = $this->session->userdata('user_first_name');
            $data['user_last_name'] = $this->session->userdata('user_last_name');
            $data['user_welcome'] = $this->load->view('user_welcome', $data, TRUE);
        } else {
            $data['test_value'] = 'You are Not Login';
            $data['login_register'] = $this->load->view('login_register', $data, TRUE);
            $data['user_id'] = $user_id;
        }

        //End User Login Information

        $data['show_menu_name'] = $this->welcome_model->show_menu_name();
        $data['show_right_menu_name'] = $this->welcome_model->show_right_menu_name();

        $data['slide_show_post'] = $this->welcome_model->slide_show_post();
        $data['slider_image'] = $this->load->view('slider_image', $data, TRUE);
//            if($user_id=NULL){
        //$user_id = $this->session->userdata('user_id');
//        if ($user_id !== NULL) {
//            $data['login_register'] = $this->load->view('login_register', $data, TRUE);
//        }
//        }
//            echo '<pre>';
//            print_r($data);
//            exit();

	$data['hor_adsense'] = $this->load->view('adsense/adsense_hor', $data, TRUE);
        $data['ver_adsense'] = $this->load->view('adsense/adsense_ver', $data, TRUE);

        $data['center_content'] = $this->load->view('center_content', $data, TRUE);
        $data['left_widget'] = $this->load->view('left_widget', $data, TRUE);
        $data['right_widget'] = $this->load->view('right_widget', $data, TRUE);
        
        $data['show_title'] = $this->welcome_model->show_all_title();
        $data['first_name'] = $this->super_admin_model->show_all_users();
        $this->load->view('master', $data);
    }

    public function menu_wise_news($menu_link) {

        $data = array();

        $this->load->library('pagination');  /* Start Pagination from Here */

        $config['base_url'] = base_url() . 'welcome/menu_wise_news';
        $config['total_rows'] = $this->db->count_all('tbl_news_blog');
        $config['per_page'] = 1;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);  /* End Pagination from Here */

        $data['menu'] = $this->welcome_model->show_dropdown_menu();
        $data['show_post'] = $this->welcome_model->show_all_post_menu_wise($config['per_page'], $this->uri->segment(3), $menu_link);

        /*
         * User Login Information
         */
        
        $user_id = $this->session->userdata('user_id');
        if ($user_id != NULL) {
            //redirect('super_admin', 'refresh');
            $data['test_value']='You are successfully Login';
            $data['user_id']=$user_id;
            $data['user_username']=$this->session->userdata('user_username');
            $data['user_first_name']=$this->session->userdata('user_first_name');
            $data['user_last_name']=$this->session->userdata('user_last_name');
            $data['user_welcome']=$this->load->view('user_welcome', $data, TRUE);
        }else{
            $data['test_value']='You are Not Login';
            $data['login_register'] = $this->load->view('login_register', $data, TRUE);
            $data['user_id']=$user_id;
        }
        
        //End User Login Information

        $data['show_menu_name'] = $this->welcome_model->show_menu_name();

        $data['center_content'] = $this->load->view('center_content', $data, TRUE);
        $data['left_widget'] = $this->load->view('left_widget', $data, TRUE);
        $data['right_widget'] = $this->load->view('right_widget', $data, TRUE);
        
        $data['show_title'] = $this->welcome_model->show_all_title();
        $data['first_name'] = $this->super_admin_model->show_all_users();
        $this->load->view('master', $data);
    }

    public function read_more($blog_id) {
        $data = array();

        /*
         * User Login Information
         */
        
        $user_id = $this->session->userdata('user_id');
        if ($user_id != NULL) {
            //redirect('super_admin', 'refresh');
            $data['test_value']='You are successfully Login';
            $data['user_id']=$user_id;
            $data['user_username']=$this->session->userdata('user_username');
            $data['user_first_name']=$this->session->userdata('user_first_name');
            $data['user_last_name']=$this->session->userdata('user_last_name');
            $data['user_welcome']=$this->load->view('user_welcome', $data, TRUE);
        }else{
            $data['test_value']='You are Not Login';
            $data['login_register'] = $this->load->view('login_register', $data, TRUE);
            $data['user_id']=$user_id;
        }
        
        //End User Login Information

        $data['menu'] = $this->welcome_model->show_dropdown_menu();
        $data['show_menu_name'] = $this->welcome_model->show_menu_name();
        $data['show_post'] = $this->welcome_model->read_more_post($blog_id);

        $data['center_content'] = $this->load->view('read_more', $data, TRUE);
        //$data['left_widget']=$this->load->view('left_widget', '', TRUE);
        
        $data['ver_adsense'] = $this->load->view('adsense/adsense_ver', $data, TRUE);
	$data['right_widget'] = $this->load->view('right_widget', $data, TRUE);

        $data['show_title'] = $this->welcome_model->show_all_title();
        $data['first_name'] = $this->super_admin_model->show_all_users();
        $this->load->view('master', $data);
    }

    public function category_wise_news($category_name) {
        $data = array();

//            $this->load->library('pagination');  /* Start Pagination from Here */
//
//            $config['base_url'] = base_url().'welcome/index';
//            $config['total_rows'] = $this->db->count_all('tbl_news_blog');
//            $config['per_page'] = 5; 
//            $config['full_tag_open']='<p>';
//            $config['full_tag_close']='</p>';
//            
//            $this->pagination->initialize($config);  /* End Pagination from Here */


        $data['menu'] = $this->welcome_model->show_dropdown_menu();
        $data['show_post'] = $this->welcome_model->show_all_post_menu_wise($config['per_page'], $this->uri->segment(3), $category_name);
        $data['show_menu_name'] = $this->welcome_model->show_menu_name();

        $data['center_content'] = $this->load->view('center_content', $data, TRUE);

        $data['show_title'] = $this->welcome_model->show_all_title();
        $data['first_name'] = $this->super_admin_model->show_all_users();
        $this->load->view('master', $data);
    }

}