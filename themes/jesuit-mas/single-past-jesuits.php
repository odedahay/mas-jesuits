<?php get_header(); ?>


<?php while(have_posts()){
        the_post();
        $theParent = wp_get_post_parent_id(get_the_ID());
         
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
                    <h1 class="breadcrumbs-custom-title" id="tabSection">Past Jesuits</h1>
                </div>
            </div>
        </div>
    </section>


<section class="content-section bg-green_">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-9 mx-auto">
        <h2 class="section-title"><?php the_title(); ?></h2>
          <?php if (has_post_thumbnail()) : ?>
                <div class="profile-past-priest-img">
                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                </div>
          <?php endif; ?>
         <?php the_content(); ?>
        <br>
        <p><i class="bi bi-arrow-left-circle"></i> <a href="<?php echo site_url('/past-jesuits'); ?>">Back to past Jesuits list</a></p>
      </div>

      <!-- <div class="col-md-3 history-side-top">
        <div class="position-sticky_" style="top:5.5rem;">
         
        </div>
      </div> -->
    </div>
  </div>
  </section>


<?php } ?>

<?php get_footer(); ?>