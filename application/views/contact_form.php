<div class="wrapper_form clearfix">

    <div id="contact-wrapper" class="clearfix">

        <div class="form-wrapper clearfix">

            <h2>Contact Us</h2>

            <div class="message">
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
            </div>

            <form id="contact-form" class="contact-form" action="<?php echo base_url(); ?>mailer/send_email" method="post" novalidate>

                <fieldset>
                     <input type="hidden" name="this_url_link" value="<?php echo base_url(uri_string()); ?>" />
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="emailer_name" autofocus required="required"
                               title="Your first and last name">
                    </div>
                    
                    <div class="field" title="sadfsadf">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required="required" title="We will respond to this address">
                    </div>

                    
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" cols="15" rows="5" required="required"
                                  ></textarea>
                    </div>

                    <div class="field submit">
                        <input type="submit" value="Submit"/>
                    </div>

                </fieldset>

            </form>
        </div>


    </div>
</div>