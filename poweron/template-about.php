<?php
    /* Template Name: About */
    get_header();
    $list_label = get_field('member_list_label');
    $chair = get_field('chairman');
?>

<section class="section">
    <div class="container">
        <div class="content p-wordpress">
        <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        ?>
        </div>
    </div>
</section>

<section class="section p-member-list">
    <div class="container">
      <h3 class="subtitle is-3">
        <?php echo $list_label;?>
      </h3>
      <hr>
      <div class="columns p-leader">
        <!-- Chairman -->
        <div class="column is-two-thirds-desktop">
          <article class="media">
            <figure class="media-left">
              <p class="image is-128x128 is-square">
                <img class="is-rounded" src="<?php echo $chair['picture'];?>">
              </p>
            </figure>
            <div class="media-content">
              <div class="content">
                <p class="p-name">
                  <strong><?php echo $chair['name'];?></strong>
                  <small><?php echo $chair['position'];?></small>
                </p>
                <?php echo $chair['description'];?>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- Other members -->
      <?php if (have_rows('member_list')): ?>
      <div class="columns is-multiline">
      <?php
        while (have_rows('member_list')): the_row();

            $name = get_sub_field('name');
            $position = get_sub_field('position');
            $desc = get_sub_field('description');
            $picture = get_sub_field('picture');
      ?>
        <div class="column is-half">
          <article class="media">
            <figure class="media-left">
              <p class="image is-96x96 is-square">
                <img class="is-rounded" src="<?php echo $picture;?>">
              </p>
            </figure>
            <div class="media-content">
              <div class="content">
                <p class="p-name">
                  <strong><?php echo $name;?></strong>
                  <small><?php echo $position;?></small>
                </p>
                <?php echo $desc;?>
              </div>
            </div>
          </article>
        </div>
        <?php endwhile;?>
      </div>
      <?php endif;?>
    </div>
  </section>

<?php get_footer();?>