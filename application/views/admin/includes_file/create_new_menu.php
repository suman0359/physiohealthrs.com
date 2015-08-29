<?php
$message = $this->session->userdata('successfull');
if ($message) {
    ?>
    <h4 class="alert_info"> <?php echo $message; ?> </h4>
    <?php
    $this->session->unset_userdata('successfull');
} else {
    echo mysql_error();
}
?>
    


<article class="module width_full">
    <header><h3>Create New Menu</h3></header>
    <div class="module_content">
     <form action="<?php echo base_url(); ?>create_and_manage/create_new_menu" method="POST">
            
         <fieldset class="divide_form">
                <label>Menu  Name</label>
                <input type="text" name="menu_name" maxlength="50">
            </fieldset>
            <fieldset class="divide_form">
                <select name="menu_widget_order"  maxlength="50">
                    <option value="0" selected="selected">Select Menu Order ....</option>
                    <option value="1">Left</option>
                    <option value="2">Right</option>
                </select>
            </fieldset>
            <fieldset class="divide_form">
                <select name="menu_dropdown"  maxlength="50">
                    <option value="none" selected="selected">Select Dropdown Menu ..... </option>
                    <option value="dropdown">Dropdown Menu</option>
                    <?php foreach($menu_info as $v_menu){ ?>
                    <option value="<?php echo $v_menu->menu_id; ?>"><?php echo $v_menu->menu_name; ?></option>
                    <?php }?> 
                </select>
            </fieldset>
            <fieldset class="divide_form">
                <select name="menu_category"  maxlength="50">
                    <option value="none" selected="selected">Select Menu Category ....</option>
                    <?php foreach($view_category as $v_category){ ?>
                    <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                    <?php }?>
                </select>
            </fieldset>

         <div class="clear"></div>

    </div>
    <footer>
        <div class="submit_link">
            <input type="text" name="menu_serial" size="2"/>
            <input type="radio" name="menu_status" value="1" />Published
            <input type="radio" name="menu_status" value="0" checked />Unpublished
            <input type="submit" value="Create Menu" class="alt_btn">
            <input type="reset" value="Reset">
        </div>
    </footer>
</form> 

</article><!-- end of post new article -->









<article class="module width_3_quarter">
    <header><h3 class="tabs_involved">All Menu Item</h3></header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter2" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Menu Name</th> 
                        <th>Dropdown</th> 
                        <th>Menu Link</th> 
                        <th>Menu Widget Order</th> 
                        <th>Menu Category</th> 
                        <th>Actions</th> 
                        <th>Publication Status</th>
                        <th>Serial</th>
                    </tr> 
                </thead> 
                <tbody> 
                    <?php 
                        foreach($menu_info as $v_menu){ ?>
                    <tr> 
                        <td><input type="checkbox"></td> 
                        <td><?php echo $v_menu->menu_name; ?></td> 
                        <td><?php echo $v_menu->menu_dropdown; ?></td>
                        <td><?php echo $v_menu->menu_link; ?></td>
                        <td><?php echo $v_menu->menu_widget_order; ?></td> 
                        <td><?php echo $v_menu->menu_category; ?></td> 
                        <td>
                            <a href="<?php echo base_url(); ?>create_and_manage/edit_menu_info/<?php echo $v_menu->menu_id;?>">
                                <input type="image" src="<?php echo base_url(); ?>images/icn_edit.png" title="Edit">
                            </a>
                            <a href="<?php echo base_url(); ?>create_and_manage/delete_menu_info/<?php echo $v_menu->menu_id;?>">
                                <input type="image" src="<?php echo base_url(); ?>images/icn_trash.png" title="Trash" alt="alt" onclick=" return checkDelete();">
                            </a>
                        </td>
                        <td><?php if($v_menu->menu_status==1){ ?> <h4><a href="<?php echo base_url(); ?>create_and_manage/unpublished_menu_status/<?php echo $v_menu->menu_id; ?>"><?php echo "Published"; ?> </a></h4><?php }else{ ?><h4><a href="<?php echo base_url(); ?>create_and_manage/published_menu_status/<?php echo $v_menu->menu_id; ?>"><?php echo "Unpublished";} ?></a></h4></td>
                        <td><?php echo $v_menu->menu_serial; ?></td>
                    </tr> 
                    <?php    
                        }
                        ?>
                    
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->


    </div><!-- end of .tab_container -->
</article><!-- end of content manager article -->