<div id="left_widget"><!-- Start Left Widget -->



    <?php
    foreach ($show_menu_name as $v_menu) {
        if ($v_menu->menu_name == "Contact Us")
            continue;
        ?>

        <div class="title_head">
            <h2><a href="<?php echo base_url(); ?>welcome/menu_wise_news/<?php echo $v_menu->menu_link; ?>">
                    <?php
                    $news_details = $v_menu->menu_link;
                    echo $news_details;
                    ?>
                </a></h2>

            <?php
            if ($news_details !== NULL) {
                $sql2 = mysql_query("SELECT * FROM tbl_news_blog WHERE blog_menu_link='$news_details' order by blog_id desc limit 1");
                while ($menu_news = mysql_fetch_array($sql2)) {


                    //$this->my_object->menu_details($news_details);
                    ?>

                    <p class="title_news"><a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $menu_news['blog_id'] ?>"><?php echo $menu_news['blog_title']; ?></a></p>
                    <div class="title_content">

                        <p><span>Date <?php echo $menu_news['create_date_time']; ?> </span></p>
                        <p class="side_news"><?php
                            $string = $menu_news['blog_description'];
                            echo $string = word_limiter($string, 30);
                            ?>&nbsp;...<span>....<a style='background-color: saddlebrown;
color: whitesmoke;' href="<?php echo base_url(); ?>welcome/read_more/<?php echo $menu_news['blog_id'] ?>">Read More</a></span></p>

                    </div>

                    <div class="more_news">
                        <h4 align=left>More News</h4>
                        <?php
                        $sql3 = mysql_query("SELECT blog_id, blog_title, blog_menu_link FROM tbl_news_blog WHERE blog_menu_link='$news_details' order by blog_id desc limit 3 ");
                        while ($title = mysql_fetch_array($sql3)) {
                            $val = 1;
                            ?>

                            <p align=right><a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $title['blog_id']; ?>"><?php echo $title['blog_title'] ?> </a></p>
                    <?php } ?>
                    </div>
                <?php
                }
            }
            ?>
        </div>
<?php } ?>

</div> <!-- End Left Widget -->