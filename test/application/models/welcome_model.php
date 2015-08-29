<?php
class Welcome_Model extends CI_Model {
    public function show_dropdown_menu(){
    $this->db->select('*');
    $this->db->where('menu_dropdown', 'none');
    $this->db->where('menu_status', 1);
    $this->db->or_where('menu_dropdown', 'dropdown');
    $this->db->order_by('menu_serial', 'asc');
    $this->db->from('tbl_menu');
    $query_result=$this->db->get();
    $result=$query_result->result();
    return $result;
    }
    
    public function dropdown_menu_by_menu($menu){
    $this->db->select('*');
    $this->db->where('menu_dropdown', $menu);
    $this->db->order_by('menu_dropdown', 'asc');
    $this->db->from('tbl_menu');
    $query_result=$this->db->get();
    $result=$query_result->result();
    return $result;
    }
    
    public function show_all_post_heading($per_page, $offset){
    $this->db->select('*');
    $this->db->where('blog_publication_status', 1);
    $this->db->order_by('blog_id', 'desc');
    $this->db->from('tbl_news_blog');
    $query_result=$this->db->get('', $per_page, $offset);
    $result=$query_result->result();
    return $result;
    }
    
    public function show_all_post_menu_wise($per_page, $offset, $menu_link){
    $this->db->select('*');
    $this->db->where('blog_publication_status', 1);
    $this->db->where('blog_menu_link', $menu_link);
    $this->db->order_by('blog_id', 'desc');
    $this->db->from('tbl_news_blog');
    $query_result=$this->db->get('', $per_page, $offset);
    $result=$query_result->result();
    return $result;
    }
    
    public function read_more_post($blog_id){
    $this->db->select('*');
    $this->db->where('blog_id', $blog_id);
    $this->db->from('tbl_news_blog');
    $query_result=$this->db->get();
    $result=$query_result->row();
    return $result;
    }
    
    public function show_menu_name(){
    $this->db->select('*');
    $this->db->where('menu_status', 1);
    $this->db->where('menu_widget_order', 1);
    $this->db->order_by('menu_serial', 'asc');
    $this->db->from('tbl_menu', 'menu_name');
    $query_result=$this->db->get();
    $result=$query_result->result();
    return $result;
    }

    public function show_all_title(){
//    $this->db->select('*');
//    $this->db->from();
    }
    
    public function menu_details($news_details){
    $this->db->select('*');
    $this->db->where('blog_menu', $news_details);
    $this->db->order_by('blog_id', 'desc');
    $this->db->limit(1);
    $this->db->from('tbl_news_blog');
    $query_result=$this->db->get();
    $result=$query_result->row();
    return $result;    
    }
    
    public function slide_show_post(){
        $this->db->select('*');
        $this->db->where('image_slide', 1);
        $this->db->order_by('blog_id', 'desc');
        $this->db->limit(10);
        $this->db->from('tbl_news_blog');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

        public function title_news(){
//        $this->db->select('*');
//        $this->db->where;
    }
}
?>