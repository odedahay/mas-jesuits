
<footer class="site-footer">
  <div class="container">
    <div class="footer-grp border-bottom-blue mb-4 pb-4">
      <div class="footer-item d-flex align-items-center">
        <?php 
          wp_nav_menu(
            array(
              'theme_location' => 'footerMenuLocation'
            )
          );
        ?>
        <!-- <ul class="nav">
          <li class="nav-item"><a href="<?php //echo site_url();?>" class="nav-link link-footer" >Home</a></li>
          <li class="nav-item"><a href="<?php //echo site_url('/about-us');?>" class="nav-link link-footer" >About us</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link link-footer">Contact Us</a></li>
        </ul> -->
      </div>
      <div class="footer-item d-flex align-items-center">
        <img src="<?php echo get_theme_file_uri('/images/mas-circle.png')?>" class="site-footer--logo" />
      </div>
    </div>
    <p>All Rights Reserved © <script> document.write(new Date().getFullYear());</script> JESUITS of Malaysia and Singapore</p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>