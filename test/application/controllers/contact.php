<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact
 *
 * @author suman0359
 */
class Contact extends CI_Controller {
    public function index(){
        $data=array();
        $data['menu'] = $this->welcome_model->show_dropdown_menu();
        $data['show_menu_name'] = $this->welcome_model->show_menu_name();
        $data['center_content'] = $this->load->view('contact_form', '', TRUE);
        
        $this->load->view('master', $data);
    }
}
