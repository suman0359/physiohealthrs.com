<?php 
$message=$this->session->userdata('successfull'); 
if($message){ ?>
<h4 class="alert_success"> <?php echo $message; ?> </h4>
    <?php 
    $this->session->unset_userdata('successfull');
    }  elseif (@$error1) { 
    ?>
    <h4 class="alert_error"> <?php echo $error1; ?> </h4>
<?php
    }

else{
    echo mysql_error();
}   
    
?>


<!--Start display uesr-->
<article class="module width_3_quarter">
    <header>
        <h3 class="tabs_involved">All User Info</h3>   
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>User Name</th> 
                        <th>Full Name</th> 
                        <th>Email Address</th> 
                        <th>Actions</th>
                        <th>User Status</th>
                    </tr> 
                </thead> 
                <tbody> 
                    <?php foreach($user_info as $value){ ?>
                    <tr>
                        <td><input type="checkbox"></td> 
                        <td><?php echo $value->admin_user_name; ?></td> 
                        <td><?php echo $value->admin_first_name ." ". $value->admin_last_name; ?></td> 
                        <td><?php echo $value->admin_email_address; ?></td> 
                        <td>
                            
                            <a href="<?php echo base_url(); ?>create_and_manage/edit_user_info/<?php echo $value->admin_id; ?>"> 
                                <input type="image" src="<?php echo base_url();?>images/icn_edit.png" title="Edit">
                            </a>
                            
                            <a href="<?php echo base_url()?>create_and_manage/delete_user_info/<?php echo $value->admin_id;?>">
                                <input type="image" src="<?php echo base_url()?>images/icn_trash.png" title="Trash" onclick=" return checkDelete();" >
                            </a>
                        </td>
                        <td><?php if($value->admin_users_status==1){?><h4><a href="<?php echo base_url()?>create_and_manage/unpublished_user_status/<?php echo $value->admin_id;?>"><?php echo "Published"; ?></a></h4><?php } else{?> <h4><a href="<?php echo base_url()?>create_and_manage/published_user_status/<?php echo $value->admin_id;?>"><?php echo "Unpublished";} ?></a></h4></td> 
                    </tr> 
                    <?php } ?>
                    
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

       

    </div><!-- end of .tab_container -->
</article><!-- end of content manager article -->
<!--End display uesr-->