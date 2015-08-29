<fieldset style="border: none; width: 100%;">
    <legend style="border-bottom: 1px solid #ddd;"><h2><a href="<?php echo base_url(); ?>user_dashboard">Dashboard</a></h2></legend>
    <legend>Welcome</legend>
    <legend style="padding: 5px 0 5px 5px;"><?php echo @$user_first_name . ' ' . @$user_last_name; ?> </legend>
    <legend> <a href="<?php echo base_url(); ?>user_login/logout">Logout</a> </legend>
</fieldset>