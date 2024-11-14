<?php 
/* Template name: Home */
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
get_header();
?> 

  <!-- Banner-section-Start-->
    
<?php
$thumbnail_id = get_post_meta($post->ID, '_thumbnail_id', TRUE);
$image_data = wp_get_attachment_image_src($thumbnail_id , 'banner-img');
?>
<div class="banner" style="background: url(<?php echo $image_data[0];?>) no-repeat center top/cover;">  
<!-- 	<div class="banner" style="background: url(<?php //echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>) no-repeat center top/cover;">  -->
   
  <div class="banner-text" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
      <div class="carousel" data-flickity='{ "freeScroll": false, "contain": false, "prevNextButtons": false, "pageDots": true }'>
      <?php                                
          while( have_rows('banner_slider') ): the_row();
              $banner_title     =  get_sub_field('banner_title'); 
              $banner_content   =  get_sub_field('banner_content');  
              $banner_link_text =  get_sub_field('banner_link_text');   
              $banner_link      =  get_sub_field('banner_link');                  
      ?> 
          <div class="carousel-cell">
            <h1><?php echo $banner_title;?></h1>
            <p><?php echo $banner_content;?></p>
            <a href="<?php echo $banner_link;?>" class="btn fill golden"><?php echo $banner_link_text;?></a></div>
     <?php endwhile;?>  
    </div>
               
      <div class="bottom-banner">
          <div class="flex">
              <div class="left">
                <ul>
                      <?php                                
                        while( have_rows('banner_about') ): the_row();
                            $text_1     =  get_sub_field('text_1'); 
                            $text_2     =  get_sub_field('text_2');  
                      ?> 
                        <li>
                          <span><?php echo $text_1;?> </span>
                          <strong> <?php echo $text_2;?></strong>
                        </li>
                        <?php endwhile;?>                        
                      </ul>
                    </div>
                    <div class="right">
                      <p><?php echo get_field('b_content');?></p>
                      <a href="<?php echo get_field('b_link'); ?>" class="btn line"><?php echo get_field('b_link_text'); ?></a>
                    </div>
                  </div>
                </div>   
              </div>
    </div>
    <!-- Banner-section-End-->
    <!-- Services-section-Start-->
    <div class="services" id="services">
      <div class="container">     
        <div class="service-list">
          <div class="service-set flex">
            <div class="service-flex white-trans" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
              <h3><?php echo get_field('service_heading'); ?></h3>
            </div>
            <?php
                $i=1;                  
                while( have_rows('our_services') ): the_row();
                    $service_image   =  get_sub_field('service_image'); 
                    $service_name    =  get_sub_field('service_name');  
                    $service_link    =  get_sub_field('service_link');                    
            ?> 
            <div class="service-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i;?>00">
              <a href="<?php echo $service_link;?>">              
                  <img src="<?php echo $service_image;?>" alt="" />
                  <p><?php echo $service_name;?></p>            
              </a>
            </div>
            <?php $i++; endwhile;?>            
          </div>         
        </div>
      </div>
    </div>
    <!-- Services-section-End-->
    <!-- Announcement section-Start-->
<?php $an_bg_img = get_field('an_bg_image'); ?>

    <div class="full-width" style="background: url(<?php echo $an_bg_img['sizes']['banner-img'];?>) no-repeat center center/cover;">
      <div class="container">
        <div class="full-width-content" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
    		<h3><?php echo get_field('an_title');?></h3>
            <?php echo get_field('an_content');?>
           <a href="<?php echo get_field('an_link');?>" class="btn line"><?php echo get_field('an_link_text');?></a>
        </div>
      </div>
    </div>
    <!-- Announcement section-End-->
    <!-- Resources-width-section-Start-->
    <div class="resources">
      <div class="medium-container">
        <div class="content-block" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
          <b><?php echo get_field('r_title');?></b>
          <h4><?php echo get_field('r_heading');?></h4>
        </div>
        <div class="resources-book flex">
        <?php
                $i=1;                  
                while( have_rows('r_downloads') ): the_row();
                    $r_image     =  get_sub_field('r_image'); 
                    $r_name      =  get_sub_field('r_name');  
                    $r_link_text =  get_sub_field('r_link_text');  
                    $r_file      =  get_sub_field('r_file');                   
        ?> 
          <div class="resources-book-set" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i;?>00">
            <img src="<?php echo $r_image;?>" alt="" />
            <div class="resources-content">
              <strong><?php echo $r_name;?></strong>
              <a href="<?php echo $r_file;?>" target="_blank"><?php echo $r_link_text;?></a>
            </div>
          </div>
          <?php $i++; endwhile;?>    
        </div>
        <a href="<?php echo get_field('re_link');?>" class="btn fill"><?php echo get_field('re_link_text');?></a>
      </div>
    </div>
    <!-- Resources-section-End-->
 <!-- Full-width-section-Start-->
