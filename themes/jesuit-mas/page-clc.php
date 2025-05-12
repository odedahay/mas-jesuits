<?php get_header(); ?>

<?php while(have_posts()){
    the_post();

    // page Banner
    $pageBannerImage = get_field('page_banner_background'); 

    if($pageBannerImage){
        $pageBannerImageFromField = $pageBannerImage['sizes']['pageBanner'];
    }else{
        $pageBannerImageFromField = get_theme_file_uri('images/past-jesuits-banner.jpg');
    }

?>

  

<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php echo $pageBannerImageFromField; ?>">
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
                <?php the_content(); ?>
            </div>
        </div>
        </div>
    </section>


<?php  $universalApostolicPreferences = array(
        'page_id' => '442'
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
                        <h3 class="section-title"> <?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </div>
                </div>
                </div>
            </section>
    
        <?php } 
    }  wp_reset_postdata(); ?>

    <?php  $consistentCultureOfProtection = array(
        'page_id' => '444'
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
                        <h3 class="section-title"> <?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </div>
                </div>
                </div>
            </section>
    
        <?php } 
    } wp_reset_postdata(); ?>
    
<?php } ?>

<?php get_footer(); ?>