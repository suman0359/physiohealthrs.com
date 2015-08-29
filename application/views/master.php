<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php if(isset($show_post->blog_title)){echo $show_post->blog_title." | "; }?> Rising Sun Physiotherapy & Health </title>
        <link href="<?php echo base_url(); ?>css/stylesheet.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>css/dropdown.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?php echo base_url(); ?>css/adsense_style.css" rel="stylesheet" type="text/css"/>
        
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style_form.css" />
        
        <script>
            // var alt=alert("This Site is Under Construction");
            document.write(onload(alt));
        </script>
        <!--jQuery Auto Populate Search-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
                  $(function() {
                      var availableTags = [
                          <?php 
                          $sql = mysql_query("SELECT * FROM tbl_news_blog WHERE blog_publication_status=1 ");
                          while ($search = mysql_fetch_array($sql)) { ?>
                              {label: "<?php echo $search['blog_title'];?>", the_link: "<?php echo base_url(); ?>welcome/read_more/<?php echo $search['blog_id']; ?>"},
                          <?php  }
                          ?>
                          
                      ];
                      $("#tags").autocomplete({
                          source: availableTags,
                          select: function(e, ui) {
                              location.href = ui.item.the_link;
                              //  console.log(ui.item.the_link);
                          }
                      });
                  });
        </script>

        <!-- ------------------------- -->

        <!-- New Sliding Image Gallery Script -->
        <link rel='stylesheet' id='camera-css'  href='<?php echo base_url(); ?>css/camera.css' type='text/css' media='all'> 
        <style>

            a{text-decoration: none; color: #000;}
            a:hover {
                text-decoration: none;
            }
            #back_to_camera {
                clear: both;
                display: block;
                height: 80px;
                line-height: 40px;
                padding: 20px;
            }
            .fluid_container {
                margin: 0 auto;
                margin-top: 10px;
                max-width: 1000px;
                width: 100%;
            }
        </style>

        <script type='text/javascript' src='<?php echo base_url(); ?>scripts/jquery.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>scripts/jquery.mobile.customized.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>scripts/jquery.easing.1.3.js'></script> 
        <script type='text/javascript' src='<?php echo base_url(); ?>scripts/camera.min.js'></script> 

        <script>
            jQuery(function() {

                jQuery('#camera_wrap_1').camera({
                    loader: 'bar',
                    pagination: false,
                    thumbnails: true
                });
            });</script>

        <!-- End Sliding Image Gallery Script -->

    </head>

    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=460101770735306&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>



        <div id="wrapper"> 
            <div id="header"></div> <!-- This is Header Area -->



            <div id="menu"> <!-- Start From Here Menu  -->
                <div class="menu">
                    <ul id="nav">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>

                        <?php foreach ($menu as $value) { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>menu/menu_wise_news/<?php echo $value->menu_link; ?>"><?php echo $value->menu_name; ?></a>
                                <?php if ($value->menu_dropdown == "dropdown") { ?>
                                    <ul>
                                        <?php
                                        $menu = $value->menu_id;

                                        $sql = mysql_query("SELECT * FROM tbl_menu where menu_dropdown='$menu' and menu_status=1 order by menu_serial asc");
                                        while ($dropdown = mysql_fetch_array($sql)) {
                                            ?>  

                                            <li><a href="<?php echo base_url(); ?>menu/menu_wise_news/<?php echo $dropdown['menu_link']; ?>"><?php echo $dropdown['menu_name']; ?></a></li>
                                        <?php } ?>
                                    </ul>

                                </li>
                                <?php
                            }
                        }
                        ?>
                        <li><a href="<?php echo base_url(); ?>menu/menu_wise_news/<?php $menu_link="open_voice"; echo $menu_link; ?>">Open Voice</a></li>
                        <li><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div> <!-- End From Here Menu -->

		<?php
                if (isset($hor_adsense)) {
                    echo $hor_adsense;
                }
                ?>

            <div id="container"> <!-- This is Body Container -->

                <?php
                if (isset($left_widget)) {
                    echo $left_widget;
                }
                ?>



                <!-- This place is for Center News -->
                <?php
                if (isset($center_content) !== NULL) {
                    echo $center_content;
                } else {
                    echo "No Content Found";
                }
                ?>


                <?php 
                if(isset($right_widget) !=NULL){
                    echo $right_widget;
                }
                ?>
            </div> <!-- End From here Body Container -->



            <div id="footer">
                <p align="center">©2014 | All Rights Reserved by RISING SUN PHYSIOTHERAPY &  HEALTH </p>
            </div>
        </div>
    </body>
</html>