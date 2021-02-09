<?php

// Load JS on all admin pages
function wpplugin_admin_scripts() {

  wp_enqueue_script(
    'admin',
    WPPLUGIN_URL . 'admin/js/admin.js',
    ['jquery'],
    time()
  );

}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_scripts', 100 );


// Load JS on the frontend
function wpplugin_frontend_scripts() {

  wp_enqueue_script(
    'wppluginfrontend',
    WPPLUGIN_URL . 'frontend/js/frontend.js',
    [],
    time()
  );
}
add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_scripts', 100 );
