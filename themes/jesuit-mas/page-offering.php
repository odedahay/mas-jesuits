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
<section class="content-section bg-grey">
    <div class="container">
      <div class="row generic-content-container">
        <div class="col-md-6 d-flex align-items-center">
          <div>
          <p><?php the_field('page_intro'); ?></p>
          </div>
        </div>
        <div class="col-md-6">
            <?php the_post_thumbnail('offeringLandscape'); ?>
          <!-- <img src="images/offering-default.jpg" alt="Vocation" class="mb-sm-3 img-fluid"  /> -->
        </div>
      </div>
    </div>
  </section>

<section class="content-section ">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-12">
          <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>



<?php } ?>

<?php get_footer(); ?>