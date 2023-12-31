<?php /* Template Name: Mission Page */ ?>

<?php get_header(); ?>

<?php while(have_posts()){
        the_post();

        $theParent = wp_get_post_parent_id(get_the_ID());

    ?>

    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background'); echo $pageBannerImage['sizes']['pageBanner'] ?>">
        <div class="breadcrumbs-custom-inner banner-dark-bg">
            <div class="container breadcrumbs-custom-container">
                <div class="breadcrumbs-custom-main">
                    <h1 class="breadcrumbs-custom-title">Mission / Ministries
                    </h1>
                </div>
            </div>
        </div>
    </section>
<section class="content-section">
    <div class="container">
      <div class="row generic-content-container">

        <div class="col-md-9">
          <h2 class="section-title"><?php the_title(); ?></h2>            
            <?php if ( has_post_thumbnail() ){
                the_post_thumbnail('missionLandscape');
                echo '<p></p>';
            }
           
            the_content(); ?> 

            <div class="row g-5 generic-content-container mt-1">
                <?php 
                    $pageLink1 = get_field('link_mission_1');
                    $pageLink2 = get_field('link_mission_2');
                    $pageTitle1 = get_field('title_mission_1');
                    $pageTitle2 = get_field('title_mission_2');
                ?>
                <?php function imageThumbnail1() {
                    $pageThumbImage2 = get_field('image_mission_1')['sizes']['missionThumbnail'];?>
                    <img src="<?php echo $pageThumbImage2; ?>" alt="<?php echo get_field('title_mission_1'); ?>" class="img-fluid" />
                <?php } ?>
                        
                <?php function imageThumbnail2() {
                    $pageThumbImage1 = get_field('image_mission_2')['sizes']['missionThumbnail'];?>
                    <img src="<?php echo $pageThumbImage1; ?>" alt="<?php echo get_field('title_mission_1'); ?>" class="img-fluid" />
                <?php } ?>

                <?php if($pageTitle1) { ?>
                    <div class="col-md-6">
                        <?php if($pageLink1) { ?> 
                                <a href="<?php echo $pageLink1; ?>" target="_blank" class="mission-link">
                                    <?php imageThumbnail1() ?>
                                    <h5 class="mission-link-title"><?php echo $pageTitle1; ?></h5>
                                </a>
                            <?php } else { ?>
                                <?php imageThumbnail1() ?>
                                <h5><?php echo $pageTitle1; ?></h5>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if($pageTitle2) { ?>
                    <div class="col-md-6">
                        <?php if($pageLink2) { ?> 
                            <a href="<?php echo $pageLink2; ?>" target="_blank" class="mission-link">
                                <?php imageThumbnail2() ?>
                                <h5 class="mission-link-title"><?php echo $pageTitle2; ?></h5>
                            </a>
                        <?php } else { ?>
                                <?php imageThumbnail2() ?>
                                <h5><?php echo $pageTitle2; ?></h5>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div> 

        </div>

        <div class="col-md-3 mission-side-top">
            <div class="position-sticky" style="top:5.5rem;">
                <h3 class="mission-side-parent">Mission / Ministries</h3>
                <ul class="list-group side-nav">
                    <!-- <li class="page_item page-item-20">
                        <a href="<?php //echo get_the_permalink($theParent); ?>" aria-current="page"><?php //echo get_the_title($theParent); ?></a>
                    </li> -->

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