<?php

// Load CSS on all admin pages
function wpplugin_admin_styles() {

  wp_enqueue_style(
    'admin',
    WPPLUGIN_URL . 'admin/css/admin-style.css',
    [],
    time()
  );

}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );


// Load CSS on the frontend
function wpplugin_frontend_styles() {

  wp_enqueue_style(
    'frontend',
    WPPLUGIN_URL . 'frontend/css/frontend-style.css',
    [],
    time()
  );
}
add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_styles', 100 );
