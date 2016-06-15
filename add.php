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
		
	

		
		if($data->radioar == 0)
		{
			$typeofevent= 1;
		}
		elseif ($data-radioar == 1)
		{
			$typeofevent= 2;
		}
		else
		{
			$typeofevent= 3;
		}
		
	$event= $data->name;
	$desciption= $data->description;
	$date1= $data->timesart;
	$userconected= $USER->username;
    $numberofday =  date("d",$date1);
	$day  = date("w",$date1);
	$week = getWeeks($date1);
	$month= date("n",$date1);
	$year = date("Y",$date1);
	$activity = "";
		
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
		
		
		
		
		echo "Evento agregado con éxito <br><br>";
		echo "<form action='calendario.php' method='post'><input type='submit' value='Calendario'></form>";
		
		
	}
} else {
	$calendardata->display();
}

}
elseif ($add== "schedule")
{


	
	$scheduledata = new horario_form ();
	
	
	if(	$data= $scheduledata->get_data()) {
	
		if (isset ($data->activity))
	
		{
		//	var_dump($data);
			/* if($data->activity == 0) {
				$activity= $data->name;
			} else{
				$act = $DB->get_record('schedule', array('id'=>$data->activity));
				$activity = $act->activity;
				
			}
			
			*/
			
			if($data->radioar == 0)
			{
				$type= 1;
			} 
			elseif ($data->radioar == 1)
			{
				$type= 2;
			}
			else 
			{
				$type= 3;
			}
			
			
			$userconected= $USER->username;
			
			$period= "3";
			$day= "3";
			
			
			/*echo "<br>";
			echo	$activity;
			echo "<br>";
			echo	$userconected;
			echo $type;
			*/


	$schedule = new stdClass();
	$schedule->period = $period;
	$schedule->day = $day;
	$schedule->user = $userconected;
	$schedule->typeofactivity = $type;
	$schedule->acivity = $activity;
	
	$lastinsert= $DB->insert_record('schedule', $schedule);
	echo "<form action='horario.php' method='post'><input type='submit' value='Horario'></form>";
	
	
	
	
	echo "Horario agregado con éxito <br><br>";
	echo "<form action='horario.php' method='post'><input type='submit' value='Horario'></form>";
		
		}
	}
	else {
		$scheduledata ->display();
	}
	
}



echo $OUTPUT->footer();



?>



