
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
$PAGE->set_url($CFG->wwwroot.'/local/Minor/horario.php');
$PAGE->navbar->add($nombre);

//$strmymoodle = get_string('helloworld');



echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here

echo "Planificación Adaptativa";
echo "<br>";

echo "Horario";
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
<form action="asignaturas.php" method="post">
<input type="submit" value="Asignaturas">
</form>
<br>


<table style="width:100%" border="1">
  <tr>
    <td>Horario</td>
    <td>Lunes</td> 
    <td>Martes</td>
    <td>Miercóles</td>
    <td>Jueves</td>
    <td>Viernes</td>
  </tr>
  <tr>
    <td>8:15-9:25</td>
     <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
    <tr>
    <td>11:30-12:40</td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
   
    <tr>
    <td>13:00-14:10</td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  
    <tr>
    <td>15:00-16:10</td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  
    <tr>
    <td>16:30-17:40</td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
 
    <tr>
    <td>18:00-19:10</td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
 
    <tr>
    <td>19:30-20:40</td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
</table>
<br>
<form action="index.php" method="post">
<input type="submit" value="Volver">
</form>
</body>
</html>



<?php


echo $OUTPUT->footer();



?>