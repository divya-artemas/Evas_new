<?php 
/* Template name: Blog */
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
get_header();
?> 

  <!-- insight-section-start-->
  <div class="top-gap">
       <div class="insights">
        <div class="container">
          <span data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
            <?php echo get_the_title();?>
          </span>
        <div class="news-letter"> 
        <div class="flex" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
          <div class="left">
           <h2><?php echo get_field('banner_heading');?></h2>
          </div>
          <div class="right">
            <b>Stay current with our latest insights</b>
            <input type="email" placeholder="Enter your email id">
            <img src="<?php bloginfo("template_url")?>/img/arrow.png" alt="">
          </div>
        </div>
        </div>
        <div class="insight-list flex gap-mt">
                <?php
                    $args = array(         
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'post_type' => 'blogs'                        
                        );                    
                    $blogs_query = new WP_Query( $args ); 
                ?>
                <?php               
                    if( $blogs_query->have_posts() ) {      
                      $i=1;                                                 
                        while ($blogs_query->have_posts()) : $blogs_query->the_post(); 
                            $btitle          =   get_the_title(); 
                            $bimage          =   get_field('bl_thumbnail_image');  
                            $bpermalink      =   get_the_permalink();                             
                ?>
   <div class="insight-set" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
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
      </div>
       <!-- insight-section-end-->
    

      
    <?php endwhile; endif;?> 
    <?php get_footer();?>