<?php $im_bg_img = get_field('im_bg_image'); ?>

    <div class="full-width reverse-width" style="background: url(<?php echo $im_bg_img['sizes']['banner-img'];?>) no-repeat center center/cover;">
      <div class="container">
        <div class="full-width-content" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
          <h3><?php echo get_field('bg_title');?></h3>
          <?php echo get_field('im_content');?>
          <a href="<?php echo get_field('im_link');?>" class="btn line"><?php echo get_field('im_link_text');?></a>
        </div>
      </div>
    </div>
    <!-- Full-width-section-End-->
 <!-- News-letter-start-->
   <div class="newsletter" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
    <div class="small-container">
      <span><?php echo get_field('news_title');?></span>
      <h3><?php echo get_field('news_heading');?></h3>
		  <?php echo do_shortcode('[contact-form-7 id="1ca6f44" title="Newsletter Form"]');?>      
    </div>
   </div>
   <!-- News-letter-End-->
 <!-- customers-section-start-->
      <div class="customer">
        <div class="flex">
          <div class="left" style="background: url(<?php echo get_field('cust_bg',8);?>) no-repeat center center/cover;">
<!--             <img src="img/quotes.png" alt=""> -->
           <div class="left-content">
            <strong><?php echo get_field('cust_title');?></strong>
            <h3><?php echo get_field('cust_sub_title');?></h3>
           </div>
          </div>
          <div class="right">
            <div class="carousel"
  data-flickity='{ "freeScroll": false, "contain": false, "prevNextButtons": false, "pageDots": true }'>
			<?php                                 
                while( have_rows('cust_quotes') ): the_row();
                    $cust_image     =  get_sub_field('cust_image'); 
                    $cust_name      =  get_sub_field('cust_name');  
                    $cust_content   =  get_sub_field('cust_content');  
             ?>
			  <div class="carousel-cell">
				<div class="review-content">
			    	<img src="<?php echo $cust_image;?>" alt=""> 
				   <?php echo $cust_content;?>
					<b>- <?php echo $cust_name;?>
					</b>
				</div>
			  </div>
		 <?php endwhile; ?>
		</div>
          </div>
        </div>
      </div>
      <!-- customers-section-end-->

  
     <!-- insight-section-start-->
     <div class="insights">
      <div class="container">
      <span data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100"><?php echo get_field('in_title');?></span>
      <div class="news-letter"> 
      <div class="flex" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
        <div class="left">
         <h2><?php echo get_field('in_heading');?></h2>
        </div>
        <div class="right">
          <b>Stay current with our latest insights</b>
          <input type="email" placeholder="Enter your email id">
          <img src="<?php bloginfo("template_url")?>/img/arrow.png" alt="">
        </div>
      </div>
      </div>
      <div class="insight-list flex">
      <?php
             $args = array(         
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'post_type' => 'blogs'	
                
                );
            
            $blogs_query = new WP_Query( $args ); ?>
      <?php                    
                
                    if( $blogs_query->have_posts() ) {      
                      $i=1;                                                 
                        while ($blogs_query->have_posts()) : $blogs_query->the_post(); 
                            $btitle          =   get_the_title(); 
                            $bimage          =   get_field('bl_thumbnail_image');  
                            
                            // $nimage          =   wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
                            // $nimaged         =   $nimage[0]; 
                                                      
                        $bpermalink      =   get_the_permalink();                             
                ?>
 <div class="insight-set" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i;?>00">
  <img src="<?php echo $bimage['sizes']['blog-thumb'];?>" alt="">
  <p><?php echo $btitle;?></p>
  <a href="<?php echo $bpermalink;?>" class="btn line black">Learn more</a>
 </div> 
                <?php 
                    wp_reset_query();
                    wp_reset_postdata();
                    $i++; endwhile;    
                    }
                ?> 

 
      </div>
    </div>
     </div>
     <!-- insight-section-end-->


<?php endwhile; endif;?> 


<?php get_footer();?>