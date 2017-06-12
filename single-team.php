<?php
/**
 * The Template for displaying all single posts
 *
 * @package Doors
 * @subpackage Doors
 * @since Doors 1.0
 */

get_header(); ?>
<section id="blog-details">
    <div class="container">
        <div class="row blog-item">
            <div class="col-sm-12 blog-content">
                <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        get_template_part( 'content', get_post_format() );
                        if(get_option('commentswithc', false) != 'commentOff'):
                        if ( comments_open() || get_comments_number() ) 
                        {
                            comments_template();
                        }
                        endif;
                    endwhile;
                ?>
            </div><!-- #content -->
        </div>
    </div>
</section>
<?php
get_footer();
