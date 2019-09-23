<?php
/**
 * File searchform.php
 * Output primary search form of theme.
 *
 * @package Tour
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

?>
<form role="search" method="get" class="search-form" action="<?php print( esc_url( home_url( '/' ) ) ); ?>">
	<label>
		<span class="screen-reader-text">
			<?php print( esc_html_x( 'Search for:', 'label', 'Tour' ) ); ?>
		</span>
		<input type="search" class="search-field" placeholder="<?php print( esc_attr_x( 'Search …', 'placeholder', 'Tour' ) ); ?>"
				value="<?php print( esc_attr( get_search_query() ) ); ?>" name="s"
				title="<?php print( esc_attr_x( 'Search for:', 'label', 'Tour' ) ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php print( esc_attr_x( 'Search', 'submit button', 'Tour' ) ); ?>" />
</form>
