<article class="module width_full">
    <header><h3>Create New User</h3></header>
    <div class="module_content">
        <form action="<?php echo base_url(); ?>create_and_manage/update_blog_image" enctype="multipart/form-data" method="POST" >
            
            <input type="hidden" name="blog_id" value="<?php echo $selected_blog_image->blog_id; ?>" />
            
            <fieldset class="divide_form" style="height: auto; padding: 10px;">
                <img src="<?php echo base_url().$selected_blog_image->blog_picture;?>" width="330px" height="280px" />
            </fieldset>
            
            <fieldset class="divide_form" style="width: 45%">
                <label>Blog Post Image</label>
                <input type="file" id="blog_picture" name="blog_picture" />
          </fieldset> 
            

            <div class="clear"></div>

    </div>
    <footer>
        <div class="submit_link">
            
            <input type="submit" value="Change Image" class="alt_btn">
            <input type="reset" value="Reset">
        </div>
    </footer>
</form> 

</article><!-- end of post new article -->
