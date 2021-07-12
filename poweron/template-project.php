<?php
    /* Template Name: Project
     * Template Post Type: post */
    get_header();
    $proj_auth = get_field('project_author');
    $proj_outline = get_field('project_outline');
    $private = get_field('project_private');
    ?>

  <section class="section p-post">
    <div class="container">
      <h2 class="title is-2">
        <?php the_title(); ?>
      </h2>
      <div class="columns is-multiline">
        <div class="column is-full is-4-desktop is-3-widescreen">
          <article class="panel">
            <p class="panel-heading">
              작성자
            </p>
            <div class="panel-block">
              <span class="p-panel-title">
                이름
              </span>
              <?php echo $proj_auth['name']; ?>
            </div>
            <div class="panel-block">
              <span class="p-panel-title">
                학과
              </span>
              <?php echo $proj_auth['major']; ?>
            </div>
            <div class="panel-block">
              <span class="p-panel-title">
                입학 년도
              </span>
              <?php echo $proj_auth['year']; ?>
            </div>
            <div class="panel-block">
              <span class="panel-icon">
                <i class="fas fa-calendar" aria-hidden="true"></i>
              </span>
              <?php echo get_the_date(); ?>
            </div>
            <div class="panel-block">
              <span class="panel-icon">
                <i class="fas fa-tags" aria-hidden="true"></i>
              </span>
              <div class="tags are-medium">
                <?php the_tags( '', '', '' ); ?>
              </div>
            </div>
            <?php if( !$private ) { ?>
            <?php if( get_field('project_github') ): ?>
            <a href="<?php the_field('project_github'); ?>" class="panel-block">
              <span class="panel-icon">
                <i class="fab fa-github" aria-hidden="true"></i>
              </span>
              GitHub
            </a>
            <?php endif; ?>
            <?php }; ?>
            <?php if( is_user_logged_in() ) { ?>
            <a href="https://api.poweron.co/pdf/permalink/<?php echo basename(get_permalink()); ?>" class="panel-block">
              <span class="panel-icon">
                <i class="fas fa-download" aria-hidden="true"></i>
              </span>
              보고서 다운받기
            </a>
            <?php }; ?>
          </article>
        </div>
        <div class="column">
          <div class="content">
            <?php if ( !$private or is_user_logged_in() ) { ?>
            <h3 class="p-subtitle">
              개요
            </h3>
            <div class="p-subtitle-decoration"></div>
            
            <table class="table is-bordered p-table is-fullwidth">
              <tbody>
                <tr>
                  <td>선행 기술</td>
                  <td><?php echo $proj_outline['prior_art']; ?></td>
                </tr>
                <tr>
                  <td>목표 기술</td>
                  <td><?php echo $proj_outline['target_tech']; ?></td>
                </tr>
                <tr>
                  <td>연관 기술</td>
                  <td><?php echo $proj_outline['related_tech']; ?></td>
                </tr>
              </tbody>
            </table>
            <?php }; ?>

            <h3 class="p-subtitle">
              요약
            </h3>
            <div class="p-subtitle-decoration"></div>
            <p>
              <?php the_excerpt(); ?>
            </p>

            <?php if ( !$private or is_user_logged_in() ) { ?>

            <h3 class="p-subtitle">
              본문
            </h3>
            <div class="p-subtitle-decoration"></div>
            
            <div class="p-wordpress">
            <?php
              while ( have_posts() ) : the_post();
                the_content();
              endwhile;
            ?>
            </div>

            <h3 class="p-subtitle">
              참고자료
            </h3>
            <div class="p-subtitle-decoration"></div>

            <?php the_field('project_bibliography'); ?>

            <h3 class="p-subtitle">
              개발환경
            </h3>
            <div class="p-subtitle-decoration"></div>
            <p>
              <?php the_field('project_environment'); ?>
            </p>

            <?php } else { ?>

              <div class="notification is-warning" style="margin-top: 2rem">
                비공개 문서입니다. <a href="<?php echo wp_login_url(get_permalink()); ?>">로그인</a>
              </div>

            <?php }; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer();?>