<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boligmappa
 */

?>
<!-- site map -->
<div class="site-map">
  <div class="container">
    <div class="col-md-12">
      <div class="site-map__content">
        <div class="site-map__links">
          <div class="row">
                <div class="col-md-4 no-gutter">
                    <div class="site-map__brand">
                        <div class="col-md-12">
                        <a href="<?php echo get_home_url(); ?>">
                            <img class="site-map__brand_image" src="<?php bloginfo('template_url'); ?>/assets/img/boligmappa-logo-412-inverse.png">
                        </a>
                        </div>
                    </div>
                    <div class="site-map__address">
                        <div class="col-md-5">
                            <div class="site-map__address_list">
                            <div class="site-map__address_list_item"><?php  echo nl2br(get_option('footer_number'));?></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="site-map__address_list">
                            <div class="site-map__address_list_item"><?php  echo nl2br(get_option('footer_address'));?></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <ul class="footer-social-links">
                            <li><a href="https://www.facebook.com/boligmappa.no"><img src="<?php bloginfo('template_url'); ?>/assets/img/facebook-logo.png"></a></li>

                            <li><a href="https://www.linkedin.com/company-beta/18006124/"><img src="<?php bloginfo('template_url'); ?>/assets/img/linkedin-logo.png"></a></li>

                            <li><a href="https://www.instagram.com/boligmappa/"><img src="<?php bloginfo('template_url'); ?>/assets/img/instagram-logo.png"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">

                    <?php
                    $menu  = wp_get_nav_menu_items( 'footer_menu' );
                    $prev_id  = -1; 
                    foreach ($menu as $key => $value) {
                    $parent = $value->menu_item_parent;
                    $title = $value->title;
                    $url = $value->url;
                    if($parent  == 0 && $prev_id !=0){
                        if($prev_id != -1){
                        echo "
                            </ul>
                        </div>";
                        }
                        echo '
                    <div class="col-md-3">
                        <ul class="site-map__list">
                        <li class="site-map__listitem--header text-uppercase"><a href="'.$url.'">'.$title.'</a></li>';
                    }
                    else{
                        echo '<li class="site-map__listitem"><a href="'.$url.'">'.$title.'</a></li>';
                    }
                    if($parent  == 0 && $prev_id !=0){

                    }
                    $prev_id = $parent;
                    }
                    echo "
                            </ul>
                        </div>";
                    ?>

                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end of site map -->

<footer class="footer">
  <div class="container">
    <div class="footer__content">
      <div class="footer__content pull-left">
        <p class="footer__text" id="yourID"><?php echo get_theme_mod( 'wedocs_footer_text', 'No copyright information has been saved yet.' ); ?><a href="<?php echo esc_url( get_page_link( 234 ) ); ?>">Vilkår</a></p>
      </div>
      <div class="footer__content pull-right">
        <p class="footer__text" id="yourID2"><?php echo get_theme_mod( 'wedocs_footer_contact', 'No copyright information has been saved yet.' ); ?><a href="mailto:kundeservice@boligmappa.no">:kundeservice@boligmappa.no<a/></p>
      </div>
    </div>
  </div> 
</footer>
<!-- end of footer -->
        
<!-- Side Navigation -->
<?php get_template_part('template-parts/navigation');?>
<!-- // Side Navigation -->

<?php wp_footer(); ?>
