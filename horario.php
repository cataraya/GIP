
<?php


// The number of lines in front of config file determine the // hierarchy of files.
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

require_login();
//Global
$nombrenav = "Planificación Adaptativa"; // nombre que aparece en la pestaña del navegador
$nombre = ""; // nombre del sitio
$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title($nombrenav);
echo "<img src='logo.png' style='width:380px;height:110px;'>  <img src='schedule1.png'style='width:1060px;height:110px;' align='right'>"; 

$PAGE->set_url($CFG->wwwroot.'/local/Minor/horario.php');

$PAGE->navbar->add($nombre);


echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here

?>
<html>
<body>

<div align="right">
<table>
<tr>

<form action="add.php" method="post">
<input type="submit" name="scheduleadd" value="Agregar Horario">
</form>
<form action="edit.php" name="scheduleedit" method="post">
<input type="submit" value="Editar Horario">
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
    <td>Horario</td>
    <td>Lunes</td> 
    <td>Martes</td>
    <td>Miércoles</td>
    <td>Jueves</td>
    <td>Viernes</td>
    <td>Sábado</td>
  </tr>
 
  <?php  
    for ($i = 1; $i <= 8; $i++) { 
    	echo "<tr>";
    	for ($j = 1; $j <= 6; $j++) {
    	if ($i == 1 && $j == 1)
    	
    		echo '<td>8:15-9:25</td>';
    	if ($i == 2 && $j == 1)
    			 
    		echo '<td>10:00-11:30</td>';
    	if ($i == 3 && $j == 1)
    	
    		echo '<td>11:30-12:40</td>';
        if ($i == 4 && $j == 1)
        
    		echo '<td>13:00-14:10</td>';
        if ($i == 5 && $j == 1)
      
    		echo '<td>15:00-16:10</td>';
    	if ($i == 6 && $j == 1)
    	
    		echo '<td>16:30-17:40</td>';        
        if ($i == 7 && $j == 1)
        	
    		echo '<td>18:00-19:10</td>';
    	if ($i == 8 && $j == 1)
    	
    		echo '<td>19:30-20:40</td>';
    	
            ?> 
            <td>
            <?php 
$userconected= $USER->username;
$schedule= $DB->get_record('schedule', array('period'=>$i,'day'=>$j,'user'=>$userconected));
$type= $schedule->typeofactivity;

if ($type=='1'){
      ?><font color="#1F968D"> <?php echo $schedule->activity; ?></font> <?php ;
}
elseif ($type=='2')
{
     ?> <font color="#009900"> <?php echo $schedule->activity; ?> </font>
<?php 
}
elseif ($type=='3')
{
    ?> <font color=" #f56d06"> <?php echo $schedule->activity; ?> </font>
    <?php 
}
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
<div align='right'>
<form action="calendario.php" method="post">
<input type="submit" value="Calendario">
</form>
<form action="asignaturas.php" method="post">
<input type="submit" value="Asignaturas">
</form></div>

<br>
<form action="index.php" method="post">
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