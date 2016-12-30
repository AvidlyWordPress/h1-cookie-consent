<?php
/*
Plugin Name: Simple Cookie Consent
Plugin URI: https://github.com/H1FI/h1-cookie-consent
Description: A very simple cookie consent plugin designed specifically for multisite setups, although will work fine in single installs.
Version: 1.1
Author: Daniel Koskinen, Tomi Mäenpää, H1
Author URI: http://h1.fi
License: GPL2
Textdomain: h1-cookie-consent
*/
/*  Copyright 2016  H1 Web Oy

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'plugins_loaded', function() {

    load_plugin_textdomain( 'h1-cookie-consent', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

} );

add_action( 'wp_enqueue_scripts', 'h1cc_scripts_styles' );
/**
 * Register the scripts and styles
 */
function h1cc_scripts_styles() {
    //wp_register_script( 'cookieconsent2', plugins_url( 'js/cookieconsent.min.js' , __FILE__ ), null, '1.0.10', true );
    wp_register_script( 'cookieconsent2', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js', null, '1.0.10', true );

    $cookie_consent_options = array(
            'message' => esc_html__( 'This website uses cookies to ensure you get the best experience on our website.', 'h1-cookie-consent' ),
            'dismiss' => esc_html__( 'Got it!', 'h1-cookie-consent' ),
            'learnMore' => esc_html__( 'More info', 'h1-cookie-consent' ),
            'link' => false,
            'theme' => plugins_url( 'css/h1-cookie-consent.css', __FILE__ ),
    );

    $cookie_consent_options = apply_filters( 'h1cc_options', $cookie_consent_options );

    wp_localize_script( 'cookieconsent2', 'cookieconsent_options', $cookie_consent_options );

    wp_enqueue_script( 'cookieconsent2' );
}

