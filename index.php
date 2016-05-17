


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

$PAGE->set_url($CFG->wwwroot.'/local/Minor/index.php');
$PAGE->navbar->add($nombre);

//$strmymoodle = get_string('helloworld');




echo $OUTPUT->header();




include 'templates/header.php';
// Actual content goes here



global $DB;
global $USER;
$userconected= $USER->username;
$username= $DB->get_record('user', array('username'=>$userconected));

echo " <font color='#1F968D' size=6 > ¡Hola  $username->firstname !</font><br><br><br>
";

?>



<html>
<body>

<br>
<br>
<br>
<br>
<br>
<br>
<div align="right">

<form action="horario.php" method="post">
<input type="submit" value="Horario">
</form>
<br>
<br>
<form action="calendario.php" method="post">
<input type="submit" value="Calendario">
</form>
<br>
<br>
<form action="asignaturas.php" method="post">
<input type="submit" value="Asignaturas">
</div>
</form>
</body>
</html>



<?php


echo $OUTPUT->footer();



?>