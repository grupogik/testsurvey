<?php
require_once("$CFG->libdir/formslib.php");

class form_respuesta extends moodleform {
	//Add elements to form
	public function definition() {
		global $CFG;

		$mform = $this->_form; // Don't forget the underscore!

		$radioarray=array();
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', get_string('1'), 1, $attributes);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', get_string('2'), 2, $attributes);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', get_string('3'), 3, $attributes);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', get_string('4'), 4, $attributes);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', get_string('5'), 5, $attributes);
		$mform->addGroup($radioarray, 'radioar', '', array(' '), false);
		
		$mform->addElement('select', 'type', get_string('dificultad'), $FORUM_TYPES, $attributes);
		
		
		$this->add_action_buttons();
	}
}
