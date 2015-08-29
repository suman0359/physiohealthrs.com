<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of master
 *
 * @author Tasfir
 */
class Master extends CI_Controller {
    //put your code here
    public function read_more($blog_id){
        $data=array();
        $data['menu']=$this->welcome_model->show_dropdown_menu();
        $data['show_post']=$this->welcome_model->show_all_post_heading();
        $data['show_menu_name']=$this->welcome_model->show_menu_name();
        

        $this->load->view('master', $data);
    }
}

?>