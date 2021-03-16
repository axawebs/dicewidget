<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Advertisement extends Widget_Base{

  public function get_name(){
    return 'advertisement';
  }

  public function get_title(){
    return 'Dice Widget';
  }

  public function get_icon(){
    return 'fa fa-gamepad';
  }

  public function get_categories(){
    return ['general'];
  }
  
  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'No Settings'
      ]
    );

    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('label_heading', 'basic');
    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['advertisement__label-heading'],
      ]
    );

    ?>
    <div class="dice_container">
      <!-- Dice -->
    <div class="dice__scene">
      <div id="dice__cube" class="show-front">
        <div class="dice__side dice__side--front"></div>
    		<div class="dice__side dice__side--back"></div>
    		<div class="dice__side dice__side--right"></div>
    		<div class="dice__side dice__side--left"></div>
    		<div class="dice__side dice__side--top"></div>
    		<div class="dice__side dice__side--bottom"></div>
      </div>
    </div>
    <!--
    <button class="demo__button" id="dice__btn">Roll the dice</button>
    -->
    <!-- /Dice -->


    </div>
    <?php
  }

  protected function _content_template(){
    ?>
    <div class="dice_container">
      <!-- Dice -->
    <div class="dice__scene">
      <div id="dice__cube" class="show-front">
        <div class="dice__side dice__side--front"></div>
    		<div class="dice__side dice__side--back"></div>
    		<div class="dice__side dice__side--right"></div>
    		<div class="dice__side dice__side--left"></div>
    		<div class="dice__side dice__side--top"></div>
    		<div class="dice__side dice__side--bottom"></div>
      </div>
    </div>
    <!--
    <button class="demo__button" id="dice__btn">Roll the dice</button>
    -->
    <!-- /Dice -->


    </div>
        <?php
  }
}