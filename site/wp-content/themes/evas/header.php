<!DOCTYPE html>
<html lang="EN">
  <head>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php wp_title();?></title>
    <!-- Customizable CSS -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <?php wp_head(); ?>
  </head>

  <body <?php body_class();?>>
    <!-- Header-section-end-->
	
    <div class="outer">
      <div class="header">
        <div class="top-header">
          <div class="container">
            <div class="flex">
              <div class="left-top">
               <ul>
                  <li>
                    <a href="#"><img src="<?php bloginfo("template_url")?>/img/uae.png" alt="" />UAE</a
                    >
                  </li>
                   <!-- <li>
                    <a href="#"><img src="img/india.png" alt="" />INDIA</a>
                  </li>
                  <li>
                    <a href="#"><img src="img/switxerland.png" alt="" />SWITZERLAND</a>
                  </li>-->
                </ul> 
              </div>
              <div class="right-top">
                <div class="language">
                  <!-- <ul>
                    <li>
                      <a href="#" class="active-language">EN</a>
                    </li>
                    <li>
                      <a href="#">/ AR</a>
                    </li>
                  </ul>-->
                </div>
                <ul> 
                  <?php  
	$i=1;
                     while( have_rows('contacts_no','option') ): the_row();
                        $ct_icon    =  get_sub_field('ct_icon'); 
                        $ct_number  =  get_sub_field('ct_number'); 
                  ?> 
							<?php
                               
                                $stringt 	   = str_replace("-","",$ct_number);
                                $stringtu 	   = str_replace(" ","",$stringt);
                             ?>
					<?php  if($i==3){ ?>
					  <li>
                   <a href="https://api.whatsapp.com/send?phone=971557089956" target="_blank"><img src="<?php echo $ct_icon;?>" alt="" /><?php echo $ct_number;?></a>					  
                  </li>						
					<?php } else{ ?>
                  <li>           
					   <a href="tel:<?php echo $stringtu;?>" target="_blank"><img src="<?php echo $ct_icon;?>" alt="" /><?php echo $ct_number;?></a>
                  </li>
					<?php } ?>
                 
                  <?php $i++; endwhile;?> 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="second-header">
          <div class="container flex">
            <header>
              <div class="logo">
                <a href="<?php echo home_url();?>"><img src="<?php echo get_field('header_logo','option');?>" alt="Evas Logo" /></a>
              </div>
              <nav>
                   <?php
                            $defaults = array(
                                'menu' => 'Header Menu',
                                'after' => '',
                                'items_wrap' => '<ul>%3$s</ul>',
                                'theme_location' => 'header',
                                'depth' => 0,
                                'container' => false,
                                'walker'    => new themeslug_walker_nav_menu
                                );
                                wp_nav_menu($defaults);
                    ?>
                <div class="mobile-only">
                  <a href="<?php echo home_url();?>/contact-us" class="btn"> CONTACT US </a>
                </div>
              </nav>
              <div class="header-btn">
                <a href="<?php echo home_url();?>/contact-us" class="btn fill"> CONTACT US </a>
              </div>
              <div id="hamburger-1" class="menu-toggle hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
              </div>
            </header>
          </div>
        </div>
      </div>
      <!-- Header-section-end-->

