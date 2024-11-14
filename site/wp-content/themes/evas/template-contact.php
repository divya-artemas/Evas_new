<?php 
/* Template name: Contact */
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
get_header();
?> 

 <!-- Banner-section-start-->
<?php
$thumbnail_id = get_post_meta($post->ID, '_thumbnail_id', TRUE);
$image_data = wp_get_attachment_image_src($thumbnail_id , 'banner-img');
?>
 <div class="banner" style="background: linear-gradient(0deg, rgba(13,57,111,0.7987570028011204) 37%, rgba(13,57,111,0.8015581232492998) 54%), url(<?php echo $image_data[0];?>) no-repeat center bottom/cover;">
    <div class="container">
      <div class="flex">
        <div class="left"> 
          <div class="contact-text" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
            <h1><?php the_title();?></h1>
            <p><?php echo get_field('ct_content');?></p>
           </div>
          </div>
       <div class="right">
       <div class="contact-btn">
        <div class="flex">
          <img src="<?php echo get_field('phone_icon');?>" alt="">
          <div class="contact-wrap">
              <?php                                
                while( have_rows('contact_numbers') ): the_row();
                  $ct_number     =  get_sub_field('ct_number'); 
              ?> 
			 			 <?php                               
                                $re_ct 	   = str_replace("-","",$ct_number);
                                $rect_u    = str_replace(" ","",$re_ct);
                          ?>
                <a href="tel:<?php echo $rect_u;?>"><?php echo $ct_number;?></a>
              <?php endwhile;?>
            </div>
          </div>
       </div>
       <div class="contact-btn">
        <div class="flex">
          <img src="<?php echo get_field('email_icon');?>" alt="">
          <div class="contact-wrap">
            <a href="mailto:<?php echo get_field('ct_email');?>"><?php echo get_field('ct_email');?></a>
          </div>
        </div>
       </div>
      </div>
    </div>
    </div>
    <div class="location-sec">
      <div class="container">
        <h3><?php echo get_field('location_title');?></h3>
        <div class="location-list">
          <div class="flex">
          <?php                                
                while( have_rows('contact_locations') ): the_row();
                  $l_image         =  get_sub_field('l_image'); 
                  $location_name   =  get_sub_field('location_name'); 
                  $l_address       =  get_sub_field('l_address'); 
                  $l_link          =  get_sub_field('l_link'); 
          ?> 
        <div class="location-block">
          <img src="<?php echo $l_image;?>" alt="">  
          <div class="location-content">
            <strong><?php echo $location_name;?></strong>
            <p><?php echo $l_address;?></p>
            <a href="<?php echo $l_link;?>" class="btn line">GET LOCATION</a>
          </div>
        </div>
         <?php endwhile;?>
          </div>
        </div>
      </div>
    </div>
      </div>
      <!-- Banner-section-End-->
 
  <!-- Appointment-sec-content-->
  <div class="two-sec contact-two">
    <div class="container">
      <div class="flex">
        <div class="left" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
          <h3><?php echo get_field('f_heading');?></h3>
          <ul>
              <?php                                
                while( have_rows('f_countries') ): the_row();
                  $l_country      =  get_sub_field('l_country'); 
                  $country_link   =  get_sub_field('country_link'); 
              ?> 
                <li>
                  <a href="<?php echo $country_link;?>"><?php echo $l_country;?></a>
                </li>
            <?php endwhile;?>           
          </ul>
          <p><?php echo get_field('f_content');?></p>
        </div>
        <div class="right" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
        <?php echo do_shortcode(get_field("form_shortcode"));?>
        </div>
      </div>
    </div>
  </div>
  <!-- Appointment-sec-content-->

    <?php endwhile; endif;?> 
    <?php get_footer();?>