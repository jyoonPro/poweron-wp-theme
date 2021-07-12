<?php get_header();?>

<section class="section p-query-list">
    <div class="container">
      <h3 class="title is-3">
          "<?php echo get_search_query();?>" 검색 결과 (<?php echo $wp_query->found_posts; ?>)
      </h3>
      <hr>
      <?php
        if(have_posts()):
            while (have_posts()): the_post();
                get_template_part( 'content', 'list' );
            endwhile;
        else: ?>

        <div class="content">
            <p>
                검색 결과가 없습니다.
            </p>
        </div>

      <?php endif; ?>

      <?php wp_pagenavi(); ?>
    </div>
</section>

<?php get_footer();?>