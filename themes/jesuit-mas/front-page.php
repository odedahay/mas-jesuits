<?php get_header(); ?>

<div class="hero-section">
    <div class="container mb-4 ">
        <div class="row p-md-3">
          <?php $homepageBannerDisplay = new WP_Query(array(
                'post_type' => 'banner',
                'posts_per_page' => 1
            ));

            if(get_field('banner_image')){
              $pageBannerImage = get_field('banner_image');
            }else{
                $pageBannerImage = get_theme_file_uri('/images/hero-default-banner.jpg'); 
            }

            while($homepageBannerDisplay->have_posts()){
              $homepageBannerDisplay->the_post(); ?>
                <div class="col-md-6 col-sm-12 px-0 d-flex align-items-center">
                    <div class="hero-section-container">
                        <h1 class="hero-section--title mb-4 pe-md-5"><?php the_field('banner_excerpt'); ?></h1>
                          <p class="hero-section--subtitle margin-btm">  <?php the_field('banner_main_title'); ?></p>
                          <p class="lead mt-4">
                              <a href="<?php the_field('banner_button_link'); ?>" class="btn btn-primary btn-lg">  <?php the_field('banner_button_label'); ?></a>
                        </p>
                    
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 px-0">
                  <img src="<?php $pageBannerImage = get_field('banner_image'); echo $pageBannerImage['sizes']['homepageBannerHalf']; ?>" alt="<?php the_field('banner_main_title'); ?>">
                </div>
            <?php 
            //  var_dump($pageBannerImage);

          } wp_reset_postdata(); ?>
        </div>
    </div>
</div>


<section class="content-section">
  <div class="container">
    <div class="section-container-about">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h2 class="section-title">About Us</h2>
          <?php  
              if( have_rows('about_us') ):
                while( have_rows('about_us') ) : the_row(); 
            ?>
                <p><?php the_sub_field('about_us_description'); ?></p>
                <p class="lead text-center"><a href="<?php the_sub_field('about_us_link'); ?>" class="link-1 text-uppercase">Read More</a></p>
            <?php endwhile;
                endif;
            ?>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
        <?php  
          if( have_rows('about_us') ):
            while( have_rows('about_us') ) : the_row(); 
            $homeAboutUsImage = get_sub_field('about_us_image');
          ?>
          <img src="<?php echo $homeAboutUsImage['sizes']['homepageAboutImage']; ?>" alt="About us">
        <?php endwhile;
                endif;
            ?>
      </div>
    </div>
  </div>
</section>

<section class="content-section bg-green">
  <div class="container">
    <div class="section-container-history">
      <h2 class="section-title text-center font-green">Our History</h2>
      <div class="row generic-content-container g-5 py-4 row-cols-1 row-cols-md-2 justify-content-md-center_">
      <div class="col col-md-8">
      <?php 
        if( have_rows('our_history') ):
          while( have_rows('our_history') ) : the_row(); 
            $homeOurHistory = get_sub_field('our_history');
          ?>
          <img src="<?php echo $homeOurHistory['sizes']['homepageOurHistoryImage']; ?>" alt="" class="img-fluid" /> 
      <?php 
          endwhile;
            endif;
        ?>
      </div>
      <div class="col col-md-4 d-flex align-items-center">
        <div class="list-group ">
          <a href="<?php echo site_url('/our-history/foundation');?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <i class="bi bi-columns"></i>
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Foundation</h6>
                <p class="mb-0 opacity-75">Birth of Ignatius of Loyola</p>
              </div>
              <small class="opacity-50 text-nowrap"><i class="bi bi-arrow-up-right-square"></i></small>
            </div>
          </a>
          <a href="<?php echo site_url('our-history/the-first-companion');?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <i class="bi bi-signpost rounded-circle flex-shrink-0"></i>
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">The First Companion</h6>
                <p class="mb-0 opacity-75">Birth of Francis Xavier</p>
              </div>
              <small class="opacity-50 text-nowrap"><i class="bi bi-arrow-up-right-square"></i></small>
            </div>
          </a>
          <a href="<?php echo site_url('our-history/malaysia-singapore');?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <i class="bi bi-map"></i>
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Malaysia & Singapore</h6>
                <p class="mb-0 opacity-75">Churches Razed to the Ground </p>
              </div>
              <small class="opacity-50 text-nowrap"><i class="bi bi-arrow-up-right-square"></i></small>
            </div>
          </a>
        </div>
      </div>

    </div>
    </div>
  </div>
</section>

