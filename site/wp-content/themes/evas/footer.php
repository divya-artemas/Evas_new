     
     <!-- Full-width-section-Start-->
<?php $ft_background_image = get_field('ft_background_image','option'); ?>
     <div class="full-width country-sec" style="background: url(<?php echo $ft_background_image['sizes']['banner-img'];?>) no-repeat center center/cover;">
      <div class="container">
        <div class="full-width-content" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
          <h3><?php echo get_field('ft_heading','option');?></h3>
          <div class="country-links first-link">
          <ul>
            <?php                                 
                while( have_rows('c_links','option') ): the_row();
                  $c_name  =  get_sub_field('c_name'); 
                  $c_link  =  get_sub_field('c_link'); 
            ?>
              <li> 
                <a href="<?php echo $c_link;?>"><?php echo $c_name;?></a>
              </li>
          <?php endwhile;?>          
        </ul>
      </div>
          <p><?php echo get_field('contact_title','option');?></p>
         <div class="contact-links">
          <ul>
			  				<?php
                                $ftr_phone     = get_field('ct_phone','option');
                                $string1 	   = str_replace("-","",$ftr_phone);
                                $stringtu1 	   = str_replace(" ","",$string1);
			  
			  					$ftr_phone2     = get_field('ct_phone_2','option');
                                $string2 	   = str_replace("-","",$ftr_phone2);
                                $stringtu2 	   = str_replace(" ","",$string2);
                             ?>
            <li>
              <a href="tel:<?php echo $stringtu1;?>"><img src="<?php echo get_field('phone_icon','option');?>" alt=""><?php echo get_field('ct_phone','option');?></a>				
            </li>				
			  <li> <a href="tel:<?php echo $stringtu2;?>"><img src="<?php echo get_field('phone_icon','option');?>" alt=""><?php echo get_field('ct_phone_2','option');?></a></li>			  
            <li>
              <a href="mailto:<?php echo get_field('ct_email','option');?>"><img src="<?php echo get_field('email_icon','option');?>" alt=""><?php echo get_field('ct_email','option');?></a>
            </li>
          </ul>
         </div>
        </div>
      </div>
    </div>
    <!-- Full-width-section-End-->

