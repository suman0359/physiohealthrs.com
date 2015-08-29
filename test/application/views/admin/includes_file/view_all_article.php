<?php
        $message=$this->session->userdata('successfull');
        if($message)
        {
            ?>
            <h4 class="alert_success">
                <?php 
                    echo $message;
                    $this->session->unset_userdata('successfull');
                ?>
            </h4>
            
       <?php }


    ?>
    
    



<!--Start display uesr-->
<article class="module width_3_quarter">
    <header>
        <h3 class="tabs_involved">View All Article</h3>   
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Article Title</th> 
                        <th>Article Description</th>
                        <th>Article Image</th>
                        <th>Menu Link</th>
                        <th>Slide</th>
                        <th>Create Date Time</th> 
                        <th>Creator Name</th>
                        <th>Action</th>
                        <th>Article Status</th>
                    </tr> 
                </thead> 
                <tbody> 
                    <?php foreach($view_article as $value){ ?>
                    <tr>
                        <td><input type="checkbox"></td> 
                        <td><?php echo $value->blog_title; ?></td> 

                        <td><?php $string = $value->blog_description; echo $string = word_limiter($string, 30); ?></td>
                        <td><a href="<?php echo base_url(); ?>super_admin/change_blog_post_image/<?php echo $value->blog_id; ?>"><img src="<?php echo base_url().$value->blog_picture; ?>" alt="" width="30" height="30" /></a></td>
                        <td><?php echo $value->blog_menu_link; ?></td>
                        <td style="text-align: center;"><?php if ($value->image_slide == 1) { ?><h4><a href="<?php echo base_url(); ?>create_and_manage/slide_no_by_blog_id/<?php echo $value->blog_id; ?>"><?php echo "Yes"; ?></a></h4><?php } else { ?> <h4><a href="<?php echo base_url(); ?>create_and_manage/slide_yes_by_blog_id/<?php echo $value->blog_id; ?>"><?php echo "No";
                        } ?></a></h4></td>
                        <td><?php echo $value->create_date_time; ?></td> 
                        <td><?php if(isset($value->blog_creator_user_id)){echo $value->blog_creator_user_id;} ?></td>
                        <td>
                            
                            <a href="<?php echo base_url(); ?>super_admin/edit_blog_post/<?php echo $value->blog_id; ?>"> <input type="image" src="<?php echo base_url();?>images/icn_edit.png" title="Edit"></a>
                            
                            <a href="<?php echo base_url()?>create_and_manage/delete_blog_post/<?php echo $value->blog_id;?>">
                                <input type="image" src="<?php echo base_url()?>images/icn_trash.png" title="Trash" onclick=" return checkDelete();" >
                            </a>
                        </td>
                        <td><?php if($value->blog_publication_status==1){?><h4><a href="<?php echo base_url(); ?>create_and_manage/unpublished_blog_post_by_blog_id/<?php echo $value->blog_id; ?>"><?php echo "Published"; ?></a></h4><?php } else{?> <h4><a href="<?php echo base_url(); ?>create_and_manage/published_blog_post_by_blog_id/<?php echo $value->blog_id; ?>"><?php echo "Unpublished";} ?></a></h4></td> 
                    </tr> 
                    <?php } ?>
                    
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

       

    </div><!-- end of .tab_container -->
</article><!-- end of content manager article -->
<!--End display uesr-->