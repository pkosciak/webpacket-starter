<?php

require __DIR__ . '/vendor/autoload.php';

define( 'ABSPATH', $_SERVER['DOCUMENT_ROOT']. '/');
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );

if ( isset( $_REQUEST['action'] ) && ( $_REQUEST['action'] != '')) {

    if (str_starts_with($_REQUEST['action'], 'nopriv_')) {
        $action = ltrim($_REQUEST['action'],'nopriv_');
        do_action( 'wp_ajax_nopriv_' . THEME_NAME . '_' . $action );
    } else {
        do_action( 'wp_ajax_' . THEME_NAME . '_' . $_REQUEST['action'] );
    }
}
