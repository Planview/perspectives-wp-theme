<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Portfolio Perspectives
 */
?>

	</div><!-- #content -->
    </div>

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-inner">
            <div class="site-info">
                <nav class="blog-links">
                    <?php wp_nav_menu(array('location' => 'footer')); ?>
                </nav>
                <div class="planview-brand">
                    <p class="copyright"><?php printf(__('Copyright &copy; %s Planview, Inc., All rights reserved', 'portfolio-perspectives'), date('Y')); ?></p>
                </div>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>