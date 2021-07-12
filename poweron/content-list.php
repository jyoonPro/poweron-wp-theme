<article class="media">
    <figure class="media-left">
        <?php if(has_post_thumbnail()):?>
        <p class="image is-96x96 is-square">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>">
            </a>
        </p>
        <?php endif;?>
    </figure>
    <div class="media-content">
        <div class="content">
        <p>
            <a href="<?php the_permalink(); ?>">
            <strong><?php the_title(); ?></strong>
            </a>
            <small><?php echo get_the_date(); ?></small>
            <br>
        </p>
        <div class="tags">
        <?php the_tags( '', '', '' ); ?>
        </div>
        <?php the_excerpt(); ?>
        </div>
    </div>
</article>
<hr>