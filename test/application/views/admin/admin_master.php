<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/ie.css" type="text/css" media="screen" />
        <script src="<?php echo base_url(); ?>http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo base_url()?>js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});

    function checkDelete()
    {
        var chr=confirm("Are You Sure to Delete This?");
        if(chr)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo base_url(); ?>super_admin">Website Admin</a></h1>
                        <h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="<?php echo base_url(); ?>" target="_blank" >View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>
                            <?php echo $this->session->userdata('admin_username');
                            ?> (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo base_url(); ?>super_admin">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Content</h3>
		<ul class="toggle">
                    <li class="icn_new_article"><a href="<?php echo base_url(); ?>super_admin/create_a_new_post">New Article</a></li>
                    <li class="icn_tags"><a href="<?php echo base_url(); ?>super_admin/view_all_article">View All Article</a></li>
                    <li class="icn_edit_article"><a href="#">Edit Articles</a></li>
                    <li class="icn_categories"><a href="<?php echo base_url(); ?>super_admin/create_new_category">Categories</a></li>
                    <li class="icn_tags"><a href="#">Tags</a></li>
                        
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
                    <li class="icn_add_user"><a href="<?php echo base_url(); ?>super_admin/create_new_user">Add New User</a></li>
			<li class="icn_view_users"><a href="#">View Users</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
                </ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
                        <li class="icn_security"><a href="<?php echo base_url(); ?>super_admin/change_password">Change Password</a></li>
                        <li class="icn_jump_back"><a href="<?php echo base_url();?>super_admin/logout ">Logout</a></li>
		</ul>
                </ul>
		<h3>Others</h3>
		<ul class="toggle">
                    <li class="icn_settings"><a href="<?php echo base_url(); ?>super_admin/create_new_menu">Create New Menu</a></li>
                    <li class="icn_security"><a href="#">Edit Menu</a></li>
                    <li class="icn_jump_back"><a href="#">View Menu</a></li>
                   
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 Website Admin</strong></p>
			<p>Theme by <a href="#">MediaLoot</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<!-- Start Body Content -->
                
                <?php echo $content; ?>
                
                <!-- End Body Content-->
		<div class="spacer"></div>
	</section>


</body>

</html>