<?php
/**
 * @package Portfolio Perspectives
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

        <div class="entry-actions">
            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                <span class="comments-link"><?php comments_popup_link( __( '<span class="glyphicon glyphicon-comment"></span> 0', 'portfolio-perspectives' ), __( '<span class="glyphicon glyphicon-comment"></span> 1', 'portfolio-perspectives' ), __( '<span class="glyphicon glyphicon-comment"></span> %', 'portfolio-perspectives' ) ); ?></span>
            <?php endif; ?>
            <a class="addthis_button_compact label label-warning" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php echo esc_attr(get_the_title()); ?>"><span class=""><span class="glyphicon glyphicon-plus"></span> <?php _e('Share', 'portfolio-perspectives'); ?></span></a>
        </div>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
            <?php portfolio_perspectives_author_thumb('pull-left'); ?>
            <?php portfolio_perspectives_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'portfolio-perspectives' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'portfolio-perspectives' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
    <?php
    $categories_list = get_the_category_list( __( ' ', 'portfolio-perspectives' ) );
    $tags_list = get_the_tag_list( '', __( ' ', 'portfolio-perspectives' ) );

    if ($tags_list || (is_user_logged_in() && current_user_can('edit_posts'))) :
    ?>
	<footer class="entry-meta">

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
