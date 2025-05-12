<?php get_header(); ?>

<?php while(have_posts()){
        the_post();
        
        $pageBannerImage = get_field('page_banner_background');

        if($pageBannerImage){
          $pageBannerImageFromField = $pageBannerImage['sizes']['pageBanner'];
        }else{
          $pageBannerImageFromField = get_theme_file_uri('images/past-jesuits-banner.jpg');
        }
  
  ?>


<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php  echo $pageBannerImageFromField; ?>">
    <div class="breadcrumbs-custom-inner banner-dark-bg">
        <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
                <h1 class="breadcrumbs-custom-title">Past Jesuits</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-section">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-12">
          <!-- <h3 class="sectiont-subtitle"><?php //the_title(); ?></h3> -->
          <?php the_content(); ?>
        
        <h2 class="sub-section-title my-5">Table of Contents</h2>
        <div class="accordion-container">
            <ul class="table-contents">
                <?php 
                    $pastJesuits = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'past-jesuits',
                        'sort_column' => 'menu_order',
                        'order' => 'ASC',
                    ));
                    while($pastJesuits->have_posts()){
                    $pastJesuits->the_post(); ?>

                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                    <?php } wp_reset_postdata(); ?>

                  </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<?php } ?>

<?php get_footer(); ?>
