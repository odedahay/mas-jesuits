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
            <h1 class="breadcrumbs-custom-title">Past Jesuits</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-section">
  <div class="container">
    <div class="row generic-content-container">
      <div class="col-md-12">
        
        <?php the_content(); ?>
        <div class="d-flex align-items-center">
          <h3 class="sub-section-subtitle my-5">Table of Contents</h3>
          <div class="filter-container ms-3 d-flex align-items-center">
            <input type="text" class="form-control search" id="name-filter" placeholder="Filter by Name">
            <div class="clear-icon ms-2" id="clear-filter"><i class="bi bi-x-circle" style="font-size: 24px"></i></div>
          </div>
        </div>
        
        <hr>
        <div class="accordion-container">
          <div class="row" id="table-contents">
            <?php
            $faqPosts = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'past-jesuits',
              'orderby' => 'title',  // Order by title
              'order' => 'ASC',     // Ascending order
            ));

            $counter = 0;

            while ($faqPosts->have_posts()) {
              $faqPosts->the_post();
              $counter++;

              if ($counter % 15 == 1) {
                // Start a new column
                echo '<div class="col-md-4"><ul class="table-contents">';
              } ?>

              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

              <?php
              if ($counter % 15 == 0 || $counter == $faqPosts->post_count) {
                // Close the column
                echo '</ul></div>';
              }
            } wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php } ?>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Filter by name
    var nameFilterInput = document.getElementById("name-filter");
    var tableContents = document.getElementById("table-contents");
    var clearFilterIcon = document.getElementById("clear-filter");

    nameFilterInput.addEventListener("input", function () {
      var filterValue = nameFilterInput.value.toLowerCase();
      var links = tableContents.querySelectorAll("li a");

      links.forEach(function (link) {
        var title = link.textContent.toLowerCase();
        link.parentNode.style.display = title.indexOf(filterValue) > -1 ? "block" : "none";
      });

       // Show/hide the clear icon based on input value
       clearFilterIcon.style.display = filterValue.length > 0 ? "block" : "none";
    });

    clearFilterIcon.addEventListener("click", function(){
      nameFilterInput.value = "";
      var links = tableContents.querySelectorAll("li a");

      links.forEach(function(link){
        link.parentNode.style.display = "block";
      });

      // hide the clear icon
      clearFilterIcon.style.display = "none";
    });

  });
</script>
<?php get_footer(); ?>
