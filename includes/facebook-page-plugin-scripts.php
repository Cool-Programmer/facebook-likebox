<?php
	function fpp_scripts_enqueue()
	{
		wp_enqueue_style('fpp-main-stylesheet', plugins_url() . '/facebook-page-plugin/css/style.css');
		wp_enqueue_script('fpp-main-javascript', plugins_url() . '/facebook-page-plugin/js/main.js', ['jquery']);
	}
	add_action('wp_enqueue_scripts', 'fpp_scripts_enqueue');