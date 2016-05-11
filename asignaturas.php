
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
$PAGE->set_heading($nombre);
$PAGE->set_url($CFG->wwwroot.'/local/gim/helloworld2.php');
$PAGE->navbar->add($nombre);

//$strmymoodle = get_string('helloworld');



echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here

echo "Planificación Adaptativa";
echo "<br>";

echo "Asignatura";
echo "<br>";
echo "<br>";
echo "<br>";
?>
<html>
<body>


<br>
<form action="calendario.php" method="post">
<input type="submit" value="Calendario">
</form>
<br>
<form action="horario.php" method="post">
<input type="submit" value="Horario">
</form>
<br>
<br>
<form action="index.php" method="post">
<input type="submit" value="Volver">

</form>
</body>
</html>



<?php


echo $OUTPUT->footer();



?>