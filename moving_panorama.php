<?php

    /*
    Plugin Name: Moving Panorama
    Plugin URI: https://github.com/miladDarani/moving_panorama.git
    Description: Embed a moving Panorama on your site
    Version: 1.0
    Author: Milad Darani
    Author URI: http://www.miladdarani.com
    */

    /*
    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version
    2 of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    with this program. If not, visit: https://www.gnu.org/licenses/

    Copyright 2020 Bit Space Development. All rights reserved.
    */





// The function that actually handles replacing the short code
function vr_background($atts) {

    $args = 
        shortcode_atts(
            array(
                'height' => '400',
                'width' => '600',
                'src' => '',
                'heading' => "",
                'speed' => "100",
                'heading_color' => "white",
                'font-size' => ""
            ),
            $atts
        );



        if ( !$args['src'] ) return $args;



       $pano ="<style>
                @keyframes panoramic {
                    0% {
                    background-position-x: 0%;
                    }
                    50% {
                        background-position-x: 100%;
                    }
                    100% {
                        background-position-x: 0%;
                    }
                }
                </style>";

        $pano .= "
        <div style='
                      background-position-x: 50%;
                      animation-duration: " . $args['speed'] . "s;
                      animation-delay: 0s;
                      animation-name: panoramic;
                      animation-iteration-count: infinite;
                      animation-timing-function: ease-out;
                      animation-fill-mode: both;
                      width: 100%;
                      height: 500px;
                      display: table;
                      background-repeat: no-repeat;
                      background-size:cover;
                      overflow: hidden;
                      margin: 0 auto;
                      position:relative;
                      will-change: background-position-x;
                      background-image: url(" . $args['src'] . ");
                      '
                      >
                      <h1 style='color:" . $args['heading_color'] . "; font-size:". $args['font-size'] . "; display: table-cell;text-align: center;vertical-align: middle;'>". $args['heading']."</h1></div>";



        return $pano;
};

add_action('admin_menu', 'panorama');
    function panorama(){
        add_menu_page( 'Panorama Settings', 'Panorama', 'manage_options', 'panorama', 'test_init' );
    }
    function test_init() {
        echo "<h1 style='text-align: center'>How To Use Guide</h1>
              <h2 style='text-align: center'>Moving Panorama </h2>
              <hr>
            <div  class='pano-wrapper'>
            <style>
                .pano-wrapper code {
                    background-color: darkseagreen;
                }
                .pano-wrapper {
                padding: 30px;
                border: 2px solid black;
                margin: 30px;
                margin-right:60px;
                
                
                
                }
            </style>
                
                <h2>Example Shortcode:</h2>
                <p><code>[mp src='https://images.unsplash.com/photo-1513735539099-cf6e5d559d82?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2641&q=80' heading='The Main Title Here' speed='100' font-size='50px' heading_color='white' ]</code></p>
                <br>
                <hr>
                <h2>Attributes/Options</h2>
                
                
                <p></p>- <code>speed</code>: this controls the speed of the panorama movement, default is 100 - Range 1 to 1000</p>
                <p>- <code>heading</code>: this is your heading that will be displayed over the image , this is you h1 tag </p>
                <p>- <code>font-size</code>: this is the font size of your heading - default is whatever the themes heading size is </p>
                <p>- <code>heading_color</code>: this control the color of the h1 tag - <strong>default:</strong> white.
                <br>
                <ol>
                    <li>you can type your color name like so: <code>heading_color=\"pink\"</code> or purple or any other color name.</li>
                
                    <li>you can also enter in HEX colors  like so <code>heading_color=\"#cfcfcf\"</code></li>
                </ol>
                
                
                <h3>** Important Note: ** all attributes must be inside quotes like so font-size=\"16px\"</h3>
            </div>
        ";
    }


add_shortcode("mp", "vr_background");

//register_activation_hook( __FILE__, 'create_plugin_settings_page' );




