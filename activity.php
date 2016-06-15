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
echo "<img src='logo.png' style='width:380px;height:110px;'> ";

$PAGE->set_url($CFG->wwwroot.'/local/Minor/horario.php');

$PAGE->navbar->add($name);


echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here


global $USER;//connection to user-moodle's database
global $DB; //connection to moodle's database


$userconected= $USER->username; // variable that save the username of the user conneted

$choosenact = $_POST["myact"];
echo $choosenact;



$calendar= $DB->get_record('calendar1', array('user'=>$userconected,'activity'=>$choosenact));

$d= $calendar->numberofday;
$m= $calendar->month;
$y= $calendar->year;

$d= mktime( 0, 0, 0, $d, $m, $y);
$fecha=   date("d-m-Y", $d);



?>
<br>
<br>
<table style="width:100%" border="1">
  <tr> <!-- first row: show the days of the week -->
    <td>Tipo de evento</td> 
    <td>Fecha</td> 
    <td>Descripción</td>
  </tr>
  
  
 
  <?php  
  //$count= $DB->count_records('calendar1', array('user'=>$userconected,'activity'=>$choosenact)); 
//for ($i=1; $i<$count+1; $i++)
//{
	echo "<tr> <td> $calendar->event </td> 
    <td>$fecha</td> 
    <td> $calendar->information </td> </tr>";
//}
   
          
      ?>

</table>


<br>
<div align='right'>
<form action="calendario.php" method="post"> <!-- redirect to the calendar page -->
<input type="submit" value="Calendario">
</form>
<form action="asignaturas.php" method="post"> <!-- redirect to the activty page -->
<input type="submit" value="Asignaturas">
</form></div>

<br>
<form action="asignaturas.php" method="post"> <!-- redirect to the index.php page -->
<input type="submit" value="Volver">
</form>
</body>
</html>
<br>
</body>
</html>



<?php


echo $OUTPUT->footer();



?>