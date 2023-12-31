<?php get_header(); ?>

<?php while(have_posts()){
        the_post();?>


<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background'); echo $pageBannerImage['sizes']['pageBanner'] ?>">
    <div class="breadcrumbs-custom-inner banner-dark-bg">
        <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
                <h1 class="breadcrumbs-custom-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="content-section">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-12">
        <blockquote class="trx_addons_blockquote_style_2">
            <?php the_content(); ?>
        </blockquote>
      </div>
    </div>
  </div>
</section>

<section class="content-section bg-grey">
  <div class="container">
    <div class="row generic-content-container">
      <h3 class="sectiont-subtitle">REGIONAL OFFICE</h3>
      <div class="col-md-6">
        <address>
            <?php the_field('singapore_office'); ?>
        </address>
      </div>
      <div class="col-md-6">
        <address>
            <?php the_field('general_enquiries'); ?>
        </address>
      </div>
      
    </div>
  </div>
</section>

<section class="content-section bg-grey">
  <div class="container">
    <div class="row generic-content-container">
      <h3 class="sectiont-subtitle">REGIONAL COMMUNITIES</h3>
      <div class="col-md-6">
        <address>
            <?php the_field('singapore_regional'); ?>
        </address>
      </div>
      <div class="col-md-6">
        <address>
            <?php the_field('kuala_lumpur'); ?>
        </address>
      </div>
      <div class="col-md-6">
        <address>
            <?php the_field('johor'); ?>
        </address>
      </div>
      <div class="col-md-6">
        <address>
            <?php the_field('sarawak'); ?>
        </address>
      </div>
    </div>
  </div>
</section>
<br>
<section class="content-section">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-8 mx-auto">
        <div class="row">
          <h2 class="section-title mb-5">Ask Your Question</h2>
            <?php  $contactUsForm = array(
            'page_id' => '416'
            );
            $queryForm = new WP_Query( $contactUsForm );
            // Check that we have query results.
            if ( $queryForm->have_posts() ) {
            
                // Start looping over the query results.
                while ( $queryForm->have_posts() ) {
            
                    $queryForm->the_post(); ?>
                            
                      <!-- <h2 class="section-title"> <?php the_title(); ?></h2> -->
                      <?php the_content(); ?>
            
                <?php } 
            } ?>
            
            <?php wp_reset_postdata(); ?>
        </div>
        
      </div>
      
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

<?php } ?>

<?php get_footer(); ?>
