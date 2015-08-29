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
        $data['mailer_name'] = $this->input->post('emailer_name', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['phone'] = $this->input->post('phone', TRUE);
        $data['contact_reason'] = $this->input->post('contact_reason', TRUE);
        $data['message'] = $this->input->post('message', TRUE);

        $url = $this->input->post('this_url_link', TRUE);

        $this->load->library("email");
            $this->email->from($data['email'], $data['mailer_name']);
            $this->email->to("admin@physiohealthrs.com", "PHYSIO  HEALTH RISING SUN");
            $this->email->subject("Contact Email");
            $this->email->message($data['message']);

            if (!$this->email->send()) {
            $sdata = array();
            $sdata['message'] = "Email Not Sent for some technical Problem. Try Again";
            $this->session->set_userdata($sdata);
        } else {
            $sdata = array();
            $sdata['message'] = "Successfully Sent Your Email";
            $this->session->set_userdata($sdata);
        }
        $this->email->clear();

        //echo $this->email->print_debugger();

        $this->load->library('email');
        $auto_reply = "Hi " . $data['mailer_name'] . ", We Got your Email, Our Team will Contact and Reply Your Message Very Soon. Thanks, Best Regards, ADMIN";
        $this->email->from("admin@physiohealthrs.com", "RISING SUN PHYSIOTHERAPY & HEALTH");
        $this->email->to($data['email']);
        $this->email->subject("CONTACT EMAIL REPLY");
        $this->email->message($auto_reply);

        if (!$this->email->send()) {
            $sdata = array();
            $sdata['message'] = "Successfully Sent Your Email but just you will not get any reply";
            $this->session->set_userdata($sdata);
        } else {
            $sdata = array();
            $sdata['message'] = "Successfully Sent Your Email";
            $this->session->set_userdata($sdata);
        }
        $this->email->clear();

        //echo $this->email->print_debugger();
        $sdata = array();
        $sdata['message'] = "Successfully Sent Your Email";
        $this->session->set_userdata($sdata);

        redirect($url);
    }

}