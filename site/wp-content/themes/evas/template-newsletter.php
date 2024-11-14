<?php 
/* Template name: Newsletter */
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
get_header();
?> 

  <!-- insight-section-start-->
  <div class="top-gap">
       <div class="insights">
        <div class="container">
        <span data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100"><?php echo get_the_title();?></span>
        <div class="news-letter"> 
        <div class="flex" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
          <div class="left">
           <h2><?php echo get_field('banner_heading');?></h2>
          </div>
          <div class="right">
            <b>Stay current with our latest tips</b>
            <input type="email" placeholder="Enter your email id">
            <img src="<?php bloginfo("template_url")?>/img/arrow.png" alt="">
          </div>
        </div>
        </div>
      <div class="news-letter-content">
        <div class="flex">
        <?php 
          $i=1;                               
            while( have_rows('up_newletter') ): the_row();
                $n_image   =  get_sub_field('n_image'); 
                $n_title   =  get_sub_field('n_title');  
                $n_date    =  get_sub_field('n_date');   
                $n_link    =  get_sub_field('n_link');                  
         ?> 
          <div class="news-letter-block" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i;?>00">
            <div class="flex">
              <div class="news-letter-img">
                <img src="<?php echo $n_image;?>" alt="">
              </div>
              <div class="news-sec-content">
                <h3><?php echo $n_title;?></h3>
                <span><?php echo $n_date;?></span>
                <a href="<?php echo $n_link;?>" class="btn outline" target="_blank"><img src="<?php bloginfo("template_url")?>/img/arrow-down.svg" alt="">DOWNLOAD</a>
              </div>
            </div>
          </div>
      <?php $i++; endwhile;?>
          
        </div>
        
      </div>
      </div>
      </div>
       </div>
      </div>
       <!-- insight-section-end-->

    <?php endwhile; endif;?> 
    <?php get_footer();?>