<?php


// The number of lines in front of config file determine the // hierarchy of files.
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

require_login();
//Global
$nombrenav = "Planificación Adaptativa"; // nombre que aparece en la pestaña del navegador
$nombre = "Planificación Adaptativa"; // nombre del sitio

$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title($nombrenav);
echo "<img src='logo.png' style='width:380px;height:110px;'>  <img src='calendar.png'style='width:1060px;height:110px;' align='right'>"; 
$PAGE->set_url($CFG->wwwroot.'/local/Minor/calendario2.php');
$PAGE->navbar->add($nombre);

//$strmymoodle = get_string('helloworld');



echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here


$choosenmonth = $_POST["month"];
$choosenmonth1= array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

echo '<br> 
<table> <tr> <b> <font size=4>';
echo $choosenmonth1[$choosenmonth-1];
echo "  ";
$choosenyear = $_POST["year"];
$choosenyear1= array("2016","2017","2018");
echo $choosenyear1[$choosenyear-1];
echo '</b> </font> &nbsp;&nbsp;<form action="calendario.php" method="post">
<input type="submit" value="Ver otro mes">
</form> </tr> </table>';

?>

<div align="right">
<table>
<tr>

<form action="add.php" method="post">
<input type="submit" name="calendaradd" value="Agregar Evento">
</form>
<form action="edit.php" name="calendaredit" method="post">
<input type="submit" value="Editar Calendario">
</form>
</tr>
</table>
</div>
<?php 



global $USER;
global $DB;

?>

<table style="width:100%" border="1">
  <tr>
    <td>Lunes</td> 
    <td>Martes</td>
    <td>Miércoles</td>
    <td>Jueves</td>
    <td>Viernes</td>
    <td>Sábado</td>
  </tr>
 
  <?php  
    for ($i = 1; $i <= 5; $i++) { 
    	echo "<tr>";
    	for ($j = 1; $j <= 6; $j++) {
        echo "<td>";         
$userconected= $USER->username;
$calendar= $DB->get_record('calendar1', array('week'=>$i,'day'=>$j,'user'=>$userconected,'month'=>$choosenmonth, 'year'=>$choosenyear));
$type= $calendar->typeofevent;

if ($type=='1'){
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
<form action="horario.php" method="post">
<input type="submit" value="Horario">
</form>
<form action="asignaturas.php" method="post">
<input type="submit" value="Asignaturas">
</form>

<form action="index.php" method="post">
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
