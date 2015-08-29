<fieldset style="border: none; ">
    <legend style="border-bottom: 1px solid #ddd;"><h2>Log in/ Register</h2></legend>
    <form action="<?php echo base_url(); ?>user_login/check_user_login" method="POST">
        <legend>User Name : </legend>
        <legend><input type="text" name="user_username"/></legend>
        <legend>Password: </legend>
        <legend><input type="password" name="user_password" /></legend>
        <legend style="float: left;"><input type="submit" name="submit" value="Login" /></legend>
        <legend style="margin-top: 6px; text-decoration: underline; font-size: 12px;"><a href="#forget_password">Forget Password</a></legend>
    </form>
    <legend style="clear: left;"><a href="#join_form" id="join_pop">Register</a></legend>
    <!-- Successfully Message Start From Here -->
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

    <!-- Successfully Message End From Here -->


    <!-- popup form #2 -->
    <a href="#x" class="overlay" id="join_form"></a>
    <div class="popup">
        <h2>Sign Up</h2>
        <p>Please enter your details here</p>
        <form action="<?php echo base_url(); ?>user_login/create_new_user" method="POST">
            <div>
                <label for="email">Login (User Name)</label>
                <input name="user_name" type="text" id="username" value="" />
            </div>
            <div>
                <label for="user_first_name">First Name</label>
                <input type="text" name="user_first_name" id="firstname" value="" />
            </div>
            <div>
                <label for="lastname">Last name</label>
                <input type="text" id="lastname" name="user_last_name" value="" />
            </div>
            <div>
                <label for="user_email_address">Email Address</label>
                <input type="email" name="user_email_address" id="email" value="" />
            </div>
            <div>
                <label for="user_password">Password</label>
                <input type="password" name="user_password" id="email" value="" />
            </div>
            <div>
                <label for="user_con_password">Confirm Password</label>
                <input type="password" name="user_con_password" id="email"/>
            </div>
            <div>
                <label for="user_gender">Gender</label>
                <input type="radio" name="user_gender" value="1">Male 
                <input type="radio" name="user_gender" value="0">Female
            </div>
            <div>
                <label for="date_of_birth">Date Of Birth</label>
                <input type="date" name="user_date_of_birth" />
            </div>
            <div>
                <label for="country">Country</label>
                <select name="user_country">
                    <option>Select Your Country...</option>
                    <option>Bangladesh</option>
                    <option>India</option>
                    <option>United Kingdom</option>
                </select>
            </div>
            <div>
                <label for="user_mailing_address">Mailing Address</label>
                <input type="text" name="user_mailing_address" id="email" value="" />
            </div>
            <!--                            <div>
                                            <label for="profile_image">Profile Image</label>
                                            <input type="file" name="user_profile_image" />
                                        </div>-->
            <input type="submit" value="Sign Up" /> 

            <!-- Successfully Message Start From Here -->
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

                <?php } ?>

            <!-- Successfully Message End From Here -->


        </form>

        <a class="close" href="#close"></a>
    </div>
    
    
    <!-- popup form #2 -->
    <a href="#x" class="overlay" id="forget_password"></a>
    <div class="popup">
        <h2>Forget Password Form</h2>
        <p>Please enter your details here</p>
        <form action="<?php echo base_url(); ?>user_login/forget_password" method="POST">
            
            <div>
                <label for="user_email_address">Email Address</label>
                <input type="text" name="user_email_address" id="email" />
            </div>

            <input type="submit" value="Submit Request" /> 

            <!-- Successfully Message Start From Here -->
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

                <?php } ?>

            <!-- Successfully Message End From Here -->


        </form>

        <a class="close" href="#close"></a>
    </div>


</fieldset>
<?php
// }else{ ?>