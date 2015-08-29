

<script type="text/javascript" src="<?php echo base_url(); ?>tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "simple",
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,
        // Example content CSS (should be your site CSS)
        content_css: "css/content.css",
        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        external_image_list_url: "lists/image_list.js",
        media_external_list_url: "lists/media_list.js",
        // Style formats
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
</script>



<article class="module width_full">
    <header><h3>Create a New Post</h3></header>
    
    <?php
        $message=$this->session->userdata('successfull');
        if($message)
        {
            ?>
            <h4 class="alert_success">
                <?php 
                    echo $message;
                    $this->session->unset_userdata('successfull');
                ?>
            </h4>
            
       <?php }


    ?>
    
    
    
    <form action="<?php echo base_url();?>create_and_manage/update_blog_post" method="post" enctype="multipart/form-data">
    <div class="module_content">
        
        <input type="hidden" name="blog_id" value="<?php echo $selected_post->blog_id; ?>" />
        
        <fieldset>
            <label>Post Title</label>
            <input type="text" name="blog_title" maxlength="50" value="<?php echo $selected_post->blog_title; ?>">
        </fieldset>
        <fieldset>
            <label>Post Description</label>
            <textarea name="blog_description" cols="10" rows="15"><?php echo $selected_post->blog_description; ?></textarea>
        </fieldset>
        <fieldset class="divide_form">
            <label>Post Category</label>
            <select name="blog_category_id" id="blog_category_id">
                <option value="" selected="selected">Select Menu Category ....</option>
                <?php foreach($view_category as $v_category){ ?>
                <option value="<?php echo $v_category->category_id; ?>">
                    <?php echo $v_category->category_name; ?>
                </option>
                <?php }?>
            </select>
        </fieldset>
        <fieldset class="divide_form">
            <label>Post Menu</label>
            <select name="blog_menu_link" id="blog_menu_link">
                <option value="" selected="selected">Select Menu....</option>
                <option value="open_voice">Open Voice</option>
                <?php foreach($menu_info as $v_menu){ ?>
                <option value="<?php echo $v_menu->menu_link; ?>">
                    <?php echo $v_menu->menu_name; ?>
                </option>
                <?php }?>
            </select>
        </fieldset>
        <fieldset class="divide_form">
            <label>
                <input type="file" name="blog_picture" size="38" />
            </label>
        </fieldset>
        <input type="hidden" name="blog_creator_user_id" value="<?php echo $this->session->userdata('admin_id'); ?>" />
        <fieldset class="divide_form">
            <label>Post Status</label>
            <input type="radio" name="blog_publication_status" value="1" <?php if($selected_post->blog_publication_status==1){echo "checked";} ?>/>Published <br/>
            <input type="radio" name="blog_publication_status" value="0" <?php if($selected_post->blog_publication_status==0){echo "checked";} ?>/>Unpublished
        </fieldset>
        <div class="clear"></div>
    </div>
    <footer>
        <div class="submit_link">
            
            <input type="submit" value="Save" class="alt_btn" />
            <input type="reset" value="Reset" />
        </div>
    </footer>
    </form>
</article><!-- end of post new article -->

<script type="text/javascript">
    document.getElementById('blog_category_id').value="<?php echo $selected_post->blog_category_id; ?>";
</script>

<script type="text/javascript">
    document.getElementById('blog_menu_link').value="<?php echo $selected_post->blog_menu_link; ?>";
</script>

<?php echo $selected_post->blog_category_id; ?>
<?php echo $selected_post->blog_menu_link; ?>