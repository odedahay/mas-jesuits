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
        <div class="d-flex align-sm-items-center flex-lg-row flex-column">
          <h3 class="sub-section-subtitle mt-5 mb-md-3 mb-lg-5">Table of Contents</h3>
          <div class="filter-container ms-sm-0 ms-md-0 ms-lg-3 d-flex align-items-center">
            <input type="text" class="form-control search" id="name-filter" placeholder="Filter by Name">
            <div class="clear-icon ms-2" id="clear-filter"><i class="bi bi-x-circle" style="font-size: 24px"></i></div>
          </div>
        </div>
        
        <hr>
        <div class="accordion-container">
          <div class="d-flex justify-content-start flex-lg-row flex-column" id="table-contents">
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

              if ($counter % 18 == 1) {
                // Start a new column
                echo '<div class=""><ul class="table-contents">';
              } ?>

              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

              <?php
              if ($counter % 18 == 0 || $counter == $faqPosts->post_count) {
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
    
    // Create message element
    var noResultsMessage = document.createElement("div");
    noResultsMessage.className = "alert alert-info mt-3";
    noResultsMessage.style.display = "none";
    
    // Insert message after the table
    tableContents.parentNode.insertBefore(noResultsMessage, tableContents.nextSibling);

    // Function to clear the filter
    function clearFilter() {
        nameFilterInput.value = "";
        var links = tableContents.querySelectorAll("li a");

        links.forEach(function(link){
            link.parentNode.style.display = "block";
        });

        // hide the clear icon
        clearFilterIcon.style.display = "none";
        
        // Show initial message
        noResultsMessage.style.display = "none";
            tableContents.style.display = "block";
    }

    nameFilterInput.addEventListener("input", function () {
        var filterValue = nameFilterInput.value.toLowerCase();
        var links = tableContents.querySelectorAll("li a");
        var hasVisibleItems = false;

        links.forEach(function (link) {
            var title = link.textContent.toLowerCase();
            var isVisible = title.indexOf(filterValue) > -1;
            link.parentNode.style.display = isVisible ? "block" : "none";
            if (isVisible) hasVisibleItems = true;
        });

        // Show/hide the clear icon based on input value
        clearFilterIcon.style.display = filterValue.length > 0 ? "block" : "none";

        // Show/hide message and table based on filter value and results
        if (!hasVisibleItems && filterValue.length > 0) {
            noResultsMessage.textContent = `No results found for "${filterValue}". Please try a different name.`;
            noResultsMessage.style.display = "block";
            tableContents.style.display = "none";
        } else {
            noResultsMessage.style.display = "none";
            tableContents.style.display = "block";
        }
    });

    // Add event listener for the clear icon
    clearFilterIcon.addEventListener("click", clearFilter);

    // Add event listener for the Esc key
    nameFilterInput.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            clearFilter();
            // Optional: blur the input field
            nameFilterInput.blur();
        }
    });

    // Initial state
    noResultsMessage.style.display = "none";
    tableContents.style.display = "block";
});
</script>
<?php get_footer(); ?>
