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

echo "Calendario";
echo "<br>";
echo "<br>";
echo "<br>";
$meselegido = $_POST["mes1"];

echo $meselegido;


?>
<form action="horario.php" method="post">
<input type="submit" value="Horario">
</form>
<br>
<form action="asignaturas.php" method="post">
<input type="submit" value="Asignaturas">
</form>
<form action="calendario.php" method="post">
<br>
<input type="submit" value="Ver otro mes">
</form>

<?php 



if ($meselegido=="marzo"):
		
?>
<html>
<body>


<br>

   <p><b>MARZO</b><p>
   <br>
<table style="width:100%" border="1">
  <tr>
    <td>Lunes</td> 
    <td>Martes</td>
    <td>Miercóles</td>
    <td>Jueves</td>
    <td>Viernes</td>
    <td>Sábado </td>
  </tr>
  <tr>
    <td><br><br><br></td>
     <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
 
  </tr>
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    
  </tr>
   
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>

  </tr>
  
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
 
  </tr>
  
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    
  </tr>
 <?php 

elseif ($meselegido=="abril"):
 
 	
 ?>

  <p><b>ABRIL</b><p>   
   <br>
<table style="width:100%" border="1">
  <tr>
    <td>Lunes</td> 
    <td>Martes</td>
    <td>Miercóles</td>
    <td>Jueves</td>
    <td>Viernes</td>
    <td>Sábado </td>
  </tr>
  <tr>
    <td><br><br><br></td>
     <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
 
  </tr>
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    
  </tr>
   
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>

  </tr>
  
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
 
  </tr>
  
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    
  </tr>
  
  <?php 
 
 

elseif($meselegido=="mayo"):
  
  
  ?>
    
  
  
  <p><b>MAYO</b><p>   
     <br>
  <table style="width:100%" border="1">
    <tr>
      <td>Lunes</td> 
      <td>Martes</td>
      <td>Miercóles</td>
      <td>Jueves</td>
      <td>Viernes</td>
      <td>Sábado</td>
    </tr>
    <tr>
      <td><br><br><br></td>
       <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
   
    </tr>
      <tr>
      <td><br><br><br></td> 
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     
      <tr>
      <td><br><br><br></td> 
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
  
    </tr>
    
      <tr>
      <td><br><br><br></td> 
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
   <td> </td>
    </tr>
    
      <tr>
      <td><br><br><br></td> 
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      
    </tr>
    <?php 

elseif ($meselegido=="junio"):
 
 	
 ?>

  <p><b>JUNIO</b><p>   
   <br>
<table style="width:100%" border="1">
  <tr>
    <td>Lunes</td> 
    <td>Martes</td>
    <td>Miercóles</td>
    <td>Jueves</td>
    <td>Viernes</td>
    <td>Sábado </td>
  </tr>
  <tr>
    <td><br><br><br></td>
     <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
 
  </tr>
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    
  </tr>
   
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>

  </tr>
  
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
 
  </tr>
  
    <tr>
    <td><br><br><br></td> 
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    
  </tr>
  
    <?php
  
endif


  ?>
  

</table>
<br>
<form action="index.php" method="post">
<input type="submit" value="Volver">
</form>
</body>
</html>
<br>




<?php

echo $OUTPUT->footer();




?>
