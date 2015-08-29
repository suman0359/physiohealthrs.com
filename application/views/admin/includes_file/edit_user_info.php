<?php 
$message=$this->session->userdata('successfull'); 
if($message){ ?>
<h4 class="alert_success"> <?php echo $message; ?> </h4>
    <?php 
    $this->session->unset_userdata('successfull');
}  elseif (@$error1) { ?>
    <h4 class="alert_error"> <?php echo $error1; ?> </h4>
<?php
    }

else{
    echo mysql_error();
}   
    
    ?>
<article class="module width_full">
    <header><h3>Create New User</h3></header>
    <div class="module_content">
     <form action="<?php echo base_url(); ?>create_and_manage/update_user_info" enctype="multipart/form-data" method="POST" >

         <input type="hidden" name="admin_id" value="<?php echo $user_info->admin_id;?>" />
            <fieldset class="divide_form">
                <label>User Name</label>
                <input type="text" name="admin_user_name" value="<?php echo $user_info->admin_user_name; ?>">
            </fieldset>
            <fieldset class="divide_form">
                <label>User First Name</label>
                <input type="text" name="admin_first_name" value="<?php echo $user_info->admin_first_name; ?>" >
            </fieldset>
            <fieldset class="divide_form">
                <label>User Last Name</label>
                <input type="text" name="admin_last_name" value="<?php echo $user_info->admin_last_name; ?>">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Email Address</label>
                <input type="text" name="admin_email_address" value="<?php echo $user_info->admin_email_address; ?>">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Password</label>
                <input type="text" name="admin_password">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Mobile No</label>
                <input type="text" name="mobile_no" value="<?php echo $user_info->admin_mobile_no; ?>">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Date Of Birth</label>
                <input type="date" name="user_date_of_birth" value="<?php echo $user_info->admin_date_of_birth; ?>">
            </fieldset> 
            <fieldset class="divide_form">
                <label>User Gender</label>
                <input type="radio" name="admin_gender" value="1" <?php if($user_info->admin_gender==1){ echo "checked"; } ?>>Male<br/>
                <input type="radio" name="admin_gender" value="0" <?php if($user_info->admin_gender==0){ echo "checked"; } ?>>Female
            </fieldset>
            <fieldset class="divide_form">
                <label>User Mailing Address</label>
                <input type="text" name="admin_mailing_address" value="<?php echo $user_info->admin_mailing_address; ?>">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Category</label>
                <input type="text" name="admin_category" value="<?php echo $user_info->admin_category; ?>">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Country</label>
                <input type="text" name="admin_country" value="<?php echo $user_info->admin_country; ?>">
            </fieldset>
          <fieldset class="divide_form">
                <label>User Profile Image</label>
                <input type="file" class="" name="profile_image" size="38">
            </fieldset> 
            <fieldset class="divide_form">
                <label required = "required" >User Publication Status</label>
                <input type="radio" name="admin_users_status" value="1" <?php if($user_info->admin_users_status==1){ echo "checked"; } ?>>Published<br/>
                <input type="radio" name="admin_users_status" value="0" <?php if($user_info->admin_users_status==0){ echo "checked"; } ?> required = "required" >Unpublished
            </fieldset>


            <div class="clear"></div>

    </div>
    <footer>
        <div class="submit_link">
            <!-- <select name="publication_status">
                <option value="0">Unpublished</option>
                <option value="1">Published</option>
            </select> -->
            <input type="submit" value="Create User" class="alt_btn">
            <input type="reset" value="Reset">
        </div>
    </footer>
</form> 

</article><!-- end of post new article -->
