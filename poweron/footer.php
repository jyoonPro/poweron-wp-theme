  <!-- Footer -->
  <footer class="footer">
    <div class="container has-text-centered">
      <div class="p-footer-logo">
        <a href="<?php echo home_url();?>">
          <img class="p-poweron" src="<?php bloginfo('template_directory');?>/img/poweron.svg" draggable="false" alt="POWERON">
        </a>
        <i class="fas fa-link"></i>
        <a href="https://postech.ac.kr" target="_blank">
          <img class="p-postech" src="<?php bloginfo('template_directory');?>/img/postech.svg" draggable="false" alt="Postech">
        </a>
      </div>
      <div class="content">
        <p>
          Copyright &copy; <?php echo date("Y");?> POWER-ON. All rights reserved.<br>
          All trademarks are the property of their respective owners.
        </p>
      </div>
    </div>
  </footer>

  <?php wp_footer()?>

</body class="has-navbar-fixed-top">

</html>