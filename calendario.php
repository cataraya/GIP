
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

$PAGE->set_url($CFG->wwwroot.'/local/Minor/calendario.php');
$PAGE->navbar->add($name);

echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here


?>
<html>
<body>


<br>
<form action="horario.php" method="post"> <!-- redirect to schedule page -->
<input type="submit" value="Horario">
</form>
<br>
<form action="asignaturas.php" method="post"> <!-- redirect to activity page -->
<input type="submit" value="Asignaturas">
</form>
<br>
<p>Mes</p>
   <form name="monthandyear" action="calendario2.php" method="post"> <!-- form where the selected values are redirected to calendario2.php page -->
  <select name="month"> <!-- select that shows the 12 months of the year-->
    <option value="1">Enero</option> 
    <option value="2">Febrero</option>
    <option value="3">Marzo</option>
    <option value="4">Abril</option>
    <option value="5">Mayo</option>
    <option value="6">Junio</option>
    <option value="7">Julio</option>
    <option value="8">Agosto</option>
    <option value="9">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
  </select>
  <br>
  <select name="year"> <!-- select that shows 3  years-->
    <option value="1">2016</option>
    <option value="2">2017</option>
    <option value="3">2018</option>
  </select>
  <br><br>
  <input type="submit" value="Ver"> 
</form>


</table>
<br>
<form action="index.php" method="post"> <!-- redirect to the index.php page -->
<input type="submit" value="Volver">
</form>
</body>
</html>
<br>




<?php

echo $OUTPUT->footer();



?>
