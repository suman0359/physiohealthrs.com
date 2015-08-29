<article class="module width_full">
    <header><h3>Edit Category Info</h3></header>
    
    <?php
        $message=$this->session->userdata('message');
        if($message)
        {
            ?>
            <h4 class="alert_success">
                <?php 
                    echo $message;
                    $this->session->unset_userdata('message');
                ?>
            </h4>
            
       <?php }


    ?>
    
    
    
    <form action="<?php echo base_url();?>create_and_manage/update_category_info" method="post">
    <div class="module_content">
        <input type="hidden" name="category_id" value="<?php echo $category_info->category_id; ?>" />
        <fieldset>
            <label>Category Name</label>
            <input type="text" name="category_name" maxlength="50" value="<?php echo $category_info->category_name; ?>" />
        </fieldset>
        <fieldset>
            <label>Category Description</label>
            <input type="text" name="category_description" value="<?php echo $category_info->category_description; ?>" />
        </fieldset>
        <input type="hidden" name="creator_name" value="<?php echo $this->session->userdata('admin_username'); ?>" />
        <fieldset>
            <label>Publication Status</label>
            <input type="radio" name="category_status" value="1" <?php if($category_info->category_status==1){echo "checked";} ?> />Published
            <input type="radio" name="category_status" value="0" <?php if($category_info->category_status==0){echo "checked";} ?> />Unpublished
        </fieldset>
        
    </div>
    <footer>
        <div class="submit_link">
            
            <input type="submit" value="Save" class="alt_btn" />
            <input type="reset" value="Reset" />
        </div>
    </footer>
    </form>
</article><!-- end of post new article -->