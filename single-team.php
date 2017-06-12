<?php
/**
 * The Template for displaying all single posts
 *
 * @package Doors
 * @subpackage Doors
 * @since Doors 1.0
 */
get_header();
?>
<section id="blog-details">
    <div class="container">
        <div class="row blog-item">
            <div class="row blog-item portfolio-single">
                <div class="col-sm-12 blog-content">
                    <?php
                    // Start the Loop.
                    while (have_posts()) : the_post();
                    ?>

                    <article id = "post-<?php the_ID(); ?>" <?php post_class();
                        ?>>
                        <div class="entry-header">


                            <?php
                            if (has_post_thumbnail()) {
                                ?>

                                <?php
                                echo get_the_post_thumbnail(get_the_ID(), 'portfolio-large', array('class' => 'img-responsive'));
                            }
                            ?>

                            <br />
                        </div>	
                        <div class="entry-post">
                            <?php the_content(); ?>
                        </div>


                        <div class="wp_page_links">
                            <?php
                            wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'doors') . '</span>','after' => '</div>','link_before' => '<span>','link_after' => '</span>'));?>
                        </div>
                    </article><!-- #post-## -->
                </div><!-- #content -->
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
