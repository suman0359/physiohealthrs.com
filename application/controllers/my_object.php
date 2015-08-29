<?php
class My_Object extends CI_Controller{
    public function menu_details($news_details){
    $data=array();
    $data['news_short_description']=$this->welcome_model->menu_details($news_details);
    
    $this->load->view('master', $data);
    }
}
