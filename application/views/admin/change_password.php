<article class="module width_full">

    <?php
    $message = $this->session->userdata('message');
    if ($message) {
        ?>
        <h4 class="alert_success">
            <?php
            echo $message;
            $this->session->unset_userdata('message');
            ?>
        </h4>

    <?php }
    ?>

    <header><h3>Change My Password</h3></header>
    <div class="module_content">
        <form action="<?php echo base_url(); ?>change_password/update_password" method="POST" >
            
            <input type="hidden" name="admin_id" value="<?php echo $this->session->userdata('admin_id'); ?>" />
            
            <fieldset style="width: 160px;" class="divide_form">
                <label>Old Password</label>
                <input type="text" name="old_password" style="width: 180px;">
            </fieldset>

            <fieldset style="width: 160px;" class="divide_form">
                <label>New Password</label>
                <input type="text" name="new_password" style="width: 180px;"/>
            </fieldset>

            <fieldset style="width: 160px;" class="divide_form">
                <label>Confirm Password</label>
                <input type="text" name="confirm_password" style="width: 180px;"/>
            </fieldset>

            <div class="clear"></div>

    </div>
    <footer>
        <div class="submit_link">

            <input type="submit" value="Update Password" class="alt_btn">
            <input type="reset" value="Reset">
        </div>
    </footer>
</form> 

</article><!-- end of post new article -->