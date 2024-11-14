<?php 
/* Template name: Service */
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
get_header();
?> 
<?php
/*
$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
$parent_cat = get_terms('service_categories',$parent_cat_arg);//category name

foreach ($parent_cat as $catVal) {

    echo '<h2>'.$catVal->name.'</h2>'; //Parent Category

    $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
    $child_cat = get_terms( 'category', $child_arg );

    echo '<ul>';
        foreach( $child_cat as $child_term ) {
            echo '<li>'.$child_term->name . '</li>'; //Child Category
        }
    echo '</ul>';

}
*/
?>
  <!-- insight-section-start-->
  <div class="top-gap">
    <div class="service-page">
      <div class="container">
        <div class="services-list" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100"> 
           <h2><?php echo get_field('banner_heading');?></h2>
        </div>    
      </div>
    </div>
  </div>

  <div class="service-list">
    <div class="container">
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
				  $cstring = str_replace(" ", "-", $cname);
          ?>      
      <div class="service-list-sec" id="<?php echo $cstring; ?>">              
        
      <h3 data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100"> <?php echo $cat->name; ?></h3>
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
              <ul>
				  <?php if ($cstring == "Taxation-and-Compliance") { ?>
				 
				  <ul class="s_sublist">
					   <h3>
					  Indirect Tax
				  </h3>
					 <li><a href="https://mwduat.com/evas/site/services/value-added-tax/">Value Added Tax</a></li>
					  <li><a href="https://mwduat.com/evas/site/services/excise-tax/">Excise Tax</a></li>
					  <li><a href="https://mwduat.com/evas/site/services/customs/">Customs</a></li>
				  </ul>
				  
			 <?php } ?>
                  <?php
                    $i=1;
                    while ( $the_query->have_posts() ) {
                      $the_query->the_post();
                        $stitle     =  get_the_title();
                        $spermalink =  get_permalink();
                    ?>
                   <li data-aos="fade-right" data-aos-duration="1000" data-aos-delay="<?php echo $i;?>00">
                    <a href="<?php echo $spermalink;?>"><?php echo $stitle;?></a>
                    </li>
                  <?php $i++; } ?>               
              </ul>
              <?php 
                } else {
                    // no posts found
                }
                wp_reset_postdata(); // reset global $post;
              ?>  
            </div>
            <?php } ?>            
          </div>
       </div>
 


    <!-- customers-section-start-->
      <div class="customer">
        <div class="flex">
          <div class="left" style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 60%, rgba(90,98,109,1) 100%),url(<?php echo get_field('cust_bg',8);?>) no-repeat center center/cover;">
<!--             <img src="img/quotes.png" alt=""> -->
           <div class="left-content">
            <strong><?php echo get_field('cust_title',8);?></strong>
            <h3><?php echo get_field('cust_sub_title',8);?></h3>
           </div>
          </div>
          <div class="right">
            <div class="carousel"
  data-flickity='{ "freeScroll": false, "contain": false, "prevNextButtons": false, "pageDots": true }'>
			<?php                                 
                while( have_rows('cust_quotes',8) ): the_row();
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