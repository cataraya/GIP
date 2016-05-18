


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
$username= $DB->get_record('user', array('username'=>$userconnected)); //$username gets the fist name of the user who is connected
       //from the table 'user' of Moodle's database 

echo " <font color='#1F968D' size=6 > ¡Hola  $username->firstname !</font><br><br><br> "; //shows a mesaage next to the fist name of the
//user connected

?>



<html>
<body>

<br>

<div align="right">

<form action="horario.php" method="post"> <!-- button that redirect to the schedule page -->
<input type="submit" value="Horario">
</form>
<br>
<br>
<form action="calendario.php" method="post"> <!-- button that redirect to the calendar page -->
<input type="submit" value="Calendario">
</form>
<br>
<br>
<form action="asignaturas.php" method="post"> <!-- button that redirect to the activity page -->
<input type="submit" value="Asignaturas">
</div>
</form>
</body>
</html>



<?php

echo $OUTPUT->footer();



?>