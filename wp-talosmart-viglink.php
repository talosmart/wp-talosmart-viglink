<?php
/**
 * Plugin Name: WP Talosmart Viglink
 * Plugin URI:  https://talosmart.com/
 * Description: A testing plugin to test the author plugin skils
 * Version:     1.0.0
 * Author:      Daniel Skenty for Talosmart
 * Author URI:  https://danielskenty.talosmart.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

function wporg_custom()
{
	//do something
}
add_action('init', 'wporg_custom');

function wp_ts_search($query){
	if (!is_admin() && $query->is_main_query() && $query->is_search) {
	#$query->set('post_type', ['post', 'movie']);
	$query->set('ts_Viglink');	
	} 
}
add_action('pre_get_posts', 'wp_ts_search');


fuction ts_Viglink(){
$ch = curl_init("https://rest.viglink.com/api/product/search?apiKey=a2100feab1051953ce20d4a4b5b1d6c1&query=nike+running+shoes&country=us&category=Fashion&itemsPerPage=3");

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: 39a0cc957b7593bfde3dcb155f27ec87776e50fb'));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

curl_close($ch);
}