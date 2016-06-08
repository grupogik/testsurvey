<?php
require_once("$CFG->libdir/formslib.php");

class form_respuesta extends moodleform {
	//Add elements to form
	public function definition() {
		global $CFG;

		$mform = $this->_form; // Don't forget the underscore!
		$customdata = $this->_customdata;
		
		$radioarray=array();
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', '1', 1);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', '2', 2);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', '3', 3);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', '4', 4);
		$radioarray[] = $mform->createElement('radio', 'dificultad', '', '5', 5);
		$mform->addGroup($radioarray, 'radioar', '', array(' '), false);
		
		$mform->addElement('hidden', 'idenc', $customdata['idenc']);
		$mform->setType('idenc', PARAM_INT);
		
		$this->add_action_buttons();
	}
}
