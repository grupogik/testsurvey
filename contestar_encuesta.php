<html>
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
</html>
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
require_once ('forms/form_respuesta.php');
// Parameter passed from the url.
$idenc = required_param('idenc', PARAM_INT);
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
$PAGE->set_pagelayout('incourse');
$PAGE->set_url(new moodle_url('/local/testsurvey/contestar_encuesta.php', array('idenc'=>$idenc)));
require_login();
// Show the page header
echo $OUTPUT->header();



		
		

global $USER;
$iduser = $USER->id;

$mform = new form_respuesta(null, array('idenc'=>$idenc));
if ($fromform = $mform->get_data ()) { // In this case you process validated data. $mform->get_data() returns data posted in form.
	$survey = new stdClass ();
	$survey->dificultad = $mform->get_data ()->dificultad;
	$survey->userid = $iduser;
	$survey->id_encuesta = 	$mform->get_data()->idenc;
	$surveyid = $DB->insert_record ( 'local_respuestas', $survey );	
	
	echo $OUTPUT->notification('Muchas gracias', 'notifysuccess');
} else {
echo '¿Como estuvo la prueba?';
echo "<br>";
echo 'haga click sobre el grado de dificultad de la evaluación,
		considerando 1 como muy fácil y 5 como muy díficil.';

	$mform->display ();
}


//echo "<a href='inicio.php'>Volver</a>";
$urlinicio = new moodle_url('http://localhost/moodle/course/view.php?id=2');
echo $OUTPUT->single_button($urlinicio, 'Volver');

// Show the page footer
echo $OUTPUT->footer();
?>
