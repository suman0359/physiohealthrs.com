<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/login_style.css" type="text/css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    </head>
    <body>
        <div class="wrap_top_nav">

        </div>

        <div class="page">

            <section class="demo">
                <div class="login-control">
                    <form action="<?php echo base_url(); ?>admin_login/check_admin_login" method="POST" accept-charset="utf-8" class="form-item">
                        <p>
                            <?php
                            $message = $this->session->userdata('message');
                            echo $message;
                            $this->session->unset_userdata('message');
                            ?>
                        </p>
                        <h2>LOGIN</h2>
                        <div class="form-item-1">
                            <input type="text" name="user_admin_username" id="name" placeholder="Username"/>
                        </div>
                        <div class="form-item-2">
                            <input type="password" name="user_admin_password" value="" placeholder="Password"/>
                        </div>
                        <div class="form-item-3">
                            <input type="checkbox" name="showpwd" value="" id="showpwd" checked="checked">
                            <label for="showpwd">Show password</label>
                            <a href="#" class="fr">Forgot password?</a>
                        </div>
                        <div class="form-item-4">
                            <input type="submit" name="admin_login" value="Sign In">
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </body>
</html>