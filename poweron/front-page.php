<?php get_header();
  $hero = get_field('hero');
  $exhib = get_field('exhibition');?>

  <!-- Content -->
  <div class="p-hero" style="background-image: url('<?php echo $hero['hero_background'];?>');">
    <div class="container">
      <h1><?php echo $hero['hero_title'];?></h1>
      <h2><?php echo $hero['hero_subtitle'];?></h2>

      <?php if($hero['hero_button_link']):?>
      <a href="<?php echo $hero['hero_button_link'];?>" class="button is-danger is-large">
        <?php echo $hero['hero_button_text'];?>
        <i class="fas fa-chevron-circle-right"></i>
      </a>
      <?php endif;?>

    </div>
  </div>

  <section class="section p-item-list">
    <div class="container">
      <h1 class="title is-1">
        <?php echo $exhib['exhibition_title'];?>
      </h1>
      <hr>
      <div class="columns is-multiline">

      <?php
        if (have_rows('exhibition')): while (have_rows('exhibition')): the_row();
            if (have_rows('exhibition_list')): while (have_rows('exhibition_list')): the_row();

            $post = get_sub_field('project');
            setup_postdata($post);
      ?>

        <div class="column is-half-tablet is-one-third-desktop">
          <div class="box">
            <figure class="image is-5by3">
              <img src="<?php the_post_thumbnail_url();?>">
            </figure>
            <div class="content">
              <h3 class="title is-3"><?php the_title();?></h3>
              <p>
                <?php the_excerpt();?>
              </p>
              <p class="has-text-centered">
                <a href="<?php the_permalink();?>" class="button is-primary"><?php echo $exhib['exhibition_button_text'];?></a>
              </p>
            </div>
          </div>
        </div>

      <?php wp_reset_postdata(); endwhile; endif; endwhile; endif;?>

      </div>
    </div>
  </section>

<?php get_footer();?>