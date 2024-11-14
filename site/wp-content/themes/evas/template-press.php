<?php 
/* Template name: Press */
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
get_header();
?> 

  <!-- insight-section-start-->
  <div class="top-gap">
       <div class="insights">
        <div class="container">
        <span data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100"><?php the_title();?></span>
        <div class="pressrelease"> 
        <div class="flex" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
          <div class="left">
           <h2><?php echo get_field('banner_heading');?></h2>
          </div>
          <div class="right">
            <b>Stay current with our latest release</b>
            <input type="email" placeholder="Enter your email id">
            <img src="<?php bloginfo("template_url")?>/img/arrow.png" alt="">
          </div>
        </div>
        </div>
      <div class="press-release-sec">
      <?php
             $args = array(         
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'post_type' => 'press'	
                
                );
            
            $press_query = new WP_Query( $args ); ?>
            <?php                    
                
                    if( $press_query->have_posts()) {      
                      $i=1;                                                 
                        while ($press_query->have_posts()) : $press_query->the_post(); 
                            $prtitle          =   get_the_title(); 
                            $primage          =   wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
                            $primaged         =   $primage[0];  
                            $prdate           =   get_field('press_date'); 
                            $prlogo           =   get_field('press_logo'); 
                            $primaged         =   $primage[0];                            
                            $prpermalink      =   get_the_permalink();                             
            ?>
            <?php 
               if($i%2==0){
              $class = "reverse";
               }
              else {
                $class = " ";
              }
            
            ?>
        <div class="press-release-block" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
          <div class="flex <?php echo $class;?>">
            <div class="release-img">
              <img src="<?php echo $primaged;?>" alt="">
            </div>
            <div class="release-content">
              <img src="<?php echo $prlogo;?>" alt="">
              <span><?php echo $prdate;?> </span>
              <h3><?php echo $prtitle;?></h3>
                <a href="<?php //echo $prpermalink;?>" class="btn line black">LEARN MORE</a>
            </div>
          </div>
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
      </div>
       <!-- insight-section-end-->

    <?php endwhile; endif;?> 
    <?php get_footer();?>