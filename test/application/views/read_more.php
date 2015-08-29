<div id="content_read_more"> <!-- Start From Here Center Container -->
    <div id="body_title"><h2>All News by Ascending</h2></div>
        <div class="title_head">
            <p class="title_news"><?php echo $show_post->blog_title; ?></p>
            <div class="title_content">

                <p>writen by Md. Tasfir Hossain Suman, &T <span>Date 21-12-13 01:32 AM </span></p>
                <p class="content_news"><?php if ($show_post->blog_picture !== NULL) { ?> <img src="<?php echo base_url().$show_post->blog_picture; ?>" /> <?php } ?><?php echo $show_post->blog_description; ?></p>
               
            </div>
            
            <div class="social_btn">
                <ul>
                    <li>
                        <div class="fb-share-button" data-href="<?php echo base_url(uri_string()); ?>" data-width="100"></div> 
                    </li>
                    <li>
                        <div class="fb-share-button" data-href="<?php echo base_url(uri_string()); ?>" data-width="100"></div> 
                    </li>
                    <li>
                        <div class="fb-like" data-href="<?php echo base_url(uri_string()); ?>" data-width="50" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
                    </li>
                    <li>
                        <div class="fb-comments" data-href="<?php echo base_url(uri_string()); ?>" data-numposts="5" data-colorscheme="light"></div>
                    </li>
                </ul>
                
            </div>
            
            <div class="disqus">
                    <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                            var disqus_shortname = 'physiohealth'; // required: replace example with your forum shortname

                            /* * * DON'T EDIT BELOW THIS LINE * * */
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

            </div>
        </div>

</div> <!-- End From Here Center Container -->



