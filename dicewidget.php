<?php
namespace WPC;
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
    
class Widget_Loader{

  private static $_instance = null;

  public static function instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }


  private function include_widgets_files(){
    require_once(__DIR__ . '/dice.php');
  }

  public function register_widgets(){

    $this->include_widgets_files();

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Advertisement());

  }

  public function __construct(){
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
    add_action( 'wp_enqueue_scripts', [$this, 'enqueue'], 100 );
  }

    public function enqueue(){ 

        wp_enqueue_script( 'jqx', 'https://code.jquery.com/jquery-1.12.4.js', array ( 'json2' ), 1.1, false);

        wp_enqueue_script( 'jqui','https://code.jquery.com/ui/1.12.1/jquery-ui.js', array ( 'jqx' ), 1.1, false);
        wp_enqueue_style( 'jqui','https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',2);        

        wp_enqueue_script( 'jqx_touch', plugins_url('/js/jquery.ui.touch-punch.min.js',__FILE__), array ( 'jquery' ), 1.1, true); 
        
        wp_enqueue_script( 'dicejs', plugins_url('/js/dice.js',__FILE__), array ( 'jqx','jquery','jqx_touch' ), 1.1, true);
        wp_enqueue_style( 'dicecss', plugins_url('/css/dice.css',__FILE__), 99);
    }
}

// Instantiate Plugin Class
Widget_Loader::instance();



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
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );
    }

    //Enqueue on all other pages
    function enqueue(){ 

        wp_enqueue_script( 'jqx', 'https://code.jquery.com/jquery-1.12.4.js', array ( 'json2' ), 1.1, false);

        wp_enqueue_script( 'jqui','https://code.jquery.com/ui/1.12.1/jquery-ui.js', array ( 'jqx' ), 1.1, false);
        wp_enqueue_style( 'jqui','https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',2);        

        wp_enqueue_script( 'jqx_touch', plugins_url('/js/jquery.ui.touch-punch.min.js',__FILE__), array ( 'jquery' ), 1.1, true); 
        
        wp_enqueue_script( 'dicejs', plugins_url('/js/dice.js',__FILE__), array ( 'jqx','jquery','jqx_touch' ), 1.1, true);
        wp_enqueue_style( 'dicecss', plugins_url('/css/dice.css',__FILE__), 99);
    }
    
}

if ( class_exists('dicewidget') ){
    $dicewidget = new dicewidget();
    $dicewidget -> register();
}