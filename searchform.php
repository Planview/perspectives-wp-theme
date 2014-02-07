<?php
/**
 * The template for displaying search forms in Portfolio Perspectives
 *
 * @package Portfolio Perspectives
 */
$GLOBALS['portfolio_perspectives_search_id'] = isset($GLOBALS['portfolio_perspectives_search_id']) ? $GLOBALS['portfolio_perspectives_search_id'] + 1 : 0;
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="search_<?php echo $GLOBALS['portfolio_perspectives_search_id'] ?>">
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'portfolio-perspectives' ); ?></span>
    </label>
    <div class="search-controls">
        <input type="search" id="search_<?php echo $GLOBALS['portfolio_perspectives_search_id'] ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'portfolio-perspectives' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
        <div class="submit"><button type="submit" class="search-submit"><span class="glyphicon glyphicon-search"></span></button></div>

    </div>
</form>
