<?php
class Create_And_Manage_Model extends CI_Model {
    //put your code here
    public function save_category_info($data){
        $this->db->insert('tbl_category',$data);
    }
    
    public function edit_category_info($category_id){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_category_info($data, $category_id){
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
    }

    public function save_menu_info($data){
        $this->db->insert('tbl_menu',$data);
    }
    
    public function edit_menu_info($menu_id){
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->where('menu_id', $menu_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
        
    }
    
    public function update_menu_info($data, $menu_id){
        $this->db->where('menu_id', $menu_id);
        $this->db->update('tbl_menu', $data);
    }
    
    public function unpublished_menu_status_by_menu_id($menu_id){
        $this->db->set('menu_status',0);
        $this->db->where('menu_id',$menu_id);
        $this->db->update('tbl_menu');
    }
    
    public function published_menu_status_by_menu_id($menu_id){
        $this->db->set('menu_status', 1);
        $this->db->where('menu_id', $menu_id);
        $this->db->update('tbl_menu');
    }
    
    public function delete_menu_info($menu_id){
        $this->db->where('menu_id', $menu_id);
        $this->db->delete('tbl_menu');
    }

    public function create_new_user_info($data){
        $this->db->insert('tbl_administrator_user', $data);
    }
    
    public function create_new_user($data){
        $this->db->insert('tbl_users', $data);
    }
    
    public function edit_user_info($admin_id){
        $this->db->select('*');
        $this->db->from('tbl_administrator_user');
        $this->db->where('admin_id', $admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_user_info($data, $admin_id){
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_administrator_user',$data);
    }
    
    public function delete_user_info($admin_id){
        $this->db->where('admin_id', $admin_id);
        $this->db->delete('tbl_administrator_user');
    }

        public function published_user_status_by_admin_id($admin_id)
    {
        $this->db->set('admin_users_status',1);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_administrator_user');
    }
    
    public function unpublished_user_status_by_admin_id($admin_id)
    {
        $this->db->set('admin_users_status',0);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_administrator_user');
    }
    
    public function save_blog_post($data){
        $this->db->insert('tbl_news_blog', $data);
    }
    
    public function update_blog_post($data, $blog_id){
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_news_blog',$data);
    }
    
    public function delete_blog_post($blog_id){
        $this->db->where('blog_id', $blog_id);
        $this->db->delete('tbl_news_blog');
    }
    
    public function published_blog_post_by_blog_id($blog_id){
        $this->db->set('blog_publication_status',1);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_news_blog');
    }
    
    public function unpublished_blog_post_by_blog_id($blog_id){
        $this->db->set('blog_publication_status',0);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_news_blog');
    }
    
    public function slide_yes_by_blog_id($blog_id){
        $this->db->set('image_slide',1);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_news_blog');
    }
    
    public function slide_no_by_blog_id($blog_id){
        $this->db->set('image_slide',0);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_news_blog');
    }
    
}