<section class="content-section">
  <div class="container">
    <div class="section-container-about">
      <h2 class="section-title font-green">Our Mission</h2>
      <div class="row">
        <div class="col-md-4 px-4 mar-btm-mobile">
          <div class="flip">
            <div class="flip-card">
              <div class="flip-card--content">
                <div class="flip-card--content-front">
                  <img src="<?php echo get_theme_file_uri('/images/icon-spiritual.png')?>" class="flip-logo" alt="Spirituality"/>
                  <h3>Spirituality</h3>
                  <?php  
                    if( have_rows('our_mission') ):
                      while( have_rows('our_mission') ) : the_row(); 
                  ?>
                      <p><?php the_sub_field('spirituality_descriptions'); ?></p>
                  <?php endwhile;
                      endif;
                  ?>
                </div>
                <div class="flip-card--content-back">
                  <h4 class="mb-3">Please visit</h4>
                  <ul class="list-group flip-list-group">
                  <?php  
                    if( have_rows('our_mission') ):
                      while( have_rows('our_mission') ) : the_row(); 
                     ?>
                      <li class="list-group-item flip-list-group-item">
                       <a href="<?php the_sub_field('spirituality_visit_link_1'); ?>" class="flip-list-group-item-link" target="_blank">
                        <i class="bi bi-arrow-right-short"></i> <?php the_sub_field('spirituality_visit_label_1'); ?></a>
                      </li>
                      <li class="list-group-item flip-list-group-item">
                        <a href="<?php the_sub_field('spirituality_visit_link_2'); ?>"  class="flip-list-group-item-link" target="_blank">
                        <i class="bi bi-arrow-right-short"></i> <?php the_sub_field('spirituality_visit_label_2'); ?></a>
                      </li>
                      <?php endwhile;
                      endif;
                    ?>
                  </ul>
                  <br>
                  <p class="lead text-center mt-4"><a href="<?php echo site_url('/mission/spirituality');?>" class="btn btn-secondary btn-lg font-white"><i class="bi bi-chevron-right"></i> Read More</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 px-4 mar-btm-mobile">
          <div class="flip">
            <div class="flip-card">
              <div class="flip-card--content">
                <div class="flip-card--content-front">
                  <img src="<?php echo get_theme_file_uri('/images/icon-parish.png')?>" class="flip-logo" alt="Parish"/>
                  <h3>Parish</h3>
                  <?php  
                    if( have_rows('our_mission') ):
                      while( have_rows('our_mission') ) : the_row(); 
                  ?>
                      <p><?php the_sub_field('parish_descriptions'); ?></p>
                  <?php endwhile;
                      endif;
                  ?>
                </div>
                <div class="flip-card--content-back">
                  <h4 class="mb-3">Please visit</h4>
                  <ul class="list-group flip-list-group">
                  <?php  
                    if( have_rows('our_mission') ):
                      while( have_rows('our_mission') ) : the_row(); 
                     ?>
                    <li class="list-group-item flip-list-group-item"><a href="<?php the_sub_field('parish_visit_link_1'); ?>" class="flip-list-group-item-link" target="_blank">
                      <i class="bi bi-arrow-right-short"></i> <?php the_sub_field('parish_visit_label_1'); ?>"</a></li>
                    <li class="list-group-item flip-list-group-item"><a href="<?php the_sub_field('parish_visit_link_2'); ?>"  class="flip-list-group-item-link" target="_blank">
                      <i class="bi bi-arrow-right-short"></i> <?php the_sub_field('parish_visit_label_2'); ?></a></li>
                      <?php endwhile;
                      endif;
                  ?>
                  </ul>
                  <br>
                  <p class="lead text-center mt-4"><a href="<?php echo site_url('/mission/parish');?>" class="btn btn-secondary btn-lg font-white"><i class="bi bi-chevron-right"></i> Read More</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 px-4 mar-btm-mobile">
          <div class="flip">
            <div class="flip-card">
              <div class="flip-card--content">
                <div class="flip-card--content-front">
                  <img src="<?php echo get_theme_file_uri('/images/icon-school.png')?>" class="flip-logo" alt="School"/>
                  <h3>School</h3>
                  <?php  
                    if( have_rows('our_mission') ):
                      while( have_rows('our_mission') ) : the_row(); 
                  ?>
                      <p><?php the_sub_field('school_descriptions'); ?></p>
                  <?php endwhile;
                      endif;
                  ?>
                </div>
                <div class="flip-card--content-back">
                  <h4 class="mb-3">Please visit</h4>
                  <ul class="list-group flip-list-group">
                  <?php  
                    if( have_rows('our_mission') ):
                      while( have_rows('our_mission') ) : the_row(); 
                     ?>
                    <li class="list-group-item flip-list-group-item"><a href="<?php the_sub_field('school_visit_link_1'); ?>" class="flip-list-group-item-link" target="_blank">
                      <i class="bi bi-arrow-right-short"></i><?php the_sub_field('school_visit_label_1'); ?></a></li>
                      <?php endwhile;
                      endif;
                  ?>
                  </ul>
                  <br>
                  <p class="lead text-center mt-4"><a href="<?php echo site_url('/mission/school');?>" class="btn btn-secondary btn-lg font-white"><i class="bi bi-chevron-right"></i> Read More</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content-section bg-grey">
  <div class="container">
    <div class="row g-5 generic-content-container">
      <?php  $offeringPage = array(
          'page_id' => '49'
            );
            $queryFour = new WP_Query( $offeringPage );
            // Check that we have query results.
            if ( $queryFour->have_posts() ) {
            
                // Start looping over the query results.
                while ( $queryFour->have_posts() ) {
            
                    $queryFour->the_post(); ?>

                    <div class="col-md-6">
                      <?php the_post_thumbnail('offeringLandscape'); ?>
                    </div>
                    <div class="col-md-6">
                      <h2 class="section-title">Vocation</h2>
                      <?php the_content(); ?>
                      <a href="<?php echo site_url('/vocation');?>" class="btn btn-secondary btn-lg font-white"><i class="bi bi-chevron-right"></i>  MORE FAQ ABOUT VOCATION</a>
                    </div>
            <?php } 
            } 
        wp_reset_postdata(); 
      ?>
    </div>
  </div>
