
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
$PAGE->set_url($CFG->wwwroot.'/local/Minor/asignaturas.php');
$PAGE->navbar->add($nombre);




echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here



echo "Elija su asignatura";
echo "<br>";
echo "<br>";
echo "<br>";
global $USER; //connection to user-moodle's database
global $DB; //connection to moodle's database
$userconnected= $USER->username;

$activity= $DB->get_records_sql('SELECT id,activity FROM {calendar1} GROUP BY user,activity',array('user'=>$userconnected));
// $activity= $DB->get_records_('activity1',array('user'=>$userconnected));

?>


	<form name="activity2" action="activity.php" method="post">
	<select name="myact">
	<?php 
foreach ($activity as $activities)
	{
		$value=$activities->activity;
	?>
	<option value="<?php echo $value ?>" > <?php echo $activities->activity ?></option>
	<?php 
	}
	?>
	</select> 
	<input type="submit" value="Ver"> 
	</form>



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