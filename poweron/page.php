<?php get_header();?>

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

<?php get_footer();?>