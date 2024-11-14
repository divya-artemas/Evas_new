<?php 
/* Template name: ADGM */
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
<div class="banner" style="background:linear-gradient(270deg, rgba(41,82,143,0.07326680672268904) 0%, rgba(41,82,143,0.7931547619047619) 60%, rgba(41,82,143,0.9220063025210083) 70%, rgba(41,82,143,1) 100%), url(<?php echo $image_data[0];?>) center center/cover;">
      
    <div class="banner-text" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
      <h1><?php echo get_the_title();?></h1>
      <?php the_content();?>
    </div>
  </div>
  <!-- Banner-section-End-->

    <!-- Appointment-sec-content-->
    <div class="two-sec bg-white">
      <div class="container">
        <div class="flex">
          <div class="left" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100"> 
           <?php echo get_field('service_contents');?>
			   <?php if( get_field('ct_title','option') ){ ?>
        <div class="direct-contact" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
          <b><?php echo get_field('ct_title','option');?></b>
          <ul data-aos="fade-in" data-aos-duration="1000" data-aos-delay="200">
          <?php if( get_field('sct_phone','option') ){ ?>
      	 <?php
                                $str_phone     = get_field('sct_phone','option');
                                $string_r 	   = str_replace("-","",$str_phone);
                                $stru_r 	   = str_replace(" ","",$string_r);
													  ?>
            <li>
              <a href="tel:<?php echo $stru_r;?>"><img src="<?php bloginfo("template_url")?>/img/phone-call.png" alt=""><?php echo get_field('sct_phone','option');?></a>
            </li>
          <?php } ?>
          <?php if( get_field('sct_email','option') ){ ?>
            <li><a href="mailto:<?php echo get_field('sct_email','option');?>"><img src="<?php bloginfo("template_url")?>/img/email-new.png" alt=""><?php echo get_field('sct_email','option');?></a></li>
          <?php } ?>
          </ul>
        </div>
        <?php } ?>
          </div>
          <div class="right" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <h3>Schedule an appointment </h3>
           <?php echo do_shortcode('[contact-form-7 id="388" title="Service form"]');?>
          </div>
        </div>
       
      </div>
    </div>
    <!-- Appointment-sec-content-->
  <!-- Services-section-Start-->
  <div class="services">
    <div class="container">     
      <div class="service-list">
        <div class="service-set flex">
          <div class="service-flex white-trans" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
            <h3>Our Services<?php //echo get_field('service_heading',8);?></h3>
          </div>
          <?php
                $i=1;                  
                while( have_rows('our_services',8) ): the_row();
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
        <a href="<?php echo home_url();?>/ourservices" class="btn line black">See all services</a>
      </div>
    </div>
  </div>
  <!-- Services-section-End-->



   <!-- Accordian-one-section-Start --> 
  <?php  if( have_rows('acc_faqs') ){?>
<div class="first-accordian">
<div class="medium-container">
 <h2 data-aos="fade-in" data-aos-duration="1000" data-aos-delay="200"><?php echo get_field('faq_title');?></h2>
    <div class="common-flex">
      <div class="accordian-sec" class="customer-head" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" >
        <div class="accordion-items">
                <?php  
                  $i=1;                              
                      while( have_rows('acc_faqs') ): the_row();
                          $faq_question     =  get_sub_field('faq_question'); 
                          $faq_answer       =  get_sub_field('faq_answer');  
                ?>
                <?php if($i==1){
                  $class = "open";
                }
                else{
                  $class = " ";
                }
                ?>
          <div class="accordion-heading <?php echo $class;?>"><h3><?php echo $faq_question;?></h3></div>
          <div class="accordion-content <?php echo $class;?>"><?php echo $faq_answer;?>
          </div>
              <?php $i++; endwhile; ?>    
            </div>
        </div>
  </div>
</div>

</div> 
              <?php } ?> 
<!-- Accordian-one-section-End --> 

 
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
                'post_type' => 'blogs'	
                
                );
            
            $blogs_query = new WP_Query( $args ); ?>
            <?php                    
                
                    if( $blogs_query->have_posts() ) {      
                      $i=1;                                                 
                        while ($blogs_query->have_posts()) : $blogs_query->the_post(); 
                            $btitle          =   get_the_title(); 
                            $bimage          =   get_field('bl_thumbnail_image');  
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