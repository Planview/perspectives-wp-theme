<?php
/**
 * @package Portfolio Perspectives
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-actions">
            <a class="addthis_button_compact label label-warning" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php echo esc_attr(get_the_title()); ?>"><span class=""><span class="glyphicon glyphicon-plus"></span> <?php _e('Share', 'portfolio-perspectives'); ?></span></a>
        </div>
		<div class="entry-meta">
            <?php portfolio_perspectives_author_thumb('pull-left'); ?>
            <?php portfolio_perspectives_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'portfolio-perspectives' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
        <?php
        $categories_list = get_the_category_list( __( ' ', 'portfolio-perspectives' ) );
        $tags_list = get_the_tag_list( '', __( ' ', 'portfolio-perspectives' ) );

        if (($categories_list && portfolio_perspectives_categorized_blog()) || $tags_list || (is_user_logged_in() && current_user_can('edit_posts'))) :
            ?>
            <footer class="entry-meta">
                <?php
                if ( $categories_list && portfolio_perspectives_categorized_blog() ) :
                    ?>
                    <span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'portfolio-perspectives' ), $categories_list ); ?>
			</span>
                <?php endif; // End if categories ?>

                <?php
                if ( $tags_list ) :
                    ?>
                    <span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'portfolio-perspectives' ), $tags_list ); ?>
			</span>
                <?php endif; // End if $tags_list ?>

                <?php edit_post_link( __( 'Edit', 'portfolio-perspectives' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-meta -->
        <?php endif; ?>
    <?php endif; // End if 'post' == get_post_type() ?>
</article><!-- #post-## -->
