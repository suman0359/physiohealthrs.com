<?php
class Super_Admin_Model extends CI_Model {
    
    public function create_new_user_info($data){       
    
    $this->db->insert('tbl_administrator_user',$data);
    
    }
    
    public function show_all_users()
    {
        $this->db->select('*');
        $this->db->from('tbl_administrator_user');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function view_all_article(){
        $this->db->select('*');
        $this->db->order_by('blog_id', 'desc');
        $this->db->from('tbl_news_blog');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function view_all_article_for_open_voice($user_id){
        $this->db->select('*');
        $this->db->order_by('blog_id', 'desc');
        $this->db->where('blog_menu_link', 'open_voice');
        $this->db->where('blog_creator_user_id', $user_id);
        $this->db->from('tbl_news_blog');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

        public function selected_blog_post($blog_id){
        $this->db->select('*');
        $this->db->order_by('blog_id', 'desc');
        $this->db->where('blog_id', $blog_id);
        $this->db->from('tbl_news_blog');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function selected_blog_post_image($blog_id){
        $this->db->select('blog_id, blog_picture');
        $this->db->where('blog_id', $blog_id);
        $this->db->from('tbl_news_blog');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

    public function show_all_menus(){
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->order_by('menu_serial', 'asc');
        //$this->db->where('menu_dropdown', 'none',  'dropdown');
        //$this->db->where('menu_dropdown', 'dropdown');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function show_all_menus_by_published(){
        $this->db->select('*');
        $this->db->where('menu_status', 1);
        $this->db->from('tbl_menu');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

        public function show_all_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    
}
