<?php
require_once("$CFG->libdir/formslib.php");

class form_encuesta extends moodleform {
	//Add elements to form
	public function definition() {
		global $CFG;

		$mform = $this->_form; // Don't forget the underscore!

		$mform->addElement('text', 'name', 'Nombre');
		$mform->setType('name', PARAM_TEXT);

		$mform->addElement('date_time_selector', 'timestart', get_string('from'));
		$mform->setType('timestart', PARAM_NOTAGS  );

		$this->add_action_buttons();
	}
}