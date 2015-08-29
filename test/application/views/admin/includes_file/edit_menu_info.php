<article class="module width_full">
    <header><h3>Edit Menu Info</h3></header>
    <div class="module_content">
     <form action="<?php echo base_url(); ?>create_and_manage/update_menu_info" method="POST">
         
         <input type="hidden" name="menu_id" value="<?php echo $menu_info->menu_id; ?>"/>   
         <fieldset class="divide_form">
                <label>Menu  Name</label>
                <input type="text" name="menu_name" maxlength="50" value="<?php echo $menu_info->menu_name; ?>">
            </fieldset>
            <fieldset class="divide_form">
                <label>Menu  Order</label>
                <select name="menu_widget_order"  maxlength="50">
                    <option value="0" <?php if($menu_info->menu_widget_order==0){echo "selected";} ?>>Select Menu Order ....</option>
                    <option value="1" <?php if($menu_info->menu_widget_order==1){echo "selected";} ?>>Left</option>
                    <option value="2" <?php if($menu_info->menu_widget_order==2){echo "selected";} ?>>Right</option>
                </select>
            </fieldset>
            <fieldset class="divide_form">
                <label>Menu  Dropdown</label>
                <select name="menu_dropdown"  maxlength="50" id="menu_dropdown">
                    <option value="none">Select Dropdown Menu ..... </option>
                    <option value="dropdown">Dropdown Menu</option>
                    <?php foreach($view_menus as $v_menu){ ?>
                    <option value="<?php echo $v_menu->menu_id; ?>"</option> <?php echo $v_menu->menu_name; ?></option>
                    <?php }?> 
                </select>
            </fieldset>
            <fieldset class="divide_form">
                <select name="menu_category"  maxlength="50" id="menu_category">
                    <option value="">Select Menu Category ....</option>
                    <?php foreach($view_category as $v_category){ ?>
                    <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                    <?php }?> 
                </select>
            </fieldset>

         <div class="clear"></div>

    </div>
    <footer>
        <div class="submit_link">
            <input type="text" name="menu_serial" value="<?php  echo $menu_info->menu_serial; ?>" size="2"/>
            <input type="radio" name="menu_status" value="1" <?php if($menu_info->menu_status==1){echo "checked";} ?> />Published
            <input type="radio" name="menu_status" value="0" <?php if($menu_info->menu_status==0){echo "checked";} ?> />Unpublished 
            <input type="submit" value="Update Menu" class="alt_btn">
            <input type="reset" value="Reset">
        </div>
    </footer>
</form> 

</article><!-- end of post new article -->

<script type="text/javascript">
    document.getElementById('menu_dropdown').value="<?php echo $menu_info->menu_dropdown; ?>";
</script>
<script type="text/javascript">
    document.getElementById('menu_category').value="<?php echo $menu_info->menu_category; ?>";
</script>
