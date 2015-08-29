<div id="content"> <!-- Start From Here Center Container -->

    <?php if (isset($slider_image)) {
        echo $slider_image;
    } ?>

    <div id="body_title"><h2>All News by Ascending</h2></div>
<?php foreach ($show_post as $v_post) { ?>
        <div class="title_head">
            <p class="title_news"><a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $v_post->blog_id; ?>"><?php echo $v_post->blog_title; ?></a></p>
            <div class="title_content">

                <p> <span>Date <?php echo $v_post->create_date_time; ?></span></p>
                <p class="content_news"><?php if ($v_post->blog_picture !== NULL or $v_post->blog_picture !== 0) { ?> <img src="<?php echo base_url();
                    echo $v_post->blog_picture; ?>" /> <?php } ?> 
    <?php $string = $v_post->blog_description;
    echo $string = word_limiter($string, 100); ?> <span><a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $v_post->blog_id; ?>" style="color: purple; text-transform: uppercase">  read more</a></span> </p>
                <div class="title_bottom"><p> &nbsp;<!-- <span style=""><a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $v_post->blog_id; ?>">read more</a></span>  <span style="margin-left: 30px; margin-right: 30px;"><a href="#">2 comments</a></span>    <span style="margin-right:30px;">12 views</span><span style="margin-right:5px;">  0</span><span><a href=""><img src="<?php echo base_url(); ?>images/bhalo-20.png"/></a> </span> --> </p></div>
            </div>

        </div>
<?php } ?>
    <div class="pagination">
<?php echo $this->pagination->create_links(); ?>
    </div>
</div> <!-- End From Here Center Container -->


