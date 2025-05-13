<?php 

 /*  Template Name: 2 columns Page  */

get_header(); ?>

<?php while(have_posts()) { the_post();
    
    
    // page Banner
    $pageBannerImage = get_field('page_banner_background'); 

    if($pageBannerImage){
        $pageBannerImageFromField = $pageBannerImage['sizes']['pageBanner'];
    }else{
        $pageBannerImageFromField = get_theme_file_uri('images/past-jesuits-banner.jpg');
    }
    
    ?>

    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php echo $pageBannerImageFromField; ?>)">
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
                <div class="col-md-8">
                    <div class="content-column">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-sticky generic-sidebar" style="top:5.5rem;">
                        <?php 
                        // Sidebar content
                        $sidebar = get_field('sidebar');
                            if($sidebar) {
                                    echo $sidebar;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>