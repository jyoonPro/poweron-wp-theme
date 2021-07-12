<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php the_title(); ?></title>

  <?php wp_head();?>
</head>

<body class="has-navbar-fixed-top">
  <!-- Navigation -->
  <nav class="navbar is-fixed-top is-spaced" role="navigation" aria-label="main dropdown navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo home_url();?>">
          <img src="<?php bloginfo('template_directory');?>/img/poweron-text.svg" draggable="false" alt="POWERON">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
          data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu">
        <div class="navbar-start">

          <?php wp_nav_menu(
            array(
              'theme_location' => 'navbar',
              'depth'          => 2,
              'container'      => false,
              'menu_class'     => 'navbar-start',
        	  'menu_id'        => 'primary-menu',
        	  'after'          => "</div>",
        	  'walker'         => new Navwalker())
            );?>
        </div>

        <div class="navbar-end">
          <div class="p-navbar-search">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
  </nav>