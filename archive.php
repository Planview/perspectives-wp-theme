<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portfolio Perspectives
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
                            $perspectives_archive_author = get_the_author_meta('ID');

							printf( __( 'Author: %s', 'portfolio-perspectives' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'portfolio-perspectives' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'portfolio-perspectives' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'portfolio-perspectives' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'portfolio-perspectives' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'portfolio-perspectives' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'portfolio-perspectives' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'portfolio-perspectives');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'portfolio-perspectives');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'portfolio-perspectives' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'portfolio-perspectives' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'portfolio-perspectives' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'portfolio-perspectives' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'portfolio-perspectives' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'portfolio-perspectives' );

						else :
							_e( 'Archives', 'portfolio-perspectives' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

            <?php if (is_author() && (get_query_var('page') < 2 && get_query_var('paged') < 2)) : ?>
                <div class="well">
                    <div class="pull-left" style="padding: 0 20px 20px 0">
                        <?php echo get_avatar($perspectives_archive_author, 150, '', get_the_author_meta('display_name')) ?>
                    </div>
                    <?php the_field('user_bio', "user_{$perspectives_archive_author}"); ?>
                    <?php if ($user_twitter = get_field('user_twitter', "user_{$perspectives_archive_author}")) : ?>
                        <p class="twitter"><a href="http://twitter.com/<?php echo $user_twitter; ?>">@<?php echo $user_twitter ?></a></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php portfolio_perspectives_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
