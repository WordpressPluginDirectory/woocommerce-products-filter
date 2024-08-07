<?php

if (!defined('ABSPATH'))
    die('No direct access allowed');

global $WOOF, $wp_query;

if (is_user_logged_in()) {
    $request = "";
    if (WOOF_REQUEST::get('woof_wp_query') AND is_object(WOOF_REQUEST::get('woof_wp_query'))) {
        $request = WOOF_REQUEST::get('woof_wp_query')->request;
    } else {
        $request = $wp_query->request;
    }
	if (null ==  $request) {
		$request = "";
	}
    woof()->storage->set_val("woof_pm_request_" . get_current_user_id(), base64_encode($request)); //Save current request
}

if (isset(woof()->settings['products_messenger']) AND woof()->settings['products_messenger']['show']) {
    echo do_shortcode('[woof_products_messenger in_filter=1 ]');
}




