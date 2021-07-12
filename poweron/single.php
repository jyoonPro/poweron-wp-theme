<?php get_header();?>

<section class="section">
    <div class="container">
        <div class="content p-wordpress">

        <h1 class="title is-1">
            <?php the_title(); ?>
        </h1>
        <p>
            <?php echo get_the_date(); ?>
        </p>
        <hr>

        <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        ?>
        </div>
    </div>
</section>

<?php get_footer();?>