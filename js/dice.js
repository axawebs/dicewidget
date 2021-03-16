/*
 * Dice (https://github.com/alexerlandsson/dice)
 * Copyright 2020 Alexander Erlandsson
 * Licensed under MIT
 */

jQuery(document).ready(function() {
     jQuery( ".draggable" ).draggable({
                containment: ".draggable_parent"
            });
	
	
  var history = [];
  var dice = jQuery('#dice__cube');
  var animationSpeed = 3 * 1000;

	function randomizeNumber(low, high) {
		var random = Math.floor((Math.random() * high) + low);
		return random;
	}

	function rollDice(side) {
		var currentClass = dice.attr('class').split(' ')[0];
		var newClass = 'show-' + side;

		dice.removeClass();

    if (currentClass == newClass) {
			dice.addClass(newClass + ' show-same');

      // Remove animation class after animation has finished
      setTimeout(function() {
        dice.removeClass('show-same');
      }, animationSpeed);
		} else {
      dice.addClass(newClass);
    }

    history.push(side);
	}
	
	

jQuery('#dice__cube').on('click ', function() {
		var number = randomizeNumber(1, 6);

		if (number == 1) { rollDice('front'); }
		else if (number == 2) { rollDice('back'); }
		else if (number == 3) { rollDice('right'); }
		else if (number == 4) { rollDice('left'); }
		else if (number == 5) { rollDice('top'); }
		else if (number == 6) { rollDice('bottom'); }

		//soundEffect();
	});
	
	jQuery('#dice__cube').on('touchstart ', function() {
		var number = randomizeNumber(1, 6);

		if (number == 1) { rollDice('front'); }
		else if (number == 2) { rollDice('back'); }
		else if (number == 3) { rollDice('right'); }
		else if (number == 4) { rollDice('left'); }
		else if (number == 5) { rollDice('top'); }
		else if (number == 6) { rollDice('bottom'); }

		//soundEffect();
	});
});