</section>

<section class="content-section">
  <div class="container">
    <div class="row g-5 generic-content-container">
    <?php  $offeringPage = array(
        'page_id' => '14'
          );
          $queryFour = new WP_Query( $offeringPage );
          // Check that we have query results.
          if ( $queryFour->have_posts() ) {
          
              // Start looping over the query results.
              while ( $queryFour->have_posts() ) {
          
                  $queryFour->the_post(); ?>

                  <div class="col-md-6">
                    <h2 class="section-title">Offering</h2>
                    <p class="mb-5"><?php the_field('page_intro'); ?></p>
                    <a href="<?php echo site_url('/offering');?>" class="btn btn-secondary btn-lg font-white">
                    <i class="bi bi-chevron-right"></i>  READ MORE</a>
                  </div>
                  <div class="col-md-6">
                    <?php the_post_thumbnail('offeringLandscape'); ?>
                    <!-- <img src="<?php //echo get_theme_file_uri('images/img-6-offering.jpg')?>" alt="Vocation" class="mb-sm-3" /> -->
                  </div>
          <?php } 
          } 
      wp_reset_postdata(); 
    ?>
    </div>
  </div>
</section>
<section class="content-section bg-grey">
  <div class="container">
    <div class="row g-5 generic-content-container">
      <?php  $RebuildingKingsmeadPage = array(
          'page_id' => '543'
            );
            $queryFour = new WP_Query( $RebuildingKingsmeadPage );
            // Check that we have query results.
            if ( $queryFour->have_posts() ) {
            
                // Start looping over the query results.
                while ( $queryFour->have_posts() ) {
            
                    $queryFour->the_post(); ?>

                    <div class="col-md-6">
                      <?php the_post_thumbnail('offeringLandscape'); ?>
                    </div>
                    <div class="col-md-6">
                      <h2 class="section-title">Rebuilding Kingsmead</h2>
                      <a href="<?php echo site_url('/rebuilding-kingsmead');?>" class="btn btn-secondary btn-lg font-white">
                          <i class="bi bi-chevron-right"></i>   READ MORE
                      </a>
                    </div>
            <?php } 
            } 
        wp_reset_postdata(); 
      ?>
    </div>
  </div>
</section>

<section class="content-section bg-green">
  <div class="container">
    <div class="row external-link d-flex justify-content-center">
      <div class="col-md-4 px-3">
        <h2 class="external-link--title">Latest News</h2>
        <ul class="external-link--list">
          <li class="nav-item"><a href="https://www.facebook.com/Jesuits.Malaysia.Singapore/" class="nav-link" target="_blank">Jesuits MAS Facebook</a></li>
          <li class="nav-item"><a href="http://www.facebook.com/jesuit.vocations.malaysia.singapore/" class="nav-link" target="_blank">Jesuits MAS Vocation Facebook</a></li>
        </ul>
      </div>
      <div class="col-md-4 px-3">
        <h2 class="external-link--title">Jesuit Governance</h2>
        <ul class="external-link--list">
          <li class="nav-item"><a href="https://www.jesuits.global/" class="nav-link" target="_blank">Jesuit Curia Headquarters in Rome</a></li>
          <li class="nav-item"><a href="http://www.jcapsj.org/" class="nav-link" target="_blank">Jesuit Conference of Asia Pacific</a></li>
        </ul>
      </div>
      <div class="col-md-4 px-3">
        <h2 class="external-link--title">Refugees Services</h2>
        <ul class="external-link--list">
          <li class="nav-item"><a href="http://jrs.net/en/jesuit-refugee-service/" class="nav-link" target="_blank">Jesuit Refugee Service International</a></li>
          <li class="nav-item"><a href="http://www.jrsap.org/" class="nav-link" target="_blank">Jesuit Refugee Service Asia Pacific</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>