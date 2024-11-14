<?php 
/* Template name: About */
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
get_header();
?> 
<?php
$thumbnail_id = get_post_meta($post->ID, '_thumbnail_id', TRUE);
$image_data = wp_get_attachment_image_src($thumbnail_id , 'banner-img');
?>
       <div class="banner" style="background: linear-gradient(236deg, rgba(218,36,113,0.20211834733893552) 0%, rgba(87,19,102,0.20211834733893552) 52%, rgba(13,57,111,0.7595413165266106) 77%, rgba(13,57,111,0.87718837535014) 90%, rgba(13,57,111,1) 100%), url(<?php echo $image_data[0];?>) no-repeat center center/cover;">     

      <div class="banner-text" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
              <h1><?php echo get_field('banner_heading');?></h1>
              <p><?php echo get_field('banner_content');?></p>
              <a href="<?php echo get_field('b_link');?>" class="btn fill"><?php echo get_field('b_link_text');?></a>         
      </div>
  </div>
  <!-- Banner-section-End-->
   <div class="content-sec black-content">
    <div class="container">
      <div class="bottom-banner border-btn">
                <div class="flex">
                  <div class="left">
                    <ul>
                    <?php                                
                        while( have_rows('banner_about') ): the_row();
                            $text_1     =  get_sub_field('text_1'); 
                            $text_2   =  get_sub_field('text_2');  
                    ?>
                      <li>
                        <span><?php echo $text_1;?> </span>
                        <strong><?php echo $text_2;?></strong>
                      </li>
                    <?php endwhile;?>                     
                    </ul>
                  </div>
                  <div class="right">
                    <p><?php echo get_field('b_content');?></p>                  
                  </div>
                </div>
              </div>
             </div>
          </div>
   <div class="content-full-width"  data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
    <div class="container">
      <h4><?php echo get_field('content_heading');?></h4>
    </div>    
  </div>
  <div class="two-block-content black-content">
    <div class="container">
      <div class="flex">
        <div class="left"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
        <?php echo get_field('content_detail');?>
        </div>
        <div class="right"  data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
          <div class="resources-book flex">
            <div class="resources-book-set">
              <img src="<?php echo get_field('img_right');?>" alt="">
              <div class="resources-content">
                <strong><a href="<?php echo get_field('c_link');?>" target="_blank"><?php echo get_field('c_link_text');?></a></strong>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="partner-content">
    <div class="container">
      <div class="flex">
        <div class="left"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
          <img src="<?php bloginfo("template_url")?>/img/qts.png" alt="">
          <h3><?php echo get_field('bl_title');?></h3>
        </div>
        <div class="right"  data-aos="fade-keft" data-aos-duration="1000" data-aos-delay="200">
        <?php echo get_field('bl_content');?>
        <strong><?php echo get_field('bl_name');?></strong>
        <span><?php echo get_field('bl_position');?></span>
        </div>
      </div>
    </div>
  </div>

  <div class="team-box">
    <div class="container">
      <div class="flex">
        <div class="left"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
          <b><?php echo get_field('p_title');?></b>
          <h4><?php echo get_field('p_heading');?></h4>
        </div>
        <div class="right">
          <div class="team-sec">
            <div class="flex">
                <?php  
                  $i=2;                              
                      while( have_rows('team_partners') ): the_row();
                          $p_image     =  get_sub_field('p_image'); 
                          $p_name      =  get_sub_field('p_name');  
                          $p_position  =  get_sub_field('p_position'); 
                          $p_phone     =  get_sub_field('p_phone');
                          $p_email     =  get_sub_field('p_email'); 
                ?>
              <div class="team-white"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i;?>00">
                <img src="<?php echo $p_image;?>" alt="">
                <div class="team-content">
                  <strong><?php echo $p_name;?></strong>
                  <span><?php echo $p_position;?></span>
                  <a href="tel:<?php echo $p_phone;?>"><?php echo $p_phone;?></a> 
                  <a href="mailto:<?php echo $p_email;?>"><?php echo $p_email;?></a>
                </div>
              </div>
              <?php $i=$i+1; endwhile;?>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php endwhile; endif;?> 
  <?php get_footer();?>