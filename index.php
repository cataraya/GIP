


<?php

// The number of lines in front of config file determine the // hierarchy of files.
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

require_login();
//Global
$nanmeav = "Planificación Adaptativa"; // name that appears in the browser tab
$name = "Planificación Adaptativa"; // name of the website

$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title($nameav);
echo " <img src='logo.png'style='width:1060px;height:250px;' align='right'>";
$PAGE->set_url($CFG->wwwroot.'/local/Minor/calendario2.php');
$PAGE->navbar->add($name);




echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here



global $DB; //conection to moodle database
global $USER; //conetion to moodle user database




$userconnected= $USER->username; //$userconnected is the username of the user who is connected 

if ($userconnected=='guest')
{
	echo "<br><br><div align='center'> <font size=6 color='red'> Debes iniciar sesión </font> <br><br> <form action='http://localhost:8888/moodle30/login/index.php'><button type='submit'> Iniciar sesión </button></form></div>";
}
else 
{


$username= $DB->get_record('user', array('username'=>$userconnected)); //$username gets the fist name of the user who is connected
       //from the table 'user' of Moodle's database 

echo "<br> <div align= 'right'> <font color='#1F968D' size=4 > ¡Hola  $username->firstname !</font><br><br><br> </div> "; //shows a mesaage next to the fist name of the
//user connected

?>



<html>
<body>

<br>

<div align="center">
<table>
<tr>
<form action="horario.php" method="post"> <!-- button that redirect to the schedule page -->
<input type="submit" value="Horario">
</form>
&nbsp;&nbsp;&nbsp;&nbsp;
<form action="calendario.php" method="post"> <!-- button that redirect to the calendar page -->
<input type="submit" value="Calendario">
</form>
&nbsp;&nbsp;&nbsp;&nbsp;
<form action="asignaturas.php" method="post"> <!-- button that redirect to the activity page -->
<input type="submit" value="Asignaturas">
</form>
</tr>
</table>
</div>
</form>
</body>
</html>



<?php
}
echo $OUTPUT->footer();



?>