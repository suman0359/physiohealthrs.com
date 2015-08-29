<div style="width: 465px; margin: 15px; height: 320px;"> 

    <div class="fluid_container">

        <div class="camera_wrap camera_magenta_skin" id="camera_wrap_1">
            <?php foreach ($slide_show_post as $value) { ?>
                <div data-thumb="<?php echo base_url();
            echo $value->blog_picture;
                ?>" data-src="<?php echo base_url();
                 echo $value->blog_picture;
                 ?>">
                    <div class="camera_caption fadeFromBottom">
                        <a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $value->blog_id; ?>"><?php echo $value->blog_title; ?></a>
                    </div>
                </div>
<?php } ?>
        </div><!-- #camera_wrap_2 -->
    </div><!-- .fluid_container -->

</div>