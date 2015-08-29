<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_wise_news
 *
 * @author suman0359
 */
class Menu extends CI_Controller {

    public function index($menu_link) {

        $data = array();

        $this->load->library('pagination');  /* Start Pagination from Here */

        $config['base_url'] = base_url() . 'menu/index';
        $config['total_rows'] = $this->db->count_all('tbl_news_blog');
        $config['per_page'] = 2;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);  /* End Pagination from Here */

        $data['menu'] = $this->welcome_model->show_dropdown_menu();
        $data['show_post'] = $this->welcome_model->show_all_post_menu_wise($config['per_page'], $this->uri->segment(6), $menu_link);

//            echo '<pre>';
//            print_r($data);
//            exit();

        $data['show_menu_name'] = $this->welcome_model->show_menu_name();

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

        $config['base_url'] = base_url() . 'menu/menu_wise_news/' . $menu_link . '/';
        $config['total_rows'] = $this->db->count_all('tbl_news_blog');
        //$config['first_link'] = 'First';
        //$config['next_link'] = '&gt;';

        $config['num_links'] = 4;
        $config['use_page_numbers'] = FALSE;
        $config['uri_segment'] = 4;
        $config['per_page'] = 2;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);  /* End Pagination from Here */

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
        $data['show_post'] = $this->welcome_model->show_all_post_menu_wise($config['per_page'], $this->uri->segment(4), $menu_link);

        $data['show_menu_name'] = $this->welcome_model->show_menu_name();

        $data['center_content'] = $this->load->view('center_content', $data, TRUE);
        $data['left_widget'] = $this->load->view('left_widget', $data, TRUE);
        $data['right_widget'] = $this->load->view('right_widget', $data, TRUE);
        
        $data['show_title'] = $this->welcome_model->show_all_title();
        $data['first_name'] = $this->super_admin_model->show_all_users();
        $this->load->view('master', $data);
    }

}