</div>
 <!-- Footer-section-Start-->
 <div class="footer">
  <div class="container">
    <div class="top-footer" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
      <div class="flex">
        <div class="logo-sec">
          <img src="<?php echo get_field('header_logo','option');?>" alt="Evas Logo">
        </div>
        <div class="nav-links"> 
			    
      
			
			<!--------- Service Menu  ---------------------------->
			 <?php
              // Get list of all taxonomy terms  -- In simple categories title
              $args = array(
                          'taxonomy' => 'service_categories',
                          'orderby' => 'name',
                          //'order'   => 'DESC'
                      );
              $cats = get_categories($args);
              // For every Terms of custom taxonomy get their posts by term_id
              foreach($cats as $cat) {
				  $cname = $cat->name;				 
          ?>
			<ul>
				<li><b><?php echo $cat->name; ?></b></li>
				  <?php if ($cname == "Taxation and Compliance") { ?>
				 <li>
					  <a href="https://mwduat.com/evas/site/ourservices/#Taxation-and-Compliance">Indirect Tax</a>
				 <ul>
					  
						 
							    <li><a href="https://mwduat.com/evas/site/services/value-added-tax/">Value Added Tax</a></li>
					  <li><a href="https://mwduat.com/evas/site/services/excise-tax/">Excise Tax</a></li>
					  <li><a href="https://mwduat.com/evas/site/services/customs/">Customs</a></li>
						  </ul>   
					 </li>
					
				
				<?php }?>
				 <?php
                // Query Arguments
                $args = array(
                    'post_type' => 'services', // the post type
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'service_categories', // the custom vocabulary
                            'field'    => 'term_id',          // term_id, slug or name  (Define by what you want to search the below term)    
                            'terms'    => $cat->term_id,      // provide the term slugs
                        ),
                    ),
                );
                $the_query = new WP_Query( $args );                
                if ( $the_query->have_posts() ) {
              ?>
				<?php
                    $i=1;
                    while ( $the_query->have_posts() ) {
                      $the_query->the_post();
                        $stitle     =  get_the_title();
                        $spermalink =  get_permalink();
                    ?>
				 <li>
                    <a href="<?php echo $spermalink;?>"><?php echo $stitle;?></a>
                    </li>
                  <?php $i++; } ?> 
				  <?php 
                } else {
                    // no posts found
                }
                wp_reset_postdata(); // reset global $post;
              ?>
			</ul>
			<?php } ?>  
			
			<!-----------Service Menu ---------------------------->
              
            <?php /*
				<?php
                            $defaults = array(
                                'menu' => 'Service Menu Footer',
                                'after' => '',
                                'items_wrap' => '<ul><li><b>Assurance services</b></li>%3$s</ul>',
                                'theme_location' => 'service_right',
                                'depth' => 0,
                                'container' => false,
                                'walker'    => new themeslug_walker_nav_menu
                                );
                                wp_nav_menu($defaults);
              ?>
								<?php
                            $defaults = array(
                                'menu' => 'Service Menu Footer',
                                'after' => '',
                                'items_wrap' => '<ul><li><b>Assurance services</b></li>%3$s</ul>',
                                'theme_location' => 'service_right',
                                'depth' => 0,
                                'container' => false,
                                'walker'    => new themeslug_walker_nav_menu
                                );
                                wp_nav_menu($defaults);
              ?>
								<?php
                            $defaults = array(
                                'menu' => 'Service Menu Footer',
                                'after' => '',
                                'items_wrap' => '<ul><li><b>Assurance services</b></li>%3$s</ul>',
                                'theme_location' => 'service_right',
                                'depth' => 0,
                                'container' => false,
                                'walker'    => new themeslug_walker_nav_menu
                                );
                                wp_nav_menu($defaults);
              ?>
								<?php
                            $defaults = array(
                                'menu' => 'Service Menu Footer',
                                'after' => '',
                                'items_wrap' => '<ul><li><b>Assurance services</b></li>%3$s</ul>',
                                'theme_location' => 'service_right',
                                'depth' => 0,
                                'container' => false,
                                'walker'    => new themeslug_walker_nav_menu
                                );
                                wp_nav_menu($defaults);
              ?>
			  */ ?>
			
			<?php
                            $defaults = array(
                                'menu' => 'Footer Menu',
                                'after' => '',
                                'items_wrap' => '<ul><li><b>Quick Links</b></li>%3$s</ul>',
                                'theme_location' => 'footer',
                                'depth' => 0,
                                'container' => false,
                                'walker'    => new themeslug_walker_nav_menu
                                );
                                wp_nav_menu($defaults);
                    ?>
	   <?php
                            $defaults = array(
                                'menu' => 'Footer Menu Right',
                                'after' => '',
                                'items_wrap' => '<ul><li><b>See More</b></li>%3$s</ul>',
                                'theme_location' => 'footer_right',
                                'depth' => 0,
                                'container' => false,
                                'walker'    => new themeslug_walker_nav_menu
                                );
                                wp_nav_menu($defaults);
              ?>
			
			
        
        </div>
      </div>
    </div>
    <div class="bottom-footer" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="200">
      <div class="flex">
        <div class="social-links">
          <ul>
            <?php                                 
                while( have_rows('social_links','option') ): the_row();
                  $social_image   =  get_sub_field('social_image'); 
                  $s_link         =  get_sub_field('s_link'); 
            ?>
            <li>
              <a href="<?php echo $s_link;?>" target="_blank"><img src="<?php echo $social_image;?>" alt=""></a>
            </li>
          <?php endwhile;?>
          </ul>
        </div>
        <div class="copyright">
          <p><?php echo get_field('copyright_text','option');?></p>
        </div>
      </div>
    </div>
  </div>
 </div>

  <a href="https://api.whatsapp.com/send?phone=971557089956" class="whatsapp-float" target="_blank">
   <img src="https://mwduat.com/evas/site/wp-content/uploads/2024/07/whatapp-white.svg" alt="">
  </a>
 <!-- Footer-section-end-->

    <script type="text/javascript" src="<?php bloginfo("template_url")?>/src/jquery-min.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url")?>/src/flickity.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url")?>/src/aos.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url")?>/src/custom.js"></script>
<script type="text/javascript">
//$("#nemail").unwrap();
</script>
    <?php wp_footer(); ?>

  </body>
</html>


