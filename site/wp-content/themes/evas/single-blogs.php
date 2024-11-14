<?php
get_header();
?> 
  <!-- Banner-section-Start-->      
<?php
$thumbnail_id = get_post_meta($post->ID, '_thumbnail_id', TRUE);
$image_data = wp_get_attachment_image_src($thumbnail_id , 'banner-img');
?>
  <div class="banner" style="background:linear-gradient(270deg, rgba(41,82,143,0.07326680672268904) 0%, rgba(41,82,143,0.7931547619047619) 60%, rgba(41,82,143,0.9220063025210083) 70%, rgba(41,82,143,1) 100%), url(<?php echo $image_data[0];?>) no-repeat center center/cover;">
          <div class="banner-text" data-aos="fade-in" data-aos-duration="1000"  data-aos-delay="100">
              <h1><?php the_title();?></h1>
              <?php echo get_field('banner_heading');?>      
          </div>
      </div>
      <!-- Banner-section-End-->

      <div class="icv-block">
        <div class="container">
          <div class="flex">
         
            <div class="right" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <?php the_content();?> 				
            </div>
          </div>
        </div>
      </div>
      
      
    
     
     <!-- insight-section-start-->
     <div class="insights">
      <div class="container">
      <span data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100"><?php echo get_field('in_title',8);?></span>
      <div class="news-letter"> 
      <div class="flex" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
        <div class="left">
         <h2><?php echo get_field('in_heading',8);?></h2>
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
                'post__not_in' => array( $post->ID ), 
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
  <img src="<?php echo $bimage['sizes']['blog-thumb'];?>" alt="Evas Insights">
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
 
    <?php get_footer();?>