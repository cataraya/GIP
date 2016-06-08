<?php


// The number of lines in front of config file determine the // hierarchy of files.
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

require_login();
//Global
$nameav = "Planificación Adaptativa"; // name that appears in the browser tab
$name = "Planificación Adaptativa"; // name of the website

$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title($nameav);
echo "<img src='logo.png' style='width:380px;height:110px;'>  <img src='calendar.png'style='width:1060px;height:110px;' align='right'>"; 
$PAGE->set_url($CFG->wwwroot.'/local/Minor/calendario2.php');
$PAGE->navbar->add($name);



echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here


$choosenmonth = $_POST["month"]; // variable that receives the month selected in the calendario.php page
$choosenmonth1= array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); //array with the name of the months of the year

echo '<br> 
<table> <tr> <b> <font size=4>';
echo $choosenmonth1[$choosenmonth-1]; // show the month choosen 
echo "  ";
$choosenyear = $_POST["year"]; // variable that receives the year selected in the calendario.php page
$choosenyear1= array("2016","2017","2018"); //array with the name of the months of the year

echo $choosenyear1[$choosenyear-1]; // show the year choosen 
echo '</b> </font> &nbsp;&nbsp;<form action="calendario.php" method="post">
<input type="submit" value="Ver otro mes">
</form> </tr> </table>'; // redirect to calendario.php where you can choose an other month to diplay






?>

<div align="right">
<table>
<tr>

<form action="add.php" method="post" >   <!-- redirect to the add.php page, where you can add new appointments -->
<input type="hidden" name="add" value="calendar">
<input type="submit" name="calendaradd" value="Agregar Evento">
</form>
</tr>
</table>
</div>
<?php 



global $USER; //connection to user-moodle's database
global $DB; //connection to moodle's database

?>

<table style="width:100%" border="1"> <!-- calendar's table -->
  <tr> <!-- first row: show the days of the week -->
    <td>Lunes</td> 
    <td>Martes</td>
    <td>Miércoles</td>
    <td>Jueves</td>
    <td>Viernes</td>
    <td>Sábado</td>
  </tr>
 
  <?php  
    for ($i = 1; $i <= 5; $i++) { // for to the weeks of the month shown in the calendar
    	echo "<tr>";
    	for ($j = 1; $j <= 6; $j++) { // for to the days of the week shown in the calendar
        echo "<td>";         
        
$userconnected= $USER->username;// variable that save the username of the user conneted

//query to calendar1 table of Moodle database, where the user is the one connected and the month and year are the one choosen before
$calendar= $DB->get_record('calendar1', array('week'=>$i,'day'=>$j,'user'=>$userconnected,'month'=>$choosenmonth, 'year'=>$choosenyear));

//variable that save what type of event is the event shown
$type= $calendar->typeofevent; 

// if to show the events in diferents colors depending of the type of event that are they
if ($type=='1'){
	// echo shows the number of the day and the name of the event that corresponding to that day
      echo $calendar->numberofday;  ?><font color="#1F968D"> <?php echo '<br><br>' ; echo $calendar->event; echo '<br>' ?></font> <?php ;
}
elseif ($type=='2')
{
	echo $calendar->numberofday;
     ?> <font color='#009900'> <?php echo '<br><br>' ; echo $calendar->event; ?> </font>
<?php 
}
elseif ($type=='3')
{
	echo $calendar->numberofday;
    ?> <font color='#f56d06'> <?php echo '<br><br>' ; echo $calendar->event; ?> </font>
    
    <?php 
}
else 
	echo "<br><br><br>";
 ?>
 </td>
 <?php
 ;
            
 }
 echo "</tr>";
    }
    
 ?>
</table>

<br>
<br>
<div align="right">
<table>
<tr>
<form action="horario.php" method="post"> <!-- redirect to the schedule page -->
<input type="submit" value="Horario">
</form>
<form action="asignaturas.php" method="post"> <!-- redirect to the activity page -->
<input type="submit" value="Asignaturas">
</form>

<form action="index.php" method="post"> <!-- redirect to index.php page -->
<input type="submit" value="Volver">
</form>
</body>
</html>

</tr>
</table>
</div>



<?php

echo $OUTPUT->footer();




?>
