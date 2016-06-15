<html>
<html>
<head>
<title>Proyecto GIK</title>
</head>
<body>

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
//$name = required_param('name', PARAM_TEXT);
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
require_login();
$PAGE->set_pagelayout('incourse');
$PAGE->set_url(new moodle_url('/local/testsurvey/resumen.php'));
// Show the page header
echo $OUTPUT->header();

$rec=$DB->get_recordset_sql('SELECT lt.id, lt.name, dificultad, count(*) as total 
FROM `mdl_local_respuestas` as lr, mdl_local_testsurvey as lt
WHERE lr.id_encuesta = lt.id
group by lt.id, lr.dificultad');
$data = array();
foreach ($rec as $records) {
	if(!isset($data[$records->id])) {
		$data[$records->id] = array($records->name, 0, 0, 0, 0, 0);
	}
	$data[$records->id][$records->dificultad] = $records->total;
}
	$table = new html_table();
$table->head = array('Nombre encuesta','1', '2', '3','4', '5');
foreach ($data as $records) {
	$table->data[] = $records;
}

echo html_writer::table($table);


		
		
			
$urlinicio = new moodle_url('/local/testsurvey/inicio.php');
echo $OUTPUT->single_button($urlinicio, 'Volver');
		        	


// Show the page footer
echo $OUTPUT->footer();
?>