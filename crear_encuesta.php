
<html>
<head>
<title>Proyecto GIK</title>
</head>
<body 

<tr>

		<pre> 
		       TEST SURVEY
		</pre>
		

		



</body>

<?php
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software  Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 *
 * @package local
 * @subpackage testsurvey
 * @copyright 2012-onwards Nicolás Larenas <nlarenas@alumnos.uai.cl>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// Minimum for Moodle to work, the basic libraries
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once ('forms/form_encuesta.php');
// Parameter passed from the url.
//$name = required_param('name', PARAM_TEXT);
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
require_login();
$PAGE->set_pagelayout('incourse');
$PAGE->set_url(new moodle_url('/local/testsurvey/crear_encuesta.php'));
// Show the page header
echo $OUTPUT->header();







$mform = new form_encuesta ();
if ($fromform = $mform->get_data ()) { // In this case you process validated data. $mform->get_data() returns data posted in form.
	echo $mform->get_data ()->name;
	echo $mform->get_data ()->timestart;
	$survey = new stdClass ();
	$survey->name = $mform->get_data ()->name;
	$survey->timestart = $mform->get_data ()->timestart;
	$surveyid = $DB->insert_record ( 'local_testsurvey', $survey );
	// REDIRECCIONAR A encuesta_subida.php SI SE GUARDA CORRECTAMENTE.
	echo $OUTPUT->notification('La encuesta se a agregado satisfactoriamente', 'notifysuccess');
} else {
	$mform->display ();
}


$urlinicio = new moodle_url('/local/testsurvey/inicio.php');
echo $OUTPUT->single_button($urlinicio, 'Volver');
		        	

// Show the page footer
echo $OUTPUT->footer();
?>