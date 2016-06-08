<?php


// The number of lines in front of config file determine the // hierarchy of files.
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once($CFG->dirroot.'/calendario/calendario_form.php');
require_once($CFG->dirroot.'/horario/horario_form.php');

require_login();
//Global
$nameav = "Planificación Adaptativa";  // name that appears in the browser tab
$name = "Planificación Adaptativa"; // name of the website


$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title($nameav);
echo "<img src='logo.png' style='width:380px;height:110px;'>";
$PAGE->set_url($CFG->wwwroot.'/local/Minor/calendario.php');
$PAGE->navbar->add($name);


echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here

global $USER;
global $DB;
$userconected= $USER->username;

$add = $_POST["add"];

if ($add == "calendar")
{

	echo" <img src='addevent.png'style='width:1060px;height:110px;' align='right'>";

	$calendardata = new calendario_form ();
	
	
if(	$data= $calendardata->get_data()) {
	
	if (isset ($data->name, $data->description))
	
	{
		function getWeeks($timestamp)
		{
			$maxday    = date("t",$timestamp);
			$thismonth = getdate($timestamp);
			$timeStamp = mktime(0,0,0,$thismonth['mon'],1,$thismonth['year']);    //Create time stamp of the first day from the give date.
			$startday  = date('w',$timeStamp);    //get first day of the given month
			$day = $thismonth['mday'];
			$weeks = 0;
			$week_num = 0;
		
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 0){
					$weeks++;
				}
				if($day == ($i - $startday + 1)){
					$week_num = $weeks;
				}
			}
			return $week_num;
		}
		
		echo "<br>";
		echo	$event= $data->name;
		echo "<br>";
		echo	 $typeofevent= $data->radioar;
		echo "<br>";
		echo	 $desciption= $data->description;
		echo "<br>";
		echo    $date1= $data->timesart;
		echo "<br>";
		echo	$userconected= $USER->username;
		echo "<br>";
		echo	$numberofday =  date("d",$date1);
		echo "<br>";
		echo	$day  = date("w",$date1);
		echo "<br>";
		echo	$week = getWeeks($date1);
		echo "<br>";
		echo	$month= date("n",$date1);
		echo "<br>";
		echo	$year = date("Y",$date1);
		echo "<br>";
		echo	$activity = "perro";
		
		$calendar = new stdClass();
		$calendar->week = $week;
		$calendar->day = $day;
		$calendar->month = $month;
		$calendar->year = $year;
		$calendar->user = $userconected;
		$calendar->event = $event;
		$calendar->typeofevent = $typeofevent;
		$calendar->infromation = $description;
		$calendar->acivity = $activity;
		
		
		$DB->insert_record('calendar1', $calendar);
		
		$activiy1 = new stdClass();
		$activiy1->acivity = $activity;
		$DB->insert_record('activity', $activiy1);
		
		
		
		echo "Evento agregado con éxito <br><br>";
		echo "<form action='calendario.php' method='post'><input type='submit' value='Calendario'></form>";
		
		
	}
} else {
	$calendardata->display();
}

}
elseif ($add== "schedule")
{

	$mform = new horario_form ();
	$mform->display();
	
	$schedule->period = $period;
	$schedule->day = $day;
	$schedule->user = $userconnected;
	$schedule->typeofactivity = $typeofactivity;
	$schedule->acivity = $activity;
	
	
	$DB->insert_record('schedule', $schedule);
	
	$activiy1 = new stdClass();
	$activiy1->acivity = $activity;
	$DB->insert_record('activity', $activiy1);
	
	
	
	echo "Horario agregado con éxito <br><br>";
	echo "<form action='horario.php' method='post'><input type='submit' value='Horario'></form>";
	

	
}



echo $OUTPUT->footer();



?>



