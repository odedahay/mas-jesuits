<?php get_header(); ?>

<?php while(have_posts()){
        the_post();?>


<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background'); echo $pageBannerImage['sizes']['pageBanner'] ?>">
    <div class="breadcrumbs-custom-inner banner-dark-bg">
        <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
                <h1 class="breadcrumbs-custom-title">Vocation</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-section">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-12">
        
        <blockquote class="trx_addons_blockquote_style_2">
          <!-- <h3 class="sectiont-subtitle"><?php //the_title(); ?></h3> -->
          <?php the_content(); ?>
        </blockquote>
        <br>
        
        <h2 class="sub-section-title my-5">Jesuit Vocations Frequently Asked Questions</h2>
        <div class="accordion-container">
          <?php 
              $faqPosts = new WP_Query(array(
                  'posts_per_page' => -1,
                  'post_type' => 'vocation',
                  'sort_column' => 'menu_order',
                  'order' => 'ASC',
              ));

              while($faqPosts->have_posts()){
                  $faqPosts->the_post(); ?>
                  <button class="accordion-container--accordion-title"><?php the_title(); ?></button>
                  <div class="accordion-container--panel">
                      <?php the_content(); ?>
                  </div>

              <?php } wp_reset_postdata(); ?>
            
        </div>
      </div>
    </div>
  </div>
</section>



<?php } ?>

<?php get_footer(); ?>

<script>
  var acc = document.getElementsByClassName("accordion-container--accordion-title");
  var i;
  
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active-show");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
  }
  </script>