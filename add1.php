<?php


// The number of lines in front of config file determine the // hierarchy of files.
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

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



$add1 = $_POST["add1"];

if ($add1 = "calendar")
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
	
	

	echo  $week;
	
	

	
	
	$event= $_POST["event"];
	$typeofevent= $_POST["typeofevent"];
	$numberofday=$_POST["daycalendar"];
	$month=$_POST["monthcalendar"];
	$year=$_POST["yearcalendar"];
	$information=$_POST["contents"];
	$userconected= $USER->username;
	$f=mktime(0, 0, 0, $month, $numberofday, $year);
	$day  = date("w",$f);	
	$week = getWeeks($timestamp);
	
	
	
	
	
	
	echo "Evento agregado con éxito <br><br>";
	echo $day;
	echo "<form action='calendario.php' method='post'> <!-- redirect to the calendar page -->
<input type='submit' value='Calendario'>
</form>";	
	
	
}

else {
	echo "Horario agregado con éxito";
}

echo $OUTPUT->footer();




?>