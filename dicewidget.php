<?php
/**
 * @package dicewidget
 */

 /* 
 Plugin Name: Dice Widget by ChandimaJ
 Plugin URI: https://github.com/axawebs/dicewidget
 Description: Custom created Dice Widget plugin
 Version: 1.0
 Author: Chandima Jayasiri
 Author URI: mailto:chandimaj@icloud.com
 License: GPLV2 or later
 Text Domain: dicewidget
 */

 /*
 This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if (! defined( 'ABSPATH') ){
    die;
}

class dicewidget
{

    public $plugin_name;
    public $settings = array();
    public $sections = array();
    public $fields = array();

    function __construct(){
        $this->plugin_name = plugin_basename( __FILE__ );
    }

    function register(){
        add_action( 'before_header', array($this, 'custom_elementor') );

        add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );
    }

    //Enqueue on all other pages
    function enqueue(){ 

        //Bootstrap
        wp_enqueue_style( 'bootstrap4_css', plugins_url('/assets/bootstrap4/bootstrap_4_5_2_min.css',__FILE__),80);
        wp_enqueue_script( 'bootstrap_bundle_scripts', plugins_url('/assets/bootstrap4/bootstrap.bundle.min.js',__FILE__), array('jquery'));
        wp_enqueue_script( 'bootstrap_input_spinner', plugins_url('/assets/bootstrap4/bootstrap-input-spinner.js',__FILE__), array('bootstrap_bundle_scripts'));
        
        
        //jQuery UI
        wp_enqueue_style( 'jquery_ui_styles', plugins_url('/assets/jquery_ui/jquery-ui.min.css',__FILE__),82);
        wp_enqueue_script( 'jquery_ui_scripts', plugins_url('/assets/jquery_ui/jquery-ui.min.js',__FILE__), array('jquery'));
        wp_enqueue_script( 'jquery_ui_rotatable_scripts', plugins_url('/assets/jquery_ui/jquery.ui.rotatable.js',__FILE__), array('jquery_touch_punch'));
        //Touch Punch
        wp_enqueue_script( 'jquery_touch_punch', plugins_url('/assets/touch-punch/touch-punch.min.js',__FILE__), array('jquery_ui_scripts'));

        //Font-Awesome
        wp_enqueue_style( 'fontawesome_css', plugins_url('/assets/font_awesome/css/font-awesome.css',__FILE__),90);

        //DropzoneJs
        wp_enqueue_style( 'stickerprint_dropzone_styles', plugins_url('/assets/dropzonejs/dropzone.css',__FILE__),98);
        wp_enqueue_script( 'stickerprint_dropzone_scripts', plugins_url('/assets/dropzonejs/dropzone.js',__FILE__), array('jquery'));

        //PrintJs
        wp_enqueue_style( 'stickerprint_printjs_styles', plugins_url('/assets/printjs/print.min.css',__FILE__),98);
        //wp_enqueue_script( 'stickerprint_printjs_scripts', plugins_url('/assets/printjs/print.min.js',__FILE__), array('jquery'));
        //wp_enqueue_script( 'stickerprint_printjs_scripts', plugins_url('/assets/printjs/printThis.js',__FILE__), array('jquery'));
        wp_enqueue_script( 'stickerprint_jspdf_scripts', plugins_url('/assets/printjs/jspdf.js',__FILE__), array('jquery'));

        //HTML2CANVAS
        wp_enqueue_script( 'stickerprint_html2canvas_scripts', plugins_url('/assets/html2canvas/html2canvas.js',__FILE__), array('jquery'));

        //HEIC 2 ANY
        wp_enqueue_script( 'stickerprint_heic2any_scripts', plugins_url('/assets/heic2any/heic2any.min.js',__FILE__), array('jquery'));

        //Common CSS
        wp_enqueue_style( 'stickerprint_common_styles', plugins_url('/assets/common.css',__FILE__),101);

        //FrontEnd scripts and styles
        wp_enqueue_script( 'stickerprint_script', plugins_url('/assets/stickerprint_scripts.js',__FILE__), array('stickerprint_heic2any_scripts','stickerprint_html2canvas_scripts','stickerprint_jspdf_scripts','stickerprint_dropzone_scripts','jquery'));
    }


 


    //------ Append Dice Widget
    function custom_elementor(){
        include 'custom_elementor.php';
    }
    
}

if ( class_exists('dicewidget') ){
    $dicewidget = new dicewidget();
    $dicewidget -> register();
}