<?php

function enqueue() {
		// enqueue all our scripts
	wp_enqueue_style( 'radix-helper-style',plugin_dir_url(  __FILE__ ) . 'assets/radix-helper-style.css' );

	wp_enqueue_script( 'radix-helper-scripts', plugin_dir_url( __FILE__ ) . 'assets/radix-helper-scripts.js' );
}

add_action( 'admin_enqueue_scripts', 'enqueue' );