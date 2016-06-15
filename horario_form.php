<?php


// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
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
 * The mform for creating and editing a calendar event
*
* @copyright 2009 Sam Hemelryk
* @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
* @package calendar
*/

/**
 * Always include formslib
*/
if (!defined('MOODLE_INTERNAL')) {
	die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/lib/formslib.php');

class horario_form extends moodleform {
	/**
	 * The form definition
	 */
	function definition () {
		global $DB, $CFG, $USER, $OUTPUT;
		$mform = $this->_form;
		$newevent = (empty($this->_customdata->event) || empty($this->_customdata->event->id));
		$repeatedevents = (!empty($this->_customdata->event->eventrepeats) && $this->_customdata->event->eventrepeats>0);
		$hasduration = (!empty($this->_customdata->hasduration) && $this->_customdata->hasduration);
		$mform->addElement('header', 'Calendario', 'Agregar Horario');


		// Normal fields
		$activities = $DB->get_records_sql(
				'SELECT id,activity FROM {schedule} GROUP BY user,activity',
				array('user'=>$USER->username));
		$activitiesarray = array();
		$activitiesarray[0] = 'Otra';
		foreach($activities as $activity) {
			$activitiesarray[$activity->id] = $activity->activity;
		}
		$mform->addElement('select', 'activity', 'Actividad', $activitiesarray);
		
		
		
		$mform->addElement('text', 'name', 'Actividad', 'size="50"');
//		$mform->addRule('name', get_string('required'), 'required');
		$mform->setType('name', PARAM_TEXT);
		$mform->disabledIf('name', 'activity', 'neq', 0);
		
		
		
		$radioarray=array();
		$radioarray[0] = $mform->createElement('radio', 'type', '', 'Asignatura', 1, $attributes);
		$radioarray[1] = $mform->createElement('radio', 'type', '', 'Actividad', 2, $attributes);
		$radioarray[2] = $mform->createElement('radio', 'type', '', 'Reunión', 3, $attributes);
		$mform->addGroup($radioarray, 'radioar', 'Tipo Actividad', array(' '), false);
	
	
		for($i=1;$i<=8;$i++){
		$checkarray=array();
		$checkarray[] = $mform->createElement('checkbox', 'dia'.$i.'L', '','Lunes',1, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'dia'.$i.'M', '','Martes',2,$attributes);
		$checkarray[] = $mform->createElement('checkbox', 'dia'.$i.'W', '','Miercóles',3, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'dia'.$i.'J', '','Jueves',4, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'dia'.$i.'V', '','Viernes',5, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'dia'.$i.'S', '','Sábado',6, $attributes);

		$mform->addGroup($checkarray, $i, 'Modulo '.$i, array(' '), false);
		}
		
		$mform->addElement('hidden', 'add', 'schedule');
		$mform->setType('add', PARAM_TEXT);
		
		
		
		$this->add_action_buttons(false, 'Agregar');
	}

	/**
	 * A bit of custom validation for this form
	 *
	 * @param array $data An assoc array of field=>value
	 * @param array $files An array of files
	 * @return array
	 */
	function validation($data, $files) {
		global $DB, $CFG;

		$errors = parent::validation($data, $files);

		if($data['activity'] == 0){
			if(strlen($data['name']) < 3) {
				$errors['name'] = 'Debe ingresar un nombre para la actividad';
			}
		}
		if ($data['courseid'] > 0) {
			if ($course = $DB->get_record('course', array('id'=>$data['courseid']))) {
				if ($data['timestart'] < $course->startdate) {
					$errors['timestart'] = get_string('errorbeforecoursestart', 'calendar');
				}
			} else {
				$errors['courseid'] = get_string('invalidcourse', 'error');
			}

		}

		if ($data['duration'] == 1 && $data['timestart'] > $data['timedurationuntil']) {
			$errors['timedurationuntil'] = get_string('invalidtimedurationuntil', 'calendar');
		} else if ($data['duration'] == 2 && (trim($data['timedurationminutes']) == '' || $data['timedurationminutes'] < 1)) {
			$errors['timedurationminutes'] = get_string('invalidtimedurationminutes', 'calendar');
		}

		return $errors;
	}

}
