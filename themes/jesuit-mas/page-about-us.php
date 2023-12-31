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
            <div class="col-md-6">
                <?php if ( has_post_thumbnail() ){
                    the_post_thumbnail('aboutPortrait');
                    echo '<p></p>';
                }?>
            
            </div>
            <div class="col-md-6">
                <?php the_content(); ?>
            </div>
        </div>
        </div>
    </section>

    <section class="content-section ">
    <div class="container">
        <div class="row g-5 generic-content-container">
        <div class="col-md-6">
            <h2 class="section-title">Our Mission</h2>
            <p><?php the_field('our_mission'); ?></p>
        </div>
        <div class="col-md-6">
            <h2 class="section-title">Our Vision</h2>
            <p><?php the_field('our_vision'); ?></p>
        </div>
        </div>
    </div>
    </section>

<?php  $universalApostolicPreferences = array(
        'page_id' => '104'
    );
    $queryFour = new WP_Query( $universalApostolicPreferences );
     // Check that we have query results.
     if ( $queryFour->have_posts() ) {
    
        // Start looping over the query results.
        while ( $queryFour->have_posts() ) {
    
            $queryFour->the_post(); ?>
    
            <section class="content-section bg-grey">
                <div class="container">
                <div class="row generic-content-container">
                    <div class="col-md-12">
                        <h2 class="section-title"> <?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                </div>
                </div>
            </section>
    
        <?php } 
    } ?>
    
    <?php wp_reset_postdata(); ?>



    <?php  $consistentCultureOfProtection = array(
        'page_id' => '102'
    );
    // Custom query.
    $queryFive = new WP_Query( $consistentCultureOfProtection );
    
    // Check that we have query results.
    if ( $queryFive->have_posts() ) {
    
        // Start looping over the query results.
        while ( $queryFive->have_posts() ) {
    
            $queryFive->the_post(); ?>
    
            <section class="content-section">
                <div class="container">
                <div class="row generic-content-container">
                    <div class="col-md-12">
                        <h2 class="section-title"> <?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                </div>
                </div>
            </section>
    
        <?php } 
    } ?>
    
    <?php wp_reset_postdata(); ?>


<?php } ?>

<?php get_footer(); ?>