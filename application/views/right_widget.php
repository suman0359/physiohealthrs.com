<div class="right_widget"> <!-- Start From Here Right Container -->
    <!--jQuery Auto Populate Start From Here-->
    <div class="ui-widget" style="margin-top: 10px;">
        <legend for="tags">Search By Topic: </legend>
        <input id="tags">
    </div>
    <!--End Auto Populate-->
    
    <?php
    if (isset($login_register)) {
        echo $login_register;
    }
    ?>

    <?php
    if (isset($user_welcome)) {
        echo $user_welcome;
    }
    ?>

    <fieldset style="border: none; width: 100%;"> <!-- Facebook Like script --> 
        <div class="fb-like-box" data-href="https://www.facebook.com/risingsunphysioeducation" data-width="188" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
    </fieldset>

    <fieldset style="border: none;">
        <ul id="right_ads">
            <li>170 x 100</li>
            <li>170 x 100</li>
            <li>170 x 100</li>
        </ul>
    </fieldset>
    
    	
	
    <?php
    foreach ($show_right_menu_name as $v_menu) { ?>
        
    <div class="title_head">
    	 <h2>
    	 <a href="<?php echo base_url(); ?>welcome/menu_wise_news/<?php echo $v_menu->menu_link; ?>">
            <?php
            $news_details = $v_menu->menu_link;
            echo $news_details;
            ?>
        </a>
        </h2>
        
        <?php 
        
        if ($news_details !== NULL) {
        $sql2 = mysql_query("SELECT * FROM tbl_news_blog WHERE blog_menu_link='$news_details' order by blog_id desc limit 5");
        while ($menu_news = mysql_fetch_array($sql2)) { ?>
    	
    	<p style="padding: 0 10px"><a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $menu_news['blog_id'] ?>"><?php echo $menu_news['blog_title']; ?></a></p>
    	<?php } } ?>
    
    </div>
    
    
    
    <?php } ?>
    
    
    
    <div class="title_head">
    	 <h2>
    	 <a href="<?php echo base_url(); ?>welcome/menu_wise_news/open_voice ?>">
            <?php
            $news_details = 'open_voice';
            echo $news_details;
            ?>
        </a>
        </h2>
        
        <?php 
        
        if ($news_details !== NULL) {
        $sql2 = mysql_query("SELECT * FROM tbl_news_blog WHERE blog_menu_link='$news_details' order by blog_id desc limit 5");
        while ($menu_news = mysql_fetch_array($sql2)) { ?>
    	
    	<p style="padding: 0 10px"><a href="<?php echo base_url(); ?>welcome/read_more/<?php echo $menu_news['blog_id'] ?>"><?php echo $menu_news['blog_title']; ?></a></p>
    	<?php } } ?>
    
    </div>
    
    <?php
	if (isset($ver_adsense)) {
		echo $ver_adsense;
	}
	?>

</div> <!-- End From Here Right Container -->