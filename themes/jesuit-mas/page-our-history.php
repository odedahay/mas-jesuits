<?php /* Template Name: History Page */ ?>
<?php get_header(); ?>

<?php while(have_posts()){
        the_post();
        $theParent = wp_get_post_parent_id(get_the_ID());
?>

<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background'); echo $pageBannerImage['sizes']['pageBanner'] ?>">
        <div class="breadcrumbs-custom-inner banner-dark-bg">
            <div class="container breadcrumbs-custom-container">
                <div class="breadcrumbs-custom-main">
                    <h1 class="breadcrumbs-custom-title" id="tabSection">Our History</h1>
                </div>
            </div>
        </div>
    </section>


<section class="content-section bg-green_">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-9">
        <h2 class="section-title"><?php the_title(); ?></h2>
        <!-- <div class="generic-content-container history history-flex"> -->
        <?php the_content(); ?>
        <!-- </div>         -->
      </div>
      <div class="col-md-3 history-side-top">
        <div class="position-sticky" style="top:5.5rem;">
            <h3 class="history-side-parent">Our History</h3>
            <ul class="list-group history-side-nav">

                <?php
                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        $findChildrenOf = get_the_ID();
                    }
                    wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' => $findChildrenOf,
                        'sort_column' => 'menu_order'
                    )); 
                ?>
            </ul>
        </div>
      </div>
    </div>
  </div>
  </section>


<?php } ?>

<?php get_footer(); ?>

<script>
</script>