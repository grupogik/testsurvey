<html>
<html>
<head>
<title>Proyecto GIK</title>
</head>
<body> 

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
// Parameter passed from the url.
$idenc = optional_param('id', 0, PARAM_INT);
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
require_login();
$PAGE->set_pagelayout('incourse');
$PAGE->set_url(new moodle_url('/local/testsurvey/borrar_encuesta.php'));
// Show the page header
echo $OUTPUT->header();

$encuestas = $DB->get_records('local_testsurvey');

if($idenc > 0) {
	 $resultado = $DB->delete_records ( 'local_testsurvey', array('id'=>$idenc));
	 var_dump($resultado);
	 echo $OUTPUT->notification('Su encuesta se borro satisfactoriamente', 'notifysuccess');
} else {
foreach($encuestas as $enc) {
	echo $enc->name . " " . $enc->id . " " . $enc->timestart . "<a href='borrar_encuesta.php?id=" . $enc->id . "'>Borrar</a><br/>";
}
}


$urlinicio = new moodle_url('/local/testsurvey/inicio.php');
echo $OUTPUT->single_button($urlinicio, 'Volver');
				

				


// Show the page footer
echo $OUTPUT->footer();
?>