<?php

/***************************************************
# Lanoba
**************************************************

add_shortcode( 'lanoba', 'lb_shortcode' );
function lb_shortcode () {
    if ( is_user_logged_in() ) {
    	global $current_user;
    	$id = $current_user->id;
    	$display_name = $current_user->display_name;
    	$saida = '	<div id="lanoba" class="logado">
	    				<div class="profile_user">
							<div class="profile_avatar">
								'.get_avatar($id,64).'
							</div>    				
	    					<div class="profile_display_name">
	    						'.$display_name.'
	    					</div>
	    				</div>
	    				<div class="profile_logout">
							<a href="'.wp_logout_url('perfil').'" title="Logout">Logout</a>
		    			</div>
	    			</div>';
    	return ($saida);
    }else{
    	$iframe = (lb_LoginWidget('',0,0,0));
    	$saida = '<div id="lanoba" class="deslogado" >'.$iframe.'</div>';
    	return ($saida);
    }
}*/

add_shortcode( 'lanoba', 'lb_shortcode' );
	function lb_shortcode () {
		do_action( 'wordpress_social_login' );
	}

?>