<?php

//	##################################
	##          sconnect 			##
	## como usar:					##
	## 		[sconnect]				##
	##################################
add_shortcode( 'sconnect', 'sconnect_shortcode' );
	function sconnect_shortcode () {
		do_action( 'social_connect_form' );
	}

?>