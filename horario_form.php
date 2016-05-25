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
		global $CFG, $USER, $OUTPUT;
		$mform = $this->_form;
		$newevent = (empty($this->_customdata->event) || empty($this->_customdata->event->id));
		$repeatedevents = (!empty($this->_customdata->event->eventrepeats) && $this->_customdata->event->eventrepeats>0);
		$hasduration = (!empty($this->_customdata->hasduration) && $this->_customdata->hasduration);
		$mform->addElement('header', 'Calendario', 'Agregar Horario');


		// Normal fields

		$mform->addElement('text', 'name', 'Actividad', 'size="50"');
		$mform->addRule('name', get_string('required'), 'required');
		$mform->setType('name', PARAM_TEXT);
	
		$checkarray=array();
		$checkarray[] = $mform->createElement('checkbox', 'ratingtime', '','Lunes',1, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'ratingtime', '','Martes',2,$attributes);
		$checkarray[] = $mform->createElement('checkbox', 'ratingtime', '','Miercóles',3, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'ratingtime', '','Jueves',4, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'ratingtime', '','Viernes',5, $attributes);
		$checkarray[] = $mform->createElement('checkbox', 'ratingtime', '','Sábado',6, $attributes);

		$mform->addGroup($checkarray, '1', 'Modulo 1', array(' '), false);
		$mform->addGroup($checkarray, '2', 'Modulo 2', array(' '), false);
		$mform->addGroup($checkarray, '3', 'Modulo 3', array(' '), false);
		$mform->addGroup($checkarray, '4', 'Modulo 4', array(' '), false);
		$mform->addGroup($checkarray, '5', 'Modulo 5', array(' '), false);
		$mform->addGroup($checkarray, '6', 'Modulo 6', array(' '), false);
		$mform->addGroup($checkarray, '6', 'Modulo 7', array(' '), false);
		$mform->addGroup($checkarray, '6', 'Modulo 8', array(' '), false);
		
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
