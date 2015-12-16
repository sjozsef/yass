<div id="yass-wrap" class="wrap">
	<h1><?php _e( 'Yet Another Smooth Scroll', 'yass' ); ?></h1>

	<p class="about">YASS by <a href="http://sjozsef.com" target="blank">sjozsef</a> with <span class="heart">♥</span> 
	<a id="yass-translate" href="<?php echo plugin_dir_url( __FILE__ ) . '../../languages/yass.pot'; ?>" class="yass-btn"><span class="yass-icon-flag"></span> Help to translate</a>
	<a href="https://github.com/sjozsef/yass" class="yass-btn"><span class="yass-icon-github"></span> Fork on GitHub</a>
	<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FM9DPTP4R2QL6" class="yass-btn"><span class="yass-icon-beer"></span> Invite me a beer</a>
	</p>
	<p class="credits description">Built on <a href="https://github.com/galambalazs/smoothscroll-for-websites" target="blank">SmoothScroll</a> by <a href="https://github.com/galambalazs" target="blank">galambalazs</a></p>
	
<form action='options.php' method='post'>
	
	<?php
	settings_fields( 'YASS_Settings' );
	do_settings_sections( 'YASS_Settings' );
	submit_button();
	?>
	
</form>

</div>