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
<article class="module width_full">
    <header><h3>Create New User</h3></header>
    <div class="module_content">
     <form action="<?php echo base_url(); ?>create_and_manage/create_new_user" enctype="multipart/form-data" method="POST" >
            <fieldset class="divide_form">
                <label>User Name</label>
                <input type="text" name="admin_user_name">
            </fieldset>
            <fieldset class="divide_form">
                <label>User First Name</label>
                <input type="text" name="admin_first_name">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Last Name</label>
                <input type="text" name="admin_last_name">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Email Address</label>
                <input type="text" name="admin_email_address">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Password</label>
                <input type="text" name="admin_password">
            </fieldset>
             <fieldset class="divide_form">
                <label>User Mobile No</label>
                <input type="text" name="mobile_no">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Date Of Birth</label>
                <input type="date" name="user_date_of_birth">
            </fieldset> 
            <fieldset class="divide_form">
                <label>User Gender</label>
                <input type="radio" name="admin_gender" value="1">Male<br/>
                <input type="radio" name="admin_gender" value="0">Female
            </fieldset>
            <fieldset class="divide_form">
                <label>User Mailing Address</label>
                <input type="text" name="admin_mailing_address">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Category</label>
                <input type="text" name="admin_category">
            </fieldset>
            <fieldset class="divide_form">
                <label>User Country</label>
                <input type="text" name="admin_country">
            </fieldset>
          <fieldset class="divide_form">
                <label>User Profile Image</label>
                <input type="file" class="" name="profile_image" size="38">
                <fieldset style="width: 85px;">
                    <legend>Photo</legend>
                    <legend><img src="" height="80px" width="80px"/></legend>
                </fieldset>
            </fieldset> 
            <fieldset class="divide_form">
                <label required = "required" >User Publication Status</label>
                <input type="radio" name="admin_users_status" value="1" checked="checked">Published<br/>
                <input type="radio" name="admin_users_status" value="0" required = "required" >Unpublished
            </fieldset>

<!--	<fieldset style="width:48%; float:left; margin-right: 3%;">  to make two field float next to one another, adjust values accordingly 
                <label>Category</label>
                <select style="width:92%;">
                        <option>Articles</option>
                        <option>Tutorials</option>
                        <option>Freebies</option>
                </select>
        </fieldset>
        <fieldset style="width:48%; float:left;">  to make two field float next to one another, adjust values accordingly 
                <label>Tags</label>
                <input type="text" style="width:92%;">
        </fieldset>-->

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
