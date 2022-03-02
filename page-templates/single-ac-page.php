<?php get_header(); ?>
<div class="acp-section-wrapper">
    <div class="acp-container">
        <div class="acp-row">
            <div class="acp-single-coloring-post-content-wrap">
                <div class="acp-single-coloring-post-top">
                    <div class="acp-bread-crumb"></div>
                    <div class="acp-social-share"></div>
                </div>
                <div class="acp-single-coloring-post-title">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="acp-single-coloring-post-desc">
                    <div class="acp-scp-image-wrapper">
                        <div class="acp-scp-image">
                            <?php the_post_thumbnail('full') ?>
                        </div>
                        <a href="<?php the_post_thumbnail_url(); ?>" class="acp-scp-image-download" download>Download image</a>
                    </div>
                    <div class="acp-scp-desc">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();