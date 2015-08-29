<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of send_email
 *
 * @author suman0359
 */
class Mailer extends CI_Controller {

    public function send_email() {
        $data = array();
        $data['mailer_name'] = $this->input->post('mailer_name', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['phone'] = $this->input->post('phone', TRUE);
        $data['contact_reason'] = $this->input->post('contact_reason', TRUE);
        $data['message'] = $this->input->post('message', TRUE);

        $url = $this->input->post('this_url_link', TRUE);

        $this->load->library('email');

        $this->email->from('admin@physiohealthrs.com', 'Tasfir Suman');
        $this->email->to($data['email']);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message($data['message']);

        $this->email->send();

        //echo $this->email->print_debugger();
        $sdata = array();
        $sdata['message'] = "Successfully Sent Your Email";
        $this->session->set_userdata($sdata);

        redirect($url);
    }

}