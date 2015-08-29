<article class="module width_full">
    <header><h3>Post New Category</h3></header>
    
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
    
    
    
    <form action="<?php echo base_url();?>create_and_manage/save_category" method="post">
    <div class="module_content">
        <fieldset>
            <label>Category Name</label>
            <input type="text" name="category_name" maxlength="50">
        </fieldset>
        <fieldset>
            <label>Category Description</label>
            <input type="text" name="category_description">
        </fieldset>
        <input type="hidden" name="creator_name" value="<?php echo $this->session->userdata('admin_username'); ?>" />
        <fieldset>
            <label>Publication Status</label>
            <input type="radio" name="category_status" value="1" />Published
            <input type="radio" name="category_status" value="0" />Unpublished
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


<!--Start display uesr-->
<article class="module width_3_quarter">
    <header>
        <h3 class="tabs_involved">All Category Info</h3>   
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Category Name</th> 
                        <th>Category Description</th> 
                        <th>Create Date Time</th> 
                        <th>Creator Name</th>
                        <th>Action</th>
                        <th>Category Status</th>
                    </tr> 
                </thead> 
                <tbody> 
                    <?php foreach($category_info as $value){ ?>
                    <tr>
                        <td><input type="checkbox"></td> 
                        <td><?php echo $value->category_name; ?></td> 
                        <td><?php echo $value->category_description; ?></td> 
                        <td><?php echo $value->create_date_time; ?></td> 
                        <td><?php echo $value->create_user_name; ?></td>
                        <td>
                            
                            <a href="<?php echo base_url(); ?>create_and_manage/edit_category_info/<?php echo $value->category_id; ?>"> <input type="image" src="<?php echo base_url();?>images/icn_edit.png" title="Edit"></a>
                            
                            <a href="<?php echo base_url()?>create_and_manage/delete_category/<?php echo $value->category_id;?>">
                                <input type="image" src="<?php echo base_url()?>images/icn_trash.png" title="Trash" onclick=" return checkDelete();" >
                            </a>
                        </td>
                        <td><?php if($value->category_status==1){?><h4><a href="#"><?php echo "Published"; ?></a></h4><?php } else{?> <h4><a href="#"><?php echo "Unpublished";} ?></a></h4></td> 
                    </tr> 
                    <?php } ?>
                    
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

       

    </div><!-- end of .tab_container -->
</article><!-- end of content manager article -->
<!--End display uesr-->