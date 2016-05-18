<?php


// The number of lines in front of config file determine the // hierarchy of files.
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

require_login();
//Global
$nameav = "Planificación Adaptativa";  // name that appears in the browser tab
$name = "Planificación Adaptativa"; // name of the website


$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title($nameav);
echo "<img src='logo.png' style='width:380px;height:110px;'> <img src='addevent.png'style='width:1060px;height:110px;' align='right'>"; 

$PAGE->set_url($CFG->wwwroot.'/local/Minor/calendario.php');
$PAGE->navbar->add($name);


echo $OUTPUT->header();

include 'templates/header.php';
// Actual content goes here

global $USER;
global $DB;
$userconected= $USER->username;

$table = 'calendar1'; ///name of table
$conditions = array('user'=>$userconected); ///the name of the field (key) and the desired value
$sort = 'activity'; //field or fields you want to sort the result by
$fields = 'activity'; ///list of fields to return

$call= $DB->get_records_menu($table, $conditions, $sort, $fields);


		
 
?>
<?php

echo 'Actividad: <select name="activitycalendar">'; //Choose activity
    for ($i=0; $i<sizeof($call); $i++) {
         echo '<option value="'.$call[$i].'">';
         $call[$i];
         echo '</option>';
     }
?>
</select>

<br>
<form action="">
Tipo de Actividad:<br> <!--Choose type of evaluation-->
<input type="radio" name="evaluation" value="10" checked> Prueba<br>
<input type="radio" name="evaluation" value="11"> Control<br>
<input type="radio" name="evaluation" value="12"> Reunión<br>
Fecha: <br>
<select name="daycalendar"> <!--Choose evaluation´s day -->
        <?php
        for ($i=1; $i<=31; $i++) {
            if ($i == date('j'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>
<select name="monthcalendar"> <!--Choose evaluation's month-->
        <?php
        for ($i=1; $i<=12; $i++) {
            if ($i == date('m'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>
<select name="yearcalendar"> <!--Choose evaluation´s year-->
        <?php
        for($i=date('o'); $i<=2018; $i++){
            if ($i == date('o'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
      
</select>
  <br>
Contenidos a evaluar: <br> <!--Contents of evaluation-->
<input type="text" name="contents" value=""> <br>

<input type="submit" value="Agregar evaluación"> <!--Add evaluation-->

</form>



<?php


echo $OUTPUT->footer();



